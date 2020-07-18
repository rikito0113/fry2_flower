<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlTermSubject extends Model
{
    protected $table = 'girl_term_subject';

    public $incrementing = false;

    protected $fillable = ['char_id' ,'subject_id', 'term_id' ];

    protected $primaryKey = ['char_id', 'term_id'];
}
