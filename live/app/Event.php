<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = ['title', 'content', 'banner_img', 'start_time', 'end_time', 'content_img'];

    protected $primaryKey = 'event_id';
}
