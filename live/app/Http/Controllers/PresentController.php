<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentController extends Controller
{
    // My page
    public function my()
    {
        return view('present.index');
    }
}
