<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedTitle extends Model
{
    use Library\CompositePrimaryKeyTrait;

    protected $table = 'owned_title';

    protected $fillable = ['player_id','title_id'];

    protected $primaryKey = ['player_id','title_id'];
}
