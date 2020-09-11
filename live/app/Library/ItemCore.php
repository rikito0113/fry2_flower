<?php

namespace App\Library;
use App\Item;
use App\OwnedCharacterImg;
use App\MainMemory;

class ItemCore
{
    public static function getItem($itemId)
    {
        return Item::where('item_id', $itemId)->first();
    }

    /**
     * アイテムの付与
     * @param int    $playerId
     * @param int    $ownedCharId
     * @param string $attitude     tsun or dere
     * @param int    $itemId
     * @param int    $num
     * @param bool   $isLv         true:level reward, false:study point reward or gacha
     * @return bool
     */
    public static function appendItem($playerId, $ownedCharId, $attitude, $itemId, $num, $isLv = false)
    {
        // アイテム情報取得
        $itemInfo = Item::where('item_id', $itemId)->first();

        // アイテムのカテゴリごとに格納する場所変わる
        if($itemInfo->category == Constant::ITEM_AVATAR || $itemInfo->category == Constant::ITEM_EFFECT || $itemInfo->category == Constant::ITEM_BG)
        {
            // owned_character_img
            $imgInstance = new OwnedCharacterImg;
            $imgInstance->create([
                'owned_char_id' => $ownedCharId,
                'player_id'     => $playerId,
                'item_id'       => $playerId,
                'num'           => $num,
                'category'      => $itemInfo->category,
            ]);

        }
        elseif($itemInfo->category == Constant::ITEM_SCENE_NORMAL)
        {
            // event_memory
        }
        elseif($itemInfo->category == Constant::ITEM_SCENE_ERO)
        {
            // main_memory
            // 思ひ出の付与
            $mainMem = new MainMemory;
            $mainMem->create([
                'player_id'     => $playerId,
                'item_id'       => $itemId,
                'owned_char_id' => $ownedCharId,
                'attitude'      => $attitude,
                'is_Lv'         => $isLv,
            ]);

            if($isLv == false)
            {
                $mainMemoryInfo = MainMemory::where('player_id', $playerId)->where('item_id', $itemId)->where('is_recieved', 0)->first();
                $mainMemoryInfo->is_recieved = true;
                $mainMemoryInfo->save();
            }
        }
        else
        {
            // owned_item or stock_item
            // 使用期限の有無
        }

        return true;
    }
}
