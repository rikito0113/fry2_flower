<?php

namespace App\Http\Controllers;

// ライブラリの呼び出し
// use App\Library\PlayerCore;

// モデルの呼び出し
use App\OwnedCharacterData;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // My page
    public function my()
    {
        if ($this->_playerId) {
            $test = $this->_playerId;
        } else {
            $test = 100000;
        }

        // playerのgirl情報
        $allOwnedCharInfo = OwnedCharacterData::where('player_id', $this->_playerId)->get();

        return view('my')->with('test_1', $test)->with('owned_char_info', $allOwnedCharInfo);
    }
}
