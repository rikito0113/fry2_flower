<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedTitle extends Model
{
    protected $table = 'owned_title';

    public $incrementing = false;

    protected $fillable = ['player_id','title_id'];

    protected $primaryKey = ['player_id','title_id'];
}
