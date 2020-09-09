<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInfo extends Model
{
    protected $table = 'event_info';

    protected $fillable = ['title', 'content', 'banner_img', 'start_time', 'end_time', 'content_img'];

    protected $primaryKey = 'event_info_id';
}
