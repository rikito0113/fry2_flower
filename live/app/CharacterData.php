<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterData extends Model
{
    protected $table = 'character_data';

    protected $fillable = ['char_id', 'char_name', 'subject'];
}
