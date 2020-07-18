<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeNameAndTitle extends Model
{
    use App\Library\CompositePrimaryKeyTrait;
    
    protected $table = 'change_name_and_title';

    protected $fillable = ['player_id','change_type', 'change_date'];

    protected $primaryKey = ['player_id','change_type', 'change_date'];
}
