<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerChatLog extends Model
{
    protected $table = 'player_chat_log';

    protected $fillable = ['player_id', 'content', 'char_id', 'char_avatar_id', 'char_effect_id', 'char_bg_id', 'is_player', 'is_read'];

    protected $primaryKey = 'player_chat_log_id';
}
