<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedCharacterData extends Model
{
    protected $table = 'owned_character_data';

    protected $fillable = ['player_id', 'char_id', 'level', 'exp', 'dere', 'tsun', 'remain_point'];

    protected $primaryKey = 'owned_char_id';
}
