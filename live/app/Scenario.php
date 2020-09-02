<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenario';

    protected $fillable = ['start_datetime', 'end_datetime', 'field', 'place', 'daytime', 'char_id', 'title', 'default_background'];

    protected $primaryKey = 'scenario_id';
}
