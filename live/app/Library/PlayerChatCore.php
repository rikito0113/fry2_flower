<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\CharacterImg;
use App\OwnedCharacterImg;
use App\SetImg;
use App\PlayerChatLog;


// ライブラリの呼び出し

use Illuminate\Support\Facades\Hash;

class PlayerChatCore
{
    public static function playerSend($playerId, $charId, $content, $ownedCharInfo)
    {
        if (!$playerId || !$charId || !$content || !$ownedCharInfo) {
            return false;
        }
        $chatInstance = new PlayerChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'content'             => $content,
            'char_id'             => $charId,
            'char_avatar_id'      => $ownedCharInfo->avatar_img,
            'char_background_id'  => $ownedCharInfo->background_img,
            'is_player'           => true,
        ]);
        return true;
    }

    public static function getChatLog($playerId, $charId, $ownedCharInfo)
    {
        if (!$playerId || !$ownedCharInfo) {
            return false;
        }
        $now       = date('H');
        switch ($now) {
            case $now >= 0 && $now < 14 :
                // 朝用(10~14時までのログ取得)
                $startDate = date('Y-m-d 10:00:00');
                $endDate   = date('Y-m-d 13:59:59');
            break;
            case $now >= 14 && $now < 20 :
                // 午後用(14~14時までのログ取得)
                $startDate = date('Y-m-d 14:00:00');
                $endDate   = date('Y-m-d 19:59:59');
            break;
            case $now >= 20 :
                // 夜用(10~14時までのログ取得)
                $startDate = date('Y-m-d 20:00:00');
                $endDate   = date('Y-m-d 23:59:59');
            break;
        }

        // playerのログ
        $logs = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->whereBetween('created_at', [$startDate,$endDate])->get();

        // 管理者のログ
        $adminLog = array();

        // fetch

        // 時間降順

        return $logs;

    }
}
