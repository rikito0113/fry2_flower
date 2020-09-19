<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerChatLog extends Model
{
    protected $table = 'player_chat_log';

    protected $fillable = ['player_id', 'content', 'char_id', 'char_avatar_img', 'char_effect_img', 'char_bg_img', 'is_player', 'is_read'];

    protected $primaryKey = 'player_chat_log_id';
}
