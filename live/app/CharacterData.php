<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterData extends Model
{
    protected $table = 'character_data';

    protected $fillable = ['char_name', 'subject'];

    protected $primaryKey = 'char_id';
}
