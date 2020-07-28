<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerScenarioData extends Model
{
    protected $table = 'player_scenario_data';

    protected $fillable = ['player_id', 'scenario_id', 'scenario_num', 'is_read'];

    protected $primaryKey = 'player_scenario_id';
}
