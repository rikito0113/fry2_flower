<?php

namespace App\Library;

// モデルの呼び出し
use App\AdminUser;
use App\Player;
use App\PlayerChatLog;

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
     * @return array $playerInfo
     *
     */
    public static function getPlayerDetail($playerId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();

        // 下記のクエリ、件数が多くなれば ->chunk() 関数を使うといいかもしれない
        $playerInfo['all_chats'] = PlayerChatLog::where('player_id', $playerId)->orderBy('char_id', 'desc')->orderBy('created_at', 'desc');


        return $playerInfo;
    }
}