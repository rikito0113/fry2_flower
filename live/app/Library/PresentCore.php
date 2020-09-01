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
     * @param int $memoryId
     * @return bool
     *
     */
    public static function updateRecieved($playerId, $memoryId)
    {
        $mainMemoryInfo = MainMemory::where('player_id', $playerId)->where('memory_id', $memoryId)->where('is_recieved', 0)->first();
        $mainMemoryInfo->is_recieved = true;
        $mainMemoryInfo->save();
        return true;
    }
}
