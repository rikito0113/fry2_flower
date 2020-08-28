<?php

namespace App\Library;

// モデルの呼び出し
use App\Player;
use App\Title;
use App\OwnedTitle;
use App\ChangeNameAndTitle;
use App\Subject;
use App\Term;
use App\GirlTermSubject;
use App\GirlTermScore;


// ライブラリの呼び出し
use App\Library\GirlCore;

use Illuminate\Support\Facades\Hash;

class StudyCore
{
    
    // 点数UP
    public static function upScore($playerId, $ownedCharId, $addScore)
    {
        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        
        $myGirlScoreInfo = GirlTermScore::where('owned_char_id', $ownedCharId)->where('term_id', $term->term_id)->first();

        $newScore = $myGirlScoreInfo->score + $addScore;
        $myGirlScoreInfo->score = $newScore;
        $myGirlScoreInfo->save();

        $playerInfo = Player::where('player_id', $playerId)->first();

        $newStudyPoint = $playerInfo->study_point - $addScore;
        $playerInfo->study_point = $newStudyPoint;
        $playerInfo->save();

        return true;
    }

    // 勉学ptランキング・女の子別
    public static function getRankingByCharId($charId)
    {
        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        
        $rankingData = GirlTermScore::where('char_id', $charId)->where('term_id', $term->term_id)->orderBy('score', 'desc')->get();

        // Todo:ランキングデータをソートしてランク付け 同じポイントは同じランクだが表示順は獲得勉学ポイントが多い方が上

        // ランク付け
        $rankingData = self::attachRanking($rankingData, 'score');

        foreach($rankingData as $key => $rankingChar)
        {
            $playerInfo = Player::where('player_id',$rankingChar->player_id)->first();
            $title = Title::where('title_id', $playerInfo->title_id)->first();
            $playerInfo['title'] = $title->title_text;
            $rankingData[$key]['player_data'] = $playerInfo;
        }

        return $rankingData;
    }

    // 勉学ptランキング・総合
    public static function getRankingByAll()
    {
        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        
        $rankingData = GirlTermScore::selectRaw('`player_id`, sum(score) AS sum_score')
                                        ->groupBy('player_id')
                                        ->orderBy('sum_score','desc')
                                        ->get();

        // Todo:ランキングデータをソートしてランク付け 同じポイントは同じランクだが表示順は獲得勉学ポイントが多い方が上

        // ランク付け
        $rankingData = self::attachRanking($rankingData, 'sum_score');

        foreach($rankingData as $key => $rankingChar)
        {
            $playerInfo = Player::where('player_id',$rankingChar->player_id)->first();
            $title = Title::where('title_id', $playerInfo->title_id)->first();
            $playerInfo['title'] = $title->title_text;
            $rankingData[$key]['player_data'] = $playerInfo;
        }

        return $rankingData;
    }

    // 自分の総合ランキング
    public static function getMyRankingByAll($playerId)
    {
        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        
        $rankingData = GirlTermScore::selectRaw('`player_id`, sum(score) AS sum_score')
                                        ->groupBy('player_id')
                                        ->orderBy('sum_score','desc')
                                        ->get();
        
        // Todo:ランキングデータをソートしてランク付け 同じポイントは同じランクだが表示順は獲得勉学ポイントが多い方が上

        // ランク付け
        $rankingData = self::attachRanking($rankingData, 'sum_score');
        
        $myRankInfo = false;
        foreach($rankingData as $key => $rankingChar)
        {
            if($playerId == $rankingChar->player_id)
            {
                $myRankInfo = $rankinChar;
            }
        }

        return $myRankInfo;
    }

    // ランク付け　同じポイントは同じランク
    // 先に同率の場合などのソートをしてから使う
    public static function attachRanking($rankingData, $colum)
    {
        $rank = 1;
        $tieRankNum = 0;
        foreach($rankingData as $key => $rankingChar)
        {
            if($key != 0)
            {
                if($rankingData[$key - 1][$colum] != $rankingChar[$colum])
                {
                    $rank = $rank + 1 + $tieRankNum;
                    $tieRankNum = 0;
                }
                else
                {
                    $tieRankNum++;
                }
            }

            $rankingData[$key]['rank'] = $rank;
        }
    }

    
}