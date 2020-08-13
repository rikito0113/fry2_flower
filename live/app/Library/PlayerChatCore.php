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
use App\Scenario;


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
            'is_read'             => false,
        ]);
        return true;
    }

    /**
     * 外へ行くのchat取得
     *
     * @param int $playerId
     * @param int $scenarioId
     * @param string $content
     * @return bool
     *
     */
    public static function playerEventSend($playerId, $scenarioId, $content)
    {
        if (!$playerId || !$scenarioId || !$content) {
            return false;
        }
        $chatInstance = new PlayerEventChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'content'             => $content,
            'scenario_id'         => $scenarioId,
            'is_player'           => true,
            'is_read'             => false,
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

    /**
     * admin用(花嫁未読取得)
     *
     * @param  int   $type １：花嫁修行、２：外へ行く
     * @return array $list
     *
     */
    public static function getUnreadList($type)
    {
        $today     = date("Y-m-d");
        $todaySt   = date("Y月m月d日");
        $yesterday = date("Y-m-d", strtotime('-1 day'));
        $yesterSt  = date("Y月m月d日", strtotime('-1 day'));

        if ($type == 1) {
            // 花嫁修行
            $list = array();

            $todayList     = PlayerChatLog::where('is_read', false)->where('created_at', 'like', "$today%")->orderBy('player_chat_log_id', 'asc')->get();
            $yesterdayList = PlayerChatLog::where('is_read', false)->where('created_at', 'like', "$yesterday%")->orderBy('player_chat_log_id', 'asc')->get();

            foreach ($todayList as &$row) {
                $row['char_name']   = CharacterData::where('char_id', $row['char_id'])->first()->char_name;
                $row['player_name'] = Player::where('player_id', $row['player_id'])->first()->player_id;
            }
            foreach ($yesterdayList as &$row) {
                $row['char_name']   = CharacterData::where('char_id', $row['char_id'])->first()->char_name;
                $row['player_name'] = Player::where('player_id', $row['player_id'])->first()->player_id;
            }

            $list[$todaySt]  = $todayList;
            $list[$yesterSt] = $yesterdayList;

            return $list;

        } elseif ($type == 2) {
            // 外へ行く
            $list = array();

            $todayList     = PlayerEventChatLog::where('is_read', false)->where('created_at', 'like', "$today%")->orderBy('player_event_chat_log_id', 'asc')->get();
            $yesterdayList = PlayerEventChatLog::where('is_read', false)->where('created_at', 'like', "$yesterday%")->orderBy('player_event_chat_log_id', 'asc')->get();

            foreach ($todayList as &$row) {
                $charId              = Scenario::where('scenario_id', $row['scenario_id'])->first()->char_id;
                $row['char_name']   = CharacterData::where('char_id', $charId)->first()->char_name;
                $row['player_name'] = Player::where('player_id', $row['player_id'])->first()->player_id;
            }
            foreach ($yesterdayList as &$row) {
                $charId              = Scenario::where('scenario_id', $row['scenario_id'])->first()->char_id;
                $row['char_name']   = CharacterData::where('char_id', $charId)->first()->char_name;
                $row['player_name'] = Player::where('player_id', $row['player_id'])->first()->player_id;
            }

            $list[$todaySt]  = $todayList;
            $list[$yesterSt] = $yesterdayList;

            return $list;

        }
        return null;
    }

}
