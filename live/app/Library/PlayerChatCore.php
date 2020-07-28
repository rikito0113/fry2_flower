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
use App\AdminChatLog;
use App\PlayerEventChatLog;
use App\AdminEventChatLog;


// ライブラリの呼び出し
use App\Library\AdminCore;

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

    public static function getChatLogBrGirl($playerId, $charId, $ownedCharInfo)
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
        // $logs = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->whereBetween('created_at', [$startDate,$endDate])->get();
        $playerChats = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('player_chat_log_id', 'asc')->get();

        // 管理者のログ
        $adminChat = AdminChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('admin_chat_log_id', 'asc')->get();

        // fetch
        if (isset($adminChat) && isset($playerChats))
            $chats = [...$playerChats, ...$adminChat];       // このエラーはPHP7.4以降は通るエラー。
        elseif(!isset($adminChat) && isset($playerChats))
            $chats = $playerChats;
        else
            $chats = $adminChat;

        // 時間降順
        $logs = AdminCore::getSortByDate($chats, true);

        return $logs;

    }

    /**
     * 外へ行くのchat取得
     *
     * @param int $playerId
     * @param int $scenarioId
     * @return bool
     *
     */
    public static function getEventChatLogByScenario($playerId, $scenarioId)
    {
        if (!$playerId || !$scenarioId) {
            return false;
        }

        // playerのログ
        // $logs = PlayerChatLog::where('player_id', $playerId)->where('char_id', $charId)->whereBetween('created_at', [$startDate,$endDate])->get();
        $playerChats = PlayerEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->orderBy('player_event_chat_log_id', 'asc')->get();

        // 管理者のログ
        $adminChat = AdminEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->orderBy('admin_event_chat_log_id', 'asc')->get();

        // fetch
        if (isset($adminChat) && isset($playerChats))
            $chats = [...$playerChats, ...$adminChat];       // このエラーはPHP7.4以降は通るエラー。
        elseif(!isset($adminChat) && isset($playerChats))
            $chats = $playerChats;
        else
            $chats = $adminChat;

        // 時間降順
        $logs = AdminCore::getSortByDate($chats, true);

        return $logs;

    }
}
