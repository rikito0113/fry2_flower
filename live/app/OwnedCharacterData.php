<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedCharacterData extends Model
{
    protected $table = 'owned_character_data';

    protected $fillable = ['player_id', 'char_id', 'level', 'exp', 'dere', 'tun', 'remain_point'];
}
