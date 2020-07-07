<?php

namespace App\Http\Controllers;
use App\Player;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // login
    public function login()
    {
        // ログイン処理execでhashをsessionに入れる
        if (session()->has('hash')) {
            return redirect()->route('top.loginExec');
        }
        return view('login');
    }

    // login処理実行
    public function loginExec(Request $request)
    {
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        if ($playerInfo) {
            // index
            return redirect()->route('my.my');
        }

        return view('register');
    }

    // register
    public function register()
    {
        // sessionの確認 未実装
        if (session()->has('hash')) {
            return redirect()->route('top.loginExec');
        }
        return view('register');
    }

    // 会員登録実行処理
    public function registerExec(Request $request)
    {
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        if ($playerInfo) {
            // playerInfoをwithにできる
            return redirect()->route('my.my');
        }
        // player登録
        $instance = new Player;
        $playerInfo = $instance->create([
            'pf_player_id'   => $request->pf_player_id,
            'name'           => $request->name
        ]);

        return redirect()->route('my.my');
    }
}
