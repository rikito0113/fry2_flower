<?php

namespace App\Library;
use App\Item;

class ItemCore
{
    // アイテムカテゴリー
    const ITEM_AVATER_FORM     = 'avatar_form';
    const ITEM_BACKGROUND      = 'bg';
    const ITEM_AVATER_HAIR     = 'avatar_hair';
    const ITEM_SHOP            = 'shop';
    const ITEM_TOOL            = 'tool';
    const ITEM_SCENE_NORMAL    = 'scene_normal';
    const ITEM_SCENE_ERO       = 'scene_ero';

    public static function getItem($itemId)
    {
        return Item::where('item_id', $itemId)->first();
    }
}
