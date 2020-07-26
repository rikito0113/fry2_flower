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
    public static function upScore($ownedCharId, $addSocre)
    {
        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        
        $myGirlScoreInfo = GirlTermScore::where([['owned_char_id', $ownedCharId],['term_id', $term->term_id]])->first();

        $newScore = $myGirlScoreInfo->score + $addSocre;
        $myGirlScoreInfo->score = $newScore;
        $myGirlScoreInfo->update($myGirlScoreInfo);

        return true;
    }

    
}