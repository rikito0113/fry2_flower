<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\ExpLookup;
use App\Player;
use App\SetImg;
use App\PlayerChatLog;
use App\AdminChatLog;
use App\PlayerEventChatLog;
use App\AdminEventChatLog;
use App\Scenario;
use App\RewardLevel;
use App\MainMemory;
use App\Item;
use App\ProloguePhrase;


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

        // done_prologueがfalseの時は、チュートリアルの処理
        $donePrologue = false;
        if (!$ownedCharInfo->done_prologue) {
            $scopeOwnedCharInfo = OwnedCharacterData::where('owned_char_id', $ownedCharInfo->owned_char_id)->first();
            $scopeOwnedCharInfo->prologue_index++;

            // チュートリアルが終了した処理
            $contentIndex = $scopeOwnedCharInfo->prologue_index+1;
            $nextPrologue = ProloguePhrase::where('char_id', $scopeOwnedCharInfo->char_id)->where('content_index', $contentIndex)->first();
            if (!$nextPrologue) {
                $scopeOwnedCharInfo->done_prologue = true;
                $donePrologue = true;
            }

            $scopeOwnedCharInfo->save();
        }

        // 経験値付与
        $exp = 1;
        $appendExpResult = self::appendExp($ownedCharInfo->owned_char_id, $exp, $donePrologue);
        if ($appendExpResult['error_id'] != 0) {
            // エラー
            return false;
        }

        // 改行を<br />に変換
        $content = nl2br($content);
        $content = str_replace(array("\r\n", "\r", "\n"), "", $content);

        $chatInstance = new PlayerChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'content'             => $content,
            'char_id'             => $charId,
            'char_avatar_img'     => $ownedCharInfo->avatar_img,
            'char_effect_img'     => $ownedCharInfo->effect_img,
            'char_bg_img'         => $ownedCharInfo->bg_img,
            'is_player'           => true,
            'is_read'             => false,
        ]);

        if (!$ownedCharInfo->done_prologue) {
            $prologuePhrase = ProloguePhrase::where('char_id', $scopeOwnedCharInfo->char_id)->where('content_index', $scopeOwnedCharInfo->prologue_index)->first();

            $adminChat = new AdminChatLog;
            $adminChat->create([
                'player_id'     => $scopeOwnedCharInfo->player_id,
                'admin_id'      => 0,
                'content'       => $prologuePhrase->content,
                'char_id'       => $scopeOwnedCharInfo->char_id,
                'is_player'     => false,
            ]);

            // 既読と、admin側のtimestampを修正
            $chatLog = PlayerChatLog::where('player_id', $playerId)->where('char_id', $scopeOwnedCharInfo->char_id)->orderBy('created_at', 'desc')->first();
            $chatLog->created_at = date('Y-m-d H:i:s', strtotime('-1 second'));
            $chatLog->is_read    = true;
            $chatLog->save();
        }

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

        $charId = Scenario::where('scenario_id', $scenarioId)->first()->char_id;
        $ownedCharInfo = OwnedCharacterData::where('player_id', $playerId)->where('char_id', $charId)->first();

        // 経験値付与
        $exp = 1;
        $appendExpResult = self::appendExp($ownedCharInfo->owned_char_id, $exp);
        if ($appendExpResult['error_id'] != 0) {
            // エラー
            return false;
        }

        // 改行を<br />に変換
        $content = nl2br($content);
        $content = str_replace(array("\r\n", "\r", "\n"), "", $content);

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

        foreach ($playerChats as &$chat) {
            $chat->content = str_replace("<br />", "\n", $chat->content);
        }

        // 管理者のログ
        $adminChat = AdminChatLog::where('player_id', $playerId)->where('char_id', $charId)->orderBy('admin_chat_log_id', 'asc')->get();

        foreach ($adminChat as &$chat) {
            $chat->content = str_replace("<br />", "\n", $chat->content);
        }

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

        foreach ($playerChats as &$chat) {
            $chat->content = str_replace("<br />", "\n", $chat->content);
        }

        // 管理者のログ
        $adminChat = AdminEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->orderBy('admin_event_chat_log_id', 'asc')->get();

        foreach ($adminChat as &$chat) {
            $chat->content = str_replace("<br />", "\n", $chat->content);
        }

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

    /**
     * 経験値付与
     *
     * @param  int   $ownedCharId
     * @param  int   $exp
     * @return array $result
     *
     */
    private static function appendExp($ownedCharId, $exp, $donePrologue = false)
    {
        $result = array(
            'is_levelup'    => false,
            'error_id'      => 0,
            'memory_info'   => false,
        );

        $ownedCharInfo = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();

        $nextLevel = $ownedCharInfo['level'] + 1;
        $nextLevelInfo = ExpLookup::where('level', $nextLevel)->first();
        if (!$nextLevelInfo) {
            // 次のレベルの情報がない
            $result['error_id'] = 1;
            return $result;
        }

        // チュートリアルが終了した時
        if ($donePrologue) {
            // レベルアップ
            $ownedCharInfo->level = $ownedCharInfo->level + 1;
            // ツンデレポイント付与
            $ownedCharInfo->remain_point = $ownedCharInfo->remain_point + 1;
            // 勉学ポイント付与
            $studyPoint = mt_rand(1,3);
            $playerInfo = Player::where('player_id', $ownedCharInfo->player_id)->first();
            $playerInfo->study_point = $playerInfo->study_point + $studyPoint;
            $playerInfo->save();

            $result['is_levelup'] = 1;

            // 経験値付与、強制的に経験値を次のレベルへ
            $ownedCharInfo->exp = $nextLevelInfo['exp'];
            $ownedCharInfo->save();

            return $result;
        }

        $newExp = $ownedCharInfo['exp'] + $exp;
        if ($newExp >= $nextLevelInfo['exp']) {
            // レベルアップ
            $ownedCharInfo->level = $ownedCharInfo->level + 1;
            // ツンデレポイント付与
            $ownedCharInfo->remain_point = $ownedCharInfo->remain_point + 2;
            // 勉学ポイント付与
            $studyPoint = mt_rand(1,3);
            $playerInfo = Player::where('player_id', $ownedCharInfo->player_id)->first();
            $playerInfo->study_point = $playerInfo->study_point + $studyPoint;
            $playerInfo->save();

            $result['is_levelup'] = 1;

            // メモリーの判定
            $attitude = null;
            if ($ownedCharInfo->dere > $ownedCharInfo->tsun)
                $attitude = 'dere';
            else
                $attitude = 'tsun';

            $memoryInfo = RewardLevel::where('char_id', $ownedCharInfo->char_id)->where('level', '<=', $ownedCharInfo->level)->where('attitude', $attitude)->orderBy('level', 'desc')->first();
            if ($memoryInfo) {
                $ownedMemoryInfo = MainMemory::where('owned_char_id', $ownedCharId)->where('item_id', $memoryInfo->item_id)->first();
                if (!$ownedMemoryInfo) {
                    // ない場合は、思ひ出の付与
                    ItemCore::appendItem($ownedCharInfo->player_id,$ownedCharId,$attitude,$memoryInfo->item_id,1,true);

                    $result['memory_info'] = Item::where('item_id', $memoryInfo->item_id)->first();
                }
            }
        }

        // 経験値付与
        $ownedCharInfo->exp = $ownedCharInfo->exp + $exp;
        $ownedCharInfo->save();

        return $result;

    }

}
