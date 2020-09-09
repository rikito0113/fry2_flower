<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\Player;
use App\News;
use App\NewsLog;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::orderby('news_id', 'desc')->get();
        foreach($allNews as $key => &$row) {
            $log = NewsLog::where('player_id', $this->_playerId)->where('news_id', $row['news_id'])->first();
            $tmpNewsIds = array();
            if (isset($log)) {
                $row['is_read'] = true;
                $tmpNewsIds[$key] = $row['news_id'];
            }
        }

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

        // ないと思うがXSS対策
        $news->content = str_replace("<br />", "\n", $news->content);

        return view('news.detail')
            ->with('news', $news);
    }
}
