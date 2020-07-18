<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlTermScore extends Model
{
    use App\Library\CompositePrimaryKeyTrait;

    protected $table = 'girl_term_score';

    protected $fillable = ['score'];

    protected $primaryKey = ['owned_char_id','term_id'];
}
