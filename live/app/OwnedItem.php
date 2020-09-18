<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedItem extends Model
{
    protected $table = 'owned_item';

    protected $fillable = ['player_id', 'item_id', 'num', 'expire_time'];

    protected $primaryKey = 'owned_item_id';
}
