<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInfoLog extends Model
{
    protected $table = 'event_info_log';

    protected $fillable = ['player_id', 'event_info_id'];

    protected $primaryKey = 'event_info_log_id';
}
