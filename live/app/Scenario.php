<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenario_id';

    protected $fillable = ['start_datetime', 'end_datetime', 'field', 'place', 'daytime', 'char_id', 'default_background'];

    protected $primaryKey = 'scenario_id';
}
