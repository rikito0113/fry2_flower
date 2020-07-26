<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlTermScore extends Model
{
    protected $table = 'girl_term_score';

    protected $fillable = ['owned_char_id','term_id','score'];

    public $incrementing = false;

    protected $primaryKey = ['owned_char_id'];
}
