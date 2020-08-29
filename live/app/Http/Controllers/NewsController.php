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
        $type = 1;
        $kidoku = NewsLog::where('player_id', $this->_playerId)->get();
        $news = News::all();
        if (count($kidoku) != count($news)) {
            $type = 2;
        }
        if (isset($kidoku[0])) {
            foreach ($kidoku as $kRow) {
                $kidokuTmp[] = $kRow['news_id'];
            }
            foreach ($news as $nRow) {
                $newsTmp[] = $nRow['news_id'];
            }
            $allNewsId = array_diff($newsTmp, $kidokuTmp);
            foreach ($allNewsId as $row) {
                $allNews[] = News::where('news_id', $row);
            }
        } else {
            $allNews = $news;
        }

        return view('news.index')
        ->with('all_news', $allNews)
        ->with('type', $type);
    }

    // ツン・デレポイント/達成報酬
    public function detail($newsId)
    {
        $news = News::where('news_id', $newsId)->first();
        $log = NewsLog::where('player_id', $this->_playerId)->where('news_id', $newsId)->first();

        // ログ作ってなかったらログ生成
        if (!isset($log[0])) {
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
