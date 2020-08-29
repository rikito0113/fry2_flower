<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['news_id', 'title', 'content'];

    protected $primaryKey = 'news_id';
}
