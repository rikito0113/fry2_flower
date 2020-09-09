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

    // イベント情報 詳細
    public function detail($eventId)
    {
        $event = Event::where('event_id', $eventId)->first();
        // $log = NewsLog::where('player_id', $this->_playerId)->where('event_id', $eventId)->first();

        // ログ作ってなかったらログ生成
        // if (!isset($log)) {
        //     $girlScoreInstance = new NewsLog;
        //     $girlScoreInstance->create([
        //         'player_id'     => $this->_playerId,
        //         'news_id'       => $newsId,
        //     ]);
        // }

        // // ないと思うがXSS対策
        // $log->content = str_replace("<br />", "\n", $log->content);

        return view('event.detail')
            ->with('event', $event);
    }
}
