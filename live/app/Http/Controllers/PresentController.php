<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\MainMemory;

// ライブラリの呼び出し
use App\Library\PresentCore;

use Illuminate\Http\Request;

class PresentController extends Controller
{
    /////////////// present内でのmemoryが全てis_recieved=falseとする。 ///////////////

    // My page
    public function index()
    {
        $ownedMainMemoryLv   = MainMemory::where('player_id', $playerId)->where('owned_char_id', $ownedCharId)->where('is_Lv', 1)->where('is_recieved', 0)->get();

        return view('present.index')
            ->with('owned_main_memory_Lv', $ownedMainMemoryLv);
    }
}
