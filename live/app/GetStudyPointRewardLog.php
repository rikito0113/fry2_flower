<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetStudyPointRewardLog extends Model
{
    protected $table = 'get_study_point_reward_log';

    protected $fillable = ['player_id', 'char_id', 'term_id', 'reward_id'];

    protected $primaryKey = 'log_id';
}
