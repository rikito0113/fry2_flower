<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpLookup extends Model
{
    protected $table = 'exp_lookup';

    protected $fillable = ['level', 'exp'];

    protected $primaryKey = 'id';
}
