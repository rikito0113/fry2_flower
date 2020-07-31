<?php

namespace App\Library;

// モデルの呼び出し
use App\AdminUser;
use App\Player;
use App\PlayerChatLog;
use App\CharacterData;
use App\AdminChatLog;
use App\Title;
use App\Scenario;
use App\PlayerEventChatLog;
use App\AdminEventChatLog;


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
                $chats = [...$playerChat, ...$adminChat];       // このエラーはPHP7.4以降は通るエラー。
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
     * @param bool $isPlayerView
     * @return array $result
     *
     */
    public static function getSortByDate($chats, $isPlayerView = false)
    {
        $sort = array();

        $side1 = null;
        $side2 = null;
        if ($isPlayerView) {
            $side1 = 'right';
            $side2 = 'left';
        } else {
            $side1 = 'left';
            $side2 = 'right';
        }

        foreach ($chats as $key => $row) {
            // is_playerでsideを指定
            if ($row->is_player) {
                $row->side = $side1;
            } else {
                $row->side = $side2;
            }

            $sort[$key] = $row['created_at'];
        }

        array_multisort($sort, SORT_ASC, $chats);

        return $chats;
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

    /**
     * 管理画面からtitleを登録する
     *
     * @param string $titleText
     * @return bool
     *
     */
    public static function adminRegisterTitle($titleText)
    {
        $titleInstance = new TItle;
        $titleInstance->create([
            'title_text'             => $titleText,
        ]);

        return true;
    }

    /**
     * 管理画面からeventを取得する
     *
     * @param Request $request
     * @return object $eventInfo
     *
     */
    public static function getEventPlayers($request)
    {
        $events       = array();
        $playerId     = null;
        $eventPlayers = array();

        // プレイヤーの検索が入っている場合
        if ($request->name)
            $playerId = Player::where('name', $request->name)->first();
        else
            $playerId = $request->player_id;

        // 場所の検索が入っている場合 or ない場合は全検索
        if ($request->place)
            $events = Scenario::where('place', $request->place)->get();
        elseif ($request->field)
            $events = Scenario::where('field', $request->field)->get();
        else
            $events = Scenario::all();

        if ($playerId) {
            foreach ($events as $key => $event) {
                $eventPlayers[$key] = PlayerEventChatLog::where('player_id', $playerId)->where('scenario_id', $event->scenario_id)->first();
            }
        } else {
            foreach ($events as $key => $event) {
                $eventPlayers[$key] = PlayerEventChatLog::where('scenario_id', $event->scenario_id)->first();
            }
        }

        return $eventPlayers;
    }

    /**
     * 管理画面からeventを取得する
     *
     * @param integer $scenarioId
     * @param integer $playerId
     * @return object $chats
     *
     */
    public static function getEventChatLog($scenarioId, $playerId)
    {
        $chats     = array();

        $playerChat    = PlayerEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->orderBy('player_event_chat_log_id', 'asc')->get();
        $adminChat     = AdminEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->orderBy('admin_event_chat_log_id', 'asc')->get();
        $scenarioInfo  = Scenario::where('scenario_id', $scenarioId)->first();
        $charName      = CharacterData::where('char_id', $scenarioInfo->char_id)->first()->char_name;

        if (isset($adminChat))
            $chats = [...$playerChat, ...$adminChat];       // このエラーはPHP7.4以降は通るエラー。
        else
            $chats = $playerChat;

        $chatInfo[$charName] = self::getSortByDate($chats);

        return $chatInfo;
    }

    /**
     * 管理画面からchatをinsertする
     *
     * @param int $playerId
     * @param int $adminId
     * @param int $scenarioId
     * @param string $content
     * @return bool
     *
     */
    public static function adminEventSend($playerId, $adminId, $scenarioId, $content)
    {
        $playerId   = (int)$playerId;
        $adminId    = (int)$adminId;
        $scenarioId = (int)$scenarioId;

        $chatInstance = new AdminChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'admin_id'            => $adminId,
            'content'             => $content,
            'scenario_id'         => $scenarioId,
            'is_player'           => false,
        ]);

        return true;
    }
}