<?php

namespace App\Library;

class Constant
{
    // アイテムカテゴリー
    const ITEM_AVATAR           = 'avatar';
    const ITEM_BG               = 'bg';
    const ITEM_EFFECT           = 'effect';
    const ITEM_SHOP             = 'shop';
    const ITEM_TOOL             = 'tool';
    const ITEM_SCENE_NORMAL     = 'scene_normal';
    const ITEM_SCENE_ERO        = 'scene_ero';

    // キャラ関連
    const DEFAULT_CHARACTER_IMG_NUM = 2;                // bg, avatarの2個のみdefaultで付与(3個目はeffect)
    const DEFAULT_CHARACTER_ID      = 1;
    const ATTITUDE_DERE             = 'dere';
    const ATTITUDE_TSUN             = 'tsun';

    // 外へ行く関連
    const DAY_TIME_MORNING   = '10:00:00';
    const DAY_TIME_NOON      = '14:00:00';
    const DAY_TIME_NIGHT     = '19:00:00';
    const DAY_TIME_MIDNIGHT  = '';

    const MORNING  = 'morning';
    const NOON     = 'noon';
    const NIGHT    = 'night';
}