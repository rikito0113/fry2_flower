<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\AdminUser;
use App\Player;
use App\CharacterData;
use App\Title;

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
        return view('admin.index')
            ->with('menu', 'index');
    }

    // 未返信の会話
    public function sholdReply(Request $request)
    {
        return view('admin.shold_reply')
            ->with('menu', 'shold_reply');
    }

    // プレイヤー検索
    public function findPlayer(Request $request)
    {
        $getPlayer = false;

        if ($request->find_player) {
            $getPlayer = AdminCore::getPlayer($request);
        }

        return view('admin.find_player')
            ->with('get_players', $getPlayer)
            ->with('menu', 'find_player');
    }

    // プレイヤー詳細
    public function playerDetail($playerId)
    {
        if (isset($playerId)) {
            $playerInfo = Player::where('player_id', $playerId)->first();
            $chatInfo = AdminCore::getChatByPlayer($playerId);

            return view('admin.find_player')
                ->with('player_info', $playerInfo)
                ->with('chat_info', $chatInfo)
                ->with('menu', 'find_player');
        } else {
            return view('admin.find_player')
                ->with('menu', 'find_player');
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

            return redirect()->route('admin.player_detail', ['playerId' => $request->player_id]);
        }
        return redirect()->route('admin.index');
    }

    // アイテム検索
    public function findItem(Request $request)
    {
        return view('admin.find_item')
            ->with('menu', 'find_item');
    }

    // ガール検索
    public function findGirl(Request $request)
    {
        return view('admin.find_girl')
            ->with('menu', 'find_girl');
    }

    // 称号登録
    public function registerTitle()
    {

        $titles = Title::all();

        return view('admin.register_title')
            ->with('titles', $titles)
            ->with('menu', 'regist_title');
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

        return redirect()->route('admin.register_title');
    }
}
