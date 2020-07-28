<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminEventChatLog extends Model
{
    protected $table = 'admin_event_chat_log';

    protected $fillable = ['player_id', 'admin_id', 'content', 'scenario_id', 'is_player'];

    protected $primaryKey = 'admin_event_chat_log';
}
