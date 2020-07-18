<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterData extends Model
{
    protected $table = 'character_data';

    protected $fillable = ['char_name'];

    protected $primaryKey = 'char_id';
}
