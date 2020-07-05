<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // My page
    public function my()
    {
        return view('my');
    }
}
