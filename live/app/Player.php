<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    protected $fillable = ['player_id', 'pf_player_id', 'name', 'owned_char_id'];
}
