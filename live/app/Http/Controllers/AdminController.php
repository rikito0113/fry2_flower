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

// ライブラリの呼び出し
use App\Library\AdminCore;

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
    public function sholdReply(Request $request)
    {
        return view('admin.shold_reply');
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
    public function mainChat(Request $request)
    {
        if (isset($request->content)) {
            $char = CharacterData::where('char_name', $request->char_name)->first();
            $sendResult = AdminCore::adminMainSend(
                $request->player_id,
                session('admin_id'),
                $char->char_id,
                $request->content
            );

            return redirect()->route('admin.playerDetail', ['playerId' => $request->player_id]);
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
    public function eventChat($scenarioId, $playerId)
    {
        $chatInfo        = AdminCore::getEventChatLog($scenarioId, $playerId);
        $scenarioInfo    = Scenario::where('scenario_id', $scenarioId)->first();
        $contentIndex    = AdminEventChatLog::where('scenario_id', $scenarioId)->where('player_id', $playerId)->count();
        $fixedPhraseRow  = EventFixedPhrase::where('scenario_id', $scenarioId)->where('content_index', $contentIndex)->first();
        $fixedPhrase     = false;

        if (!$fixedPhraseRow->isEmpty())
            $fixedPhrase = $fixedPhraseRow->pluck('content');

        return view('admin.event_chat')
            ->with('chat_info',      $chatInfo)
            ->with('fixed_phrase',   $fixedPhrase)
            ->with('scenario_info',  $scenarioInfo);
    }

    // イベントからの返信
    public function eventChatSend(Request $request)
    {
        if (isset($request->content)) {
            $sendResult = AdminCore::adminEventSend(
                $request->player_id,
                session('admin_id'),
                $request->scenario_id,
                $request->content
            );

            return redirect()->route('admin.eventChat',[
                'scenarioId' => $request->scenario_id,
                'playerId'   => $request->player_id,
            ]);
        }

        return redirect()->route('admin.index');
    }
}
