<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // login
    public function login()
    {
        return view('login');
    }

    // login処理実行
    public function loginExec()
    {
        
    }
}
