<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetImg extends Model
{
    protected $table = 'set_img';

    protected $fillable = ['owned_char_id', 'char_id', 'bg_img', 'avatar_img', 'effect_img'];

    protected $primaryKey = 'owned_char_id';
}
