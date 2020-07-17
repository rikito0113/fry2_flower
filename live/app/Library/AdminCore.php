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
     * 管理画面からplayerを取得する
     *
     * @param int $playerId
     * @return array $chatInfo
     *
     */
    public static function playerChat($playerId)
    {
        $chatInfo = array();

        // 下記のクエリ、件数が多くなれば ->chunk() 関数を使うといいかもしれない
        $charIds = PlayerChatLog::where('player_id', $playerId)->groupBy('char_id')->pluck('char_id');

        foreach ($charIds as $charId) {
            $charName = CharacterData::where('char_id', $charId)->first()->char_name;
            $chatInfo[$charName] = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('player_chat_log_id', 'desc')->get();
        }


        return $chatInfo;
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