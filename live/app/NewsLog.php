<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLog extends Model
{
    protected $table = 'news_log';

    protected $fillable = ['player_id', 'news_id'];

    protected $primaryKey = 'log_id';
}
