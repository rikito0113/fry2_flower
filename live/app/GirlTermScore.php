<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlTermScore extends Model
{
    protected $table = 'girl_term_score';

    protected $fillable = ['girl_term_score_id','owned_char_id','term_id','score'];

    protected $primaryKey = 'girl_term_score_id';
}
