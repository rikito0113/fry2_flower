<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerEventChatLog extends Model
{
    protected $table = 'player_event_chat_log_id';

    protected $fillable = ['player_id', 'content', 'scenario_id', 'is_player', 'is_read'];

    protected $primaryKey = 'player_event_chat_log_id';
}
