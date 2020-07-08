<?php

namespace App\Http\Controllers;

// ライブラリの呼び出し
use App\Library\PlayerCore;

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
        return view('my')->with('test_1', $test);
    }
}
