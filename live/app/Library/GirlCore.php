<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\SetImg;
use App\CharacterImg;
use App\OwnedCharacterImg;
use App\Term;
use App\Subject;
use App\GirlTermSubject;
use App\GirlTermScore;

class GirlCore
{
    // girl選択 仮 もしかしたらいらないかも
    public static function girlSelect($playerId, $charId)
    {
        $ownedChar   = OwnedCharacterData::where('player_id', $playerId)->where('char_id', $charId)->first();
        $playerInfo  = Player::where('player_id', $playerId)->first();

        $playerInfo->owned_char_id = $ownedChar->owned_char_id;
        $playerInfo->save();

        return $playerInfo;
    }

    /**
     * girl情報をロードする
     *
     * @param int $ownedCharId
     * @return array $ownedCharInfo
     *
     */
    public static function girlLoad($ownedCharId)
    {
        $ownedChar = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();

        // img_infoの中身
        $setImgInfo = SetImg::where('owned_char_id', $ownedCharId)->first();
        $setImgInfo['img_name'] = CharacterImg::where('img_id', $setImgInfo->avatar_img)->first()->name;

        $ownedCharInfo = $ownedChar;
        $ownedCharInfo['char_name']         = CharacterData::where('char_id', $ownedChar->char_id)->first()->char_name;
        $ownedCharInfo['avatar_img']        = $setImgInfo->avatar_img;
        $ownedCharInfo['background_img']    = $setImgInfo->background_img;
        $ownedCharInfo['img_name']          = $setImgInfo->img_name;

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        // girl_term_scoreデータを取得
        $myGirlScoreInfo = GirlTermScore::where('owned_char_id', $ownedCharId)->where('term_id', $term->term_id)->first();
        if(!$myGirlScoreInfo)
        {
            // 点数情報がない場合
            $girlScoreInstance = new GirlTermScore;
            $girlScoreInstance->create([
                'owned_char_id' => $ownedCharId,
                'term_id'       => $term->term_id,
            ]);
            $myGirlScoreInfo = GirlTermScore::where('owned_char_id', $ownedCharId)->where('term_id', $term->term_id)->first();
        }

        // $ownedCharInfo['score'] = $myGirlScoreInfo['score'];
        // $girlSubjectId = GirlTermSubject::where('char_id', $ownedChar->char_id)->where('term_id', $term->term_id)->first();
        // $subjectName = Subject::where('subject_id', $girlSubjectId->subject_id)->first();
        // $ownedCharInfo['subject_name'] = $subjectName->subject_name;

        return $ownedCharInfo;
    }

    /**
     * set_imgを更新する
     *
     * @param int $playerId
     * @param int $imgId
     * @return array $setImgInfo
     *
     */
    public static function setImg($playerId, $imgId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();
        $ownedCharImg = OwnedCharacterImg::where('owned_char_id', $playerInfo->owned_char_id)->where('img_id', $imgId)->first();

        // エラー回避
        if (!$ownedCharImg || $ownedCharImg->num <= 0) return false;

        $setImgInfo = SetImg::where('owned_char_id', $playerInfo->owned_char_id)->first();
        if ($ownedCharImg->which_item == 'background') {
            $setImgInfo->background_img = $ownedCharImg->img_id;
        } else {
            $setImgInfo->avatar_img = $ownedCharImg->img_id;
        }
        $setImgInfo->save();

        return $setImgInfo;
    }

}