<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\Player;

// ライブラリの呼び出し
use App\Library\ShopCore;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    // アイテム購入
    public function buyItem(Request $request)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        $buyResult = ShopCore::buyItem($playerInfo, $request->item_id);
        if (!$buyResult) {
            // こけてる
        }

        return view('shop.index');
    }
}
