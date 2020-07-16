<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlTermScore extends Model
{
    protected $table = 'girl_term_score';

    protected $fillable = ['player_id' ,'owned_char_id', 'score', 'term_id' ];

    protected $primaryKey = ['player_id', 'owned_char_id','term_id'];
}
