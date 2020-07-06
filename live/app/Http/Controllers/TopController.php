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
        $player = Player::where('player_id', $request->player_id)->first();
        if ($player) {
            // index
            return redirect()->route('/my');
        } else {
            // player登録
            $newPlayer = new Player;
            $newPlayer->player_id = $request->player_id;
            $newPlayer->pf_player_id = $request->pf_player_id;
            $newPlayer->name = $request->name;
            $newPlayer->save();
            return redirect()->route('/my');
        }
    }
}
