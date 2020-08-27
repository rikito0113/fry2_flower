<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetImg extends Model
{
    protected $table = 'set_img';

    protected $fillable = ['owned_char_id', 'char_id', 'background_img', 'avatar_form_img', 'avatar_hair_img'];

    protected $primaryKey = 'owned_char_id';
}
