<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_user';

    protected $fillable = ['id', 'password'];

    protected $primaryKey = 'id';
}
