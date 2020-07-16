<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'title';

    protected $fillable = ['title_id', 'title_text'];

    protected $primaryKey = 'title_id';
}
