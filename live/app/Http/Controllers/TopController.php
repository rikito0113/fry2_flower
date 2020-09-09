<?php

namespace App\Http\Controllers;


// モデルの呼び出し
use App\Player;

// HTTP通信用
use GuzzleHttp\Client;

// ライブラリの呼び出し
use App\Library\TopCore;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // login
    public function index()
    {
        // ログイン処理execでhashをsessionに入れる
        if (isset($this->_playerId)) {
            return redirect()->route('my.my');
        }
        return view('index');
    }

    public function login()
    {
        // ログイン処理execでhashをsessionに入れる
        if (isset($this->_playerId)) {
            return redirect()->route('my.my');
        }
        return view('login');
    }

    // login処理実行
    public function loginExec(Request $request)
    {
        echo $request->pf_player_id;
        $playerInfo = TopCore::login($request->pf_player_id);

        if (isset($playerInfo) && $playerInfo != false)
            return redirect()->route('my.my');
        else
            return view('register');
    }

    // register
    public function register()
    {
        // sessionの確認 未実装
        if (isset($this->_playerId))
            return redirect()->route('my.my');
        else
            return view('register');
    }

    // 会員登録実行処理
    public function registerExec(Request $request)
    {
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        if ($playerInfo) {
            TopCore::updateHash($playerInfo->player_id);
            return redirect()->route('my.my');
        } else {
            // 会員登録
            TopCore::register($request);
            return redirect()->route('my.my');
        }
    }
}
