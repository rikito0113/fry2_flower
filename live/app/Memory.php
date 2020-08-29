<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $table = 'memory';

    protected $fillable = ['char_id', 'memory_name'];

    protected $primaryKey = 'memory_id';
}
