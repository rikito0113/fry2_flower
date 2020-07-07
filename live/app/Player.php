<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    protected $fillable = ['pf_player_id', 'name', 'owned_char_id'];

    protected $primaryKey = 'player_id';
}
