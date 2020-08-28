<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMemory extends Model
{
    protected $table = 'event_memory';

    protected $fillable = ['player_id', 'scenario_id', 'owned_char_id'];

    protected $primaryKey = 'event_memory_id';
}
