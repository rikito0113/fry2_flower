<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;

// ライブラリの呼び出し
use App\Library\GirlCore;

use Illuminate\Http\Request;

class GirlController extends Controller
{

    // My page
    public function index()
    {
        // 全てのgirl情報
        $charInfo = CharacterData::latest()->get();
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        return view('girl.index')
            ->with('char_info',         $charInfo)
            ->whith('owned_char_info',  $ownedCharInfo)
            ->with('player_info',       $playerInfo);
    }

    // 登録時のgirl選択
    public function girlSelect()
    {
        $charInfo = CharacterData::latest()->get();
        return view('girl_select')->with('char_info', $charInfo);
    }

    // girl選択実行処理
    public function girlSelectExec($charId)
    {
        $playerInfo = GirlCore::girlSelect($this->_playerId, $charId);

        return redirect()->route('girl.index');
    }
}
