<?php

namespace App\Library;

// モデルの呼び出し
use App\AdminUser;
use App\Player;
use App\PlayerChatLog;
use App\CharacterData;
use App\AdminChatLog;

class AdminCore {

    // ログイン
    public static function login($request)
    {
        $adminUser = AdminUser::where('id', $request->id)->where('password', $request->password)->first();

        // playerがない場合はfalse
        if (!$adminUser)
            return false;
        else {
            // idをsessionに保持
            session(['admin_id' => $request->id]);
            return $adminUser;
        }
    }

    /**
     * 管理画面からplayerを取得する
     *
     * @param Request $request
     * @return array $playerInfo
     *
     */
    public static function getPlayer($request)
    {
        $playerInfo = array();


        if ($request->player_id)
            $playerInfo[0] = Player::where('player_id', $request->player_id)->first();
        elseif ($request->pf_player_id)
            $playerInfo[0] = Player::where('pf_player_id', $request->pf_player_id)->first();
        elseif ($request->name)
            $playerInfo[0] = Player::where('name', $request->name)->get();
        else
            $playerInfo = Player::oldest()->get();


        return $playerInfo;
    }

    /**
     * 管理画面からchatを取得する
     *
     * @param int $playerId
     * @return array $chatInfo
     *
     */
    public static function getChatByPlayer($playerId)
    {
        $chatInfo = array();

        // 下記のクエリ、件数が多くなれば ->chunk() 関数を使うといいかもしれない
        $charIds = PlayerChatLog::where('player_id', $playerId)->groupBy('char_id')->pluck('char_id');

        foreach ($charIds as $charId) {
            $charName   = CharacterData::where('char_id', $charId)->first()->char_name;
            $playerChat = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('player_chat_log_id', 'asc')->get();
            $adminChat  = AdminChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('admin_chat_log_id', 'asc')->get();
            $chats      = array();
            if (isset($adminChat))
                $chats = $playerChat + $adminChat;
            else
                $chats = $playerChat;

            $chatInfo[$charName] = self::getSortByDate($chats);
        }


        return $chatInfo;
    }

    /**
     * chatをcreated_atで昇順にする
     *
     * @param array $chats
     * @return array $result
     *
     */
    public static function getSortByDate($chats)
    {
        $result = null;

        foreach ($chats as $key => $row) {
            if ($key == 0 || strtotime($chats[$key-1]['created_at']) < strtotime($row['created_at']))
                $result[$key]   = $row;
            else{
                $result[$key-1] = $row;
                $result[$key]   = $chats[$key-1];
            }
        }

        return $result;
    }


    /**
     * 管理画面からchatをinsertする
     *
     * @param int $playerId
     * @param int $adminId
     * @param int $charId
     * @param string $content
     * @return bool
     *
     */
    public static function adminMainSend($playerId, $adminId, $charId, $content)
    {
        $playerId   = (int)$playerId;
        $adminId    = (int)$adminId;
        $charId     = (int)$charId;

        $chatInstance = new AdminChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'admin_id'            => $adminId,
            'content'             => $content,
            'char_id'             => $charId,
            'is_player'           => false,
        ]);

        return true;
    }
}