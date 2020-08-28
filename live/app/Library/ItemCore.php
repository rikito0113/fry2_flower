<?php

namespace App\Library;
use App\Item;

class ItemCore
{
    public static function getItem($itemId)
    {
        return Item::where('item_id', $itemId)->first();
    }
}
