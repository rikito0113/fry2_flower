<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventFixedPhrase extends Model
{
    protected $table = 'event_fixed_phrase';

    protected $fillable = ['content', 'scenario_id', 'content_index', 'attitude', 'is_auto'];

    protected $primaryKey = 'event_fixed_phrase_id';
}
