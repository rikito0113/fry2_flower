<?php

namespace App\Library;
use App\Item;
use App\OwnedItem;
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

        // owned_itemを更新
        if (!$itemInfo->expiration_date) {
            // 期限がないitemの時
            $ownedItem = OwnedItem::where('item_id', $itemId)->where('player_id', $playerId)->where('owned_char_id', $ownedCharId)->first();
            if ($ownedItem) {
                // あるとき
                $ownedItem->num += $num;
                $ownedItem->save();
            } else {
                // ないとき
                $ownedItemInstance = new OwnedItem;
                $ownedItemInstance->create([
                    'player_id'      => $playerId,
                    'item_id'        => $itemId,
                    'owned_char_id'  => $ownedCharId,
                    'num'            => $num,
                ]);
            }
        } elseif ($itemInfo->expiration_date == 1) {
            // 当日に消えるitemの時
            $date = date('Y-m-d 00:00:00');
            $ownedItemInstance = new OwnedItem;
            $ownedItemInstance->create([
                'player_id'      => $playerId,
                'item_id'        => $itemId,
                'owned_char_id'  => $ownedCharId,
                'num'            => $num,
                'expire_time'    => $date,
            ]);
        } elseif ($itemInfo->expiration_date == 2) {
            // 次の日に消えるitemの時
            $date = date('Y-m-d H:i:s', strtotime('+1 day'));
            $ownedItemInstance = new OwnedItem;
            $ownedItemInstance->create([
                'player_id'      => $playerId,
                'item_id'        => $itemId,
                'owned_char_id'  => $ownedCharId,
                'num'            => $num,
                'expire_time'    => $date,
            ]);
        }

        // アイテムのカテゴリごとに格納する場所変わる
        if($itemInfo->category == Constant::ITEM_SCENE_NORMAL)
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
