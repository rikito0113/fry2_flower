<?php

namespace App\Http\Controllers;

use App\Player;
use App\News;
use App\NewsLog;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::get();
        foreach($allNews as $key => &$row) {
            $log = NewsLog::where('player_id', $this->_playerId)->where('news_id', $row['news_id'])->first();
            $tmpNewsIds = array();
            if (isset($log)) {
                $row['is_read'] = true;
                $tmpNewsIds[$key] = $row['news_id'];
            }
        }
        // 逆順
        $allNews = array_reverse($allNews);

        return view('news.index')
        ->with('all_news', $allNews);
    }

    // ツン・デレポイント/達成報酬
    public function detail($newsId)
    {
        $news = News::where('news_id', $newsId)->first();
        $log = NewsLog::where('player_id', $this->_playerId)->where('news_id', $newsId)->first();

        // ログ作ってなかったらログ生成
        if (!isset($log)) {
            $girlScoreInstance = new NewsLog;
            $girlScoreInstance->create([
                'player_id'     => $this->_playerId,
                'news_id'       => $newsId,
            ]);
        }

        return view('news.detail')
            ->with('news', $news);
    }
}
