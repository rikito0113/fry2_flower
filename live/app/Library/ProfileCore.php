<?php

namespace App\Library;

// モデルの呼び出し
use App\Player;
use App\Title;
use App\OwnedTitle;
use App\ChangeNameAndTitle;

// ライブラリの呼び出し
use App\Library\GirlCore;

use Illuminate\Support\Facades\Hash;

class ProfileController
{
    const CHANGE_NAME  = 1;
    const CHANGE_TITLE = 2;
    
    // ログイン
    public static function changeName($playerId, $changeName)
    {
        $playerInfo = Player::where('player_id', $PlayerId)->first();

        // Todo:バリデーション

        // playerがない場合はfalse
        if (!$playerInfo)
        {
            return false;
        }
        else 
        {
            $isTodayChangeName = ChangeNameAndTitle::where('player_id',$playerId)->with('change_date',date("Y-m-d"))->first();
            if(!isset($isTodayChangeName))
            {

                $playerInfo->name = $changeName;
                $changeNameInstance = new ChangeNameAndTitle;
                $changeNameInstance->create([
                    'player_id'   => $playerId,
                    'change_date' => date("Y-m-d"),
                    'change_type' => self::CHANGE_NAME
                ]);
            }
        }

        return true;
    }

    
}