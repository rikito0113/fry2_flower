<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProloguePhrase extends Model
{
    protected $table = 'prologue_phrase';

    protected $fillable = ['char_id', 'content', 'content_index'];
}
