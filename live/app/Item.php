<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = ['item_name', 'category', 'item_img', 'item_description', 'price', 'expiration_date'];

    protected $primaryKey = 'item_id';
}
