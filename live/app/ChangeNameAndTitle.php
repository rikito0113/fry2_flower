<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeNameAndTitle extends Model
{
    protected $table = 'change_name_and_title';

    public $incrementing = false;

    protected $fillable = ['change_type', 'change_date'];

    protected $primaryKey = ['player_id'];

}
