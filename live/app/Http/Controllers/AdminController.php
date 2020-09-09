<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\AdminUser;
use App\Player;
use App\CharacterData;
use App\Title;
use App\AdminEventChatLog;
use App\Scenario;
use App\EventFixedPhrase;
use App\News;
use App\EventInfo;

// ライブラリの呼び出し
use App\Library\AdminCore;
use App\Library\PlayerChatCore;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    // login
    public function login()
    {
        // セッションを保持している場合はadmin.indexへ
        if (session()->has('admin_id')) {
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }

    // login処理実行
    public function loginExec(Request $request)
    {
        $adminUser = AdminCore::login($request);

        if ($adminUser)
            return redirect()->route('admin.index');
        else
            return redirect()->route('admin.login');
    }

    // 管理画面のindexページ
    public function index(Request $request)
    {
        return view('admin.index');
    }

    // 未返信の会話
    public function shouldReply(Request $request)
    {
        return view('admin.should_reply');
    }

    // 花嫁修行(未返信リスト)
    public function shouldReplyNormal()
    {
        // リスト取得
        $type = 1;
        $list = PlayerChatCore::getUnreadList($type);

        return view('admin.should_reply_normal')
            ->with('list', $list);
    }

    // 外へ行く(未返信リスト)
    public function shouldReplyEvent()
    {
        // リスト取得
        $type = 2;
        $list = PlayerChatCore::getUnreadList($type);
        return view('admin.should_reply_event')
            ->with('list', $list);
    }

    // プレイヤー検索
    public function findPlayer(Request $request)
    {
        $getPlayer = false;

        if ($request->find_player) {
            $getPlayer = AdminCore::getPlayer($request);
        }

        return view('admin.find_player')
            ->with('get_players', $getPlayer);
    }

    // プレイヤー詳細
    public function playerDetail($playerId)
    {
        if (isset($playerId)) {
            $playerInfo = Player::where('player_id', $playerId)->first();
            $chatInfo = AdminCore::getChatByPlayer($playerId);

            return view('admin.find_player')
                ->with('player_info', $playerInfo)
                ->with('chat_info', $chatInfo);
        } else {
            return view('admin.find_player');
        }
    }

    // プレイヤー検索からの返信
    public function mainChat($charId, $playerId, $isRead)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();
        $chatInfo = AdminCore::getChatByPlayerAndChar($playerId, $charId);

        // if ($isRead) {
        //     AdminCore::changeMainChatRead($charId, $playerId);
        // }

        return view('admin.main_chat')
            ->with('char_id',     $charId)
            ->with('player_info', $playerInfo)
            ->with('is_read',     $isRead)
            ->with('chat_info',   $chatInfo);
    }

    // プレイヤー検索からの返信
    public function mainChatConfirm(Request $request)
    {
        if (isset($request->content)) {
            $playerInfo = Player::where('player_id', $request->player_id)->first();
            $chatInfo = AdminCore::getChatByPlayerAndChar($request->player_id, $request->char_id);

            return view('admin.main_chat_confirm')
            ->with('content',     $request->content)
            ->with('player_info', $playerInfo)
            ->with('chat_info',   $chatInfo);
        }
        return redirect()->route('admin.index');
    }

    // プレイヤー検索からの返信
    public function mainChatSend(Request $request)
    {
        if (isset($request->content)) {
            $char = CharacterData::where('char_name', $request->char_name)->first();
            AdminCore::changeMainChatRead($char->char_id, $request->player_id);
            $sendResult = AdminCore::adminMainSend(
                $request->player_id,
                session('admin_id'),
                $char->char_id,
                $request->content
            );

            return redirect()->route('admin.mainChat', [
                'charId'   => $char->char_id,
                'playerId' => $request->player_id,
                'isRead'   => true,
            ]);
        }
        return redirect()->route('admin.index');
    }

    // アイテム検索
    public function findItem(Request $request)
    {
        return view('admin.find_item');
    }

    // ガール検索
    public function findGirl(Request $request)
    {
        return view('admin.find_girl');
    }

    // 称号登録
    public function registerTitle()
    {

        $titles = Title::all();

        return view('admin.register_title')
            ->with('titles', $titles);
    }

    // 称号登録実行
    public function registerTitleExec(Request $request)
    {
        if (isset($request->content)) {
            $titleInstance = new Title;
            $registerResult = AdminCore::adminRegisterTitle(
                $request->content
            );
        }

        return redirect()->route('admin.registerTitle');
    }

    // イベントプレイヤー検索
    public function findEventPlayer(Request $request)
    {
        $eventPlayers = false;

        if ($request->find_event) {
            $eventPlayers = AdminCore::getEventPlayers($request);
        }

        return view('admin.find_event')
            ->with('event_players', $eventPlayers);
    }

    // イベントプレイヤーのチャット検索
    public function eventChat($scenarioId, $playerId, $isRead)
    {
        $chatInfo        = AdminCore::getEventChatLog($scenarioId, $playerId);
        $scenarioInfo    = Scenario::where('scenario_id', $scenarioId)->first();
        $contentIndex    = AdminEventChatLog::where('scenario_id', $scenarioId)->where('player_id', $playerId)->count();
        $fixedPhraseRow  = EventFixedPhrase::where('scenario_id', $scenarioId)->where('content_index', $contentIndex)->first();

        // if ($isRead) {
        //     AdminCore::changeEventChatRead($scenarioId, $playerId);
        // }

        return view('admin.event_chat')
            ->with('chat_info',      $chatInfo)
            ->with('fixed_phrase',   $fixedPhraseRow)
            ->with('is_read',        $isRead)
            ->with('scenario_info',  $scenarioInfo);
    }

    // イベントからの返信
    public function eventChatConfirm(Request $request)
    {
        if (isset($request->content)) {

            $chatInfo        = AdminCore::getEventChatLog($request->scenario_id, $request->player_id);
            $scenarioInfo    = Scenario::where('scenario_id', $request->scenario_id)->first();

            return view('admin.event_chat_confirm')
            ->with('content',        $request->content)
            ->with('chat_info',      $chatInfo)
            ->with('scenario_info',  $scenarioInfo);
        }

        return redirect()->route('admin.index');
    }

    // イベントからの返信
    public function eventChatSend(Request $request)
    {
        if (isset($request->content)) {
            AdminCore::changeEventChatRead($request->scenario_id, $request->player_id);
            $sendResult = AdminCore::adminEventSend(
                $request->player_id,
                session('admin_id'),
                $request->scenario_id,
                $request->content
            );

            return redirect()->route('admin.eventChat',[
                'scenarioId' => $request->scenario_id,
                'playerId'   => $request->player_id,
                'isRead'     => true,
            ]);
        }

        return redirect()->route('admin.index');
    }

    // 新着情報
    public function news()
    {
        $allNews = News::orderby('news_id', 'desc')->get();
        return view('admin.news')
        ->with('all_news', $allNews);
    }

    // 新着情報入力確認
    public function newsConfirm(Request $request)
    {
        if (isset($request->content) && isset($request->title)) {

            return view('admin.news_confirm')
            ->with('content',     $request->content)
            ->with('title',     $request->title);

        }

        // 入力不足
        return redirect()->route('admin.news');
    }

    // 新着情報送信
    public function newsSend(Request $request)
    {
        if (isset($request->content) && isset($request->title)) {
            $sendResult = AdminCore::newsSend(
                $request->title,
                $request->content
            );
        }
        return redirect()->route('admin.news');
    }

    // イベント情報
    public function eventInfo()
    {
        $allEventInfo = EventInfo::orderby('event_info_id', 'desc')->get();
        return view('admin.event_info')
            ->with('all_event_info', $allEventInfo);
    }

    // イベント情報入力確認
    public function eventInfoConfirm(Request $request)
    {
        if (isset($request->content) && isset($request->title)) {
            return view('admin.event_info_confirm')
                ->with('content',   $request->content)
                ->with('title',     $request->title);
        }

        // 入力不足
        return redirect()->route('admin.event_info');
    }

    // イベント情報送信
    public function eventInfoSend(Request $request)
    {
        if (isset($request->content) && isset($request->title)) {
            $sendResult = EventInfo::newsSend(
                $request->title,
                $request->content
            );
        }
        return redirect()->route('admin.event_info');
    }
}
