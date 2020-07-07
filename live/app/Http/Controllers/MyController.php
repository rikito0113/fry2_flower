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
        return view('my');
    }
}
