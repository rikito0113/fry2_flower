<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminChatLog extends Model
{
    protected $table = 'admin_chat_log';

    protected $fillable = ['player_id', 'admin_id', 'content', 'char_id', 'is_player'];

    protected $primaryKey = 'admin_chat_log';
}
