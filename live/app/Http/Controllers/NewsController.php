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
        // $type = 1;
        // $kidoku = NewsLog::where('player_id', $this->_playerId)->get();
        // $news = News::all();
        // $allNews = array();
        // if (count($kidoku) != count($news)) {
        //     // echo count($kidoku);
        //     // echo count($news);
        //     $type = 2;
        // }
        // if (isset($kidoku[0]) && $type == 2) {
        //     foreach ($kidoku as $kRow) {
        //         $kidokuTmp[] = $kRow['news_id'];
        //     }
        //     foreach ($news as $nRow) {
        //         $newsTmp[] = $nRow['news_id'];
        //     }
        //     $allNewsId = array_diff($newsTmp, $kidokuTmp);
        //     foreach ($allNewsId as $row) {
        //         $allNews[] = News::where('news_id', $row)->first();
        //     }
        // } else {
        //     $allNews = $news;
        // }

        // if (!isset($allNews[0])) {
        //     $allNews = News::all();
        // }

        $allNews = News::all();
        foreach($allNews as &$row) {
            $log = NewsLog::where('player_id', $this->_playerId)->where('news_id', $row['news_id'])->first();
            if (isset($log)) {
                $row['is_read'] = true;
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
