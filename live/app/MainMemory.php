<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainMemory extends Model
{
    protected $table = 'main_memory';

    protected $fillable = ['player_id', 'item_id', 'owned_char_id', 'attitude', 'is_Lv', 'is_open_ecstasy', 'is_open_char'];

    protected $primaryKey = 'main_memory_id';
}
