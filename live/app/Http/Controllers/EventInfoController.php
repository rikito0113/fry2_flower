<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\Player;
use App\EventInfo;
use App\EventInfoLog;

use Illuminate\Http\Request;

class EventInfoController extends Controller
{
    public function index()
    {
        $allEventInfo = EventInfo::orderby('event_info_id', 'desc')->get();

        return view('event_info.index')
        ->with('all_event_info', $allEventInfo);
    }

    // イベント情報 詳細
    public function detail($eventInfoId)
    {
        $eventInfo = EventInfo::where('event_info_id', $eventInfoId)->first();
        $log = EventInfoLog::where('player_id', $this->_playerId)->where('event_info_id', $eventInfoId)->first();

        // ログ作ってなかったらログ生成
        if (!$log) {
            $girlScoreInstance = new EventInfoLog;
            $girlScoreInstance->create([
                'player_id'     => $this->_playerId,
                'event_info_id' => $eventInfoId,
            ]);
            $eventInfo->is_read = false;
        } else {
            $eventInfo->is_read = true;
        }

        // // ないと思うがXSS対策
        $eventInfo->content = str_replace("<br />", "\n", $eventInfo->content);

        return view('event_info.detail')
            ->with('event_info', $eventInfo);
    }
}
