<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewardLevel extends Model
{
    protected $table = 'reward_level';

    protected $fillable = ['level', 'char_id', 'attitude', 'item_id'];
}
