<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GirlController extends Controller
{
    // My page
    public function index()
    {
        return view('girl.index');
    }
}
