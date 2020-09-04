<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\MainMemory;
use App\Item;

// ライブラリの呼び出し

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }
}
