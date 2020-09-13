<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorialPhrase extends Model
{
    protected $table = 'tutorial_phrase';

    protected $fillable = ['content', 'img_id', 'is_player'];

    protected $primaryKey = 'tutorial_id';
}
