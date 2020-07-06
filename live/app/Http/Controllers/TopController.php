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
        $player = Player::where('player_id', $request->player_id)->first;
        if ($player) {
            // index
        } else {
            // 登録

        }
    }
}
