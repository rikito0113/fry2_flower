<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPointReward extends Model
{
    protected $table = 'study_point_reward';

    protected $fillable = ['char_id', 'attitude', 'term_id', 'need_study_point', 'item_id', 'category', 'num'];

    protected $primaryKey = 'reward_id';
}
