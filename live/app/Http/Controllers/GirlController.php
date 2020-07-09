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
        $charInfo = CharacterData::latest()->get();
        return view('girl.index')->with('char_info', $charInfo);
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

        return redirect()->route('my.my');
    }
}
