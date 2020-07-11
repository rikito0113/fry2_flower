<?php

namespace App\Http\Controllers;

// ライブラリの呼び出し
use App\Library\GirlCore;

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
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        return view('my')->with('test_1', $test)->with('owned_char_info', $allOwnedCharInfo);
    }
}
