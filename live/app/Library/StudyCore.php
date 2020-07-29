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

    
}