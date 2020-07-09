<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterImg extends Model
{
    protected $table = 'character_img';

    protected $fillable = ['name', 'which_item'];

    protected $primaryKey = 'img_id';
}
