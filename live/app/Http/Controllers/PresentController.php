<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\MainMemory;
use App\Item;

// ライブラリの呼び出し
use App\Library\PresentCore;

use Illuminate\Http\Request;

class PresentController extends Controller
{
    #################### present内でのmemoryが全てis_recieved=falseとする。 ####################

    // My page
    public function index()
    {
        $ownedMainMemoryLv = MainMemory::where('player_id', $this->_playerId)->where('is_Lv', 1)->where('is_recieved', 0)->get();
        if (!$ownedMainMemoryLv->isEmpty()) {
            // ある時はmemory_nameを追加
            foreach ($ownedMainMemoryLv as $key => &$row) {
                $row['memory_name'] = Item::where('item_id', $row->item_id)->first()->item_name;
            }
        }

        return view('present.index')
            ->with('owned_main_memory_Lv', $ownedMainMemoryLv);
    }

    public function recieveMemory($itemId)
    {
        // 受け取り処理
        PresentCore::updateRecieved($this->_playerId, $itemId);

        return redirect()->route('present.index');
    }
}
