<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\Player;
use App\Event;

// ライブラリの呼び出し

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $allEventInfo = Event::orderby('event_id', 'desc')->get();

        return view('event.index')
        ->with('all_event', $allEventInfo);
    }
}
