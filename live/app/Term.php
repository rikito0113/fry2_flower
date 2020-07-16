<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'term';

    protected $fillable = ['term_id', 'term_name' ,'term_start', 'term_end' ];

    protected $primaryKey = 'term_id';
}
