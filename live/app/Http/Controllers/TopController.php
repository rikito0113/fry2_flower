<?php

namespace App\Http\Controllers;
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $this->updateHash($playerInfo->player_id);
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
        // createの返り値はauto incrementは入らない
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        $this->updateHash($playerInfo->player_id);

        // player毎のcharDataを作成
        $ownedcharInfo = OwnedCharacterData::latest()->get();
        foreach ($ownedcharInfo as $key => $girl) {
            // charの数だけ生成
            $charObject = new CharacterData;
            $charObject->create([
                'player_id'     => $playerInfo->player_id,
                'char_id'       => $girl->char_id,
            ]);
        }

        return redirect(route('girl_select', [
            'playerId' => $playerInfo->player_id,
        ]));
    }

    // ハッシュ値のupdate
    public function updateHash($playerId)
    {
        $hash = Hash::make($playerId);
        $player = Player::where('player_id', $playerId)->first();
        $player->hash = $hash;
        $player->save();

        // ハッシュ値をsessionに保管
        session(['hash' => $hash]);
    }

    // ハッシュ値の比較をしplayerを返す
    // @return array or bool
    public function getPlayerByHash()
    {
        // ハッシュ値を保持している時
        if (session()->has('hash')) {
            $hash = session('hash');
            $AllPlayer = Player::latest()->get();
            foreach ($AllPlayer as &$player) {
                if (Hash::check($hash, $player->hash)) {
                    return $player;
                }
            }
        }

        return false;
    }
}
