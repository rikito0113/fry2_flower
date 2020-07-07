<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;

class GirlController extends Controller
{
    // My page
    public function index()
    {
        return view('girl.index');
    }

    // 登録時のgirl選択
    public function girlSelect($playerId)
    {
        $charInfo = CharacterData::latest()->get();
        return view('girl_select')->with('char_info', $charInfo)->with('player_id', $playerId);
    }

    // girl選択実行処理
    public function girlSelectExec($playerId, $charId)
    {
        // ここのwhereはsessionに変えてもいいかもしれない。
        $ownedCharInfo = OwnedCharacterData::where('char_id', $charId)->where('player_id', $playerId)->first();
        $playerInfo = Player::where('player_id', $playerId)->first();

        // playerDataを変更
        if ($ownedCharInfo) {
            $playerInfo->owned_char_id = $ownedCharInfo->owned_char_id;
            $playerInfo->save();
        }

        // ここのrouteを連想配列にしてもいい気がする
        return view('my')->with('player_info', $playerInfo);
    }
}
