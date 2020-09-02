<?php

namespace App\Library;

// モデルの呼び出し
use App\MainMemory;

class PresentCore
{
    /**
     * 思い出受け取り処理
     *
     * @param int $playerId
     * @param int $itemId
     * @return bool
     *
     */
    public static function updateRecieved($playerId, $itemId)
    {
        $mainMemoryInfo = MainMemory::where('player_id', $playerId)->where('item_id', $itemId)->where('is_recieved', 0)->first();
        $mainMemoryInfo->is_recieved = true;
        $mainMemoryInfo->save();
        return true;
    }
}
