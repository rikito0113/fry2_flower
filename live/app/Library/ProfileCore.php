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

class ProfileCore
{
    const CHANGE_NAME  = 1;
    const CHANGE_TITLE = 2;
    
    // 名前変更
    public static function changeName($playerId, $changeName)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();

        // Todo:バリデーション

        // playerがない場合はfalse
        if (!$playerInfo)
        {
            return false;
        }
        else 
        {
            $isTodayChangeName = ChangeNameAndTitle::where('player_id',$playerId)->where('change_date',date("Y-m-d"))->where('change_type',self::CHANGE_NAME)->first();
            if(!isset($isTodayChangeName))
            {
                $playerInfo->name = $changeName;
                $playerInfo->save();
                $changeNameInstance = new ChangeNameAndTitle;
                $changeNameInstance->create([
                    'player_id'   => $playerId,
                    'change_date' => date("Y-m-d"),
                    'change_type' => self::CHANGE_NAME
                ]);
            }
            else
            {
                return false;
            }
        }

        return true;
    }

    // 称号変更
    public static function changeTitle($playerId, $titleId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();

        // Todo:バリデーション

        // playerがない場合はfalse
        if (!$playerInfo)
        {
            return false;
        }
        else 
        {
            $isTodayChangeTitle = ChangeNameAndTitle::where('player_id',$playerId)->where('change_date',date("Y-m-d"))->where('change_type',self::CHANGE_TITLE)->first();
            if(!isset($isTodayChangeTitle))
            {
                $playerInfo->title_id = $titleId;
                $playerInfo->save();
                $changeNameInstance = new ChangeNameAndTitle;
                $changeNameInstance->create([
                    'player_id'   => $playerId,
                    'change_date' => date("Y-m-d"),
                    'change_type' => self::CHANGE_TITLE
                ]);
            }
            else
            {
                return false;
            }
        }

        return true;
    }

    
}