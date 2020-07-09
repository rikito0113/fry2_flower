<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedCharacterImg extends Model
{
    protected $table = 'owned_character_img';

    protected $fillable = ['owned_char_id', 'player_id', 'img_id', 'num', 'which_item'];

    // protected $primaryKey = 'char_id';
}
