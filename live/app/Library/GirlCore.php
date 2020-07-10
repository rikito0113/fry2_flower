<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\SetImg;
use App\CharacterImg;

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
        $setImgInfo = SetImg::where('owned_char_id', $ownedCharId)->first();
        $setImgInfo['img_name'] = CharacterImg::where('img_id', $setImgInfo->background_img)->first()->name;

        $ownedCharInfo = array_merge($ownedChar, $setImgInfo);

        return $ownedCharInfo;
    }
}