<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\CharacterImg;
use App\OwnedCharacterImg;
use App\SetImg;
use App\PlayerChatLog;


// ライブラリの呼び出し

use Illuminate\Support\Facades\Hash;

class PlayerChatCore
{
    public static function playerSend($playerId, $charId, $content, $ownedCharInfo)
    {
        if (!$playerId || !$charId || !$content || $ownedCharInfo) {
            return false;
        }
        $chatInstance = new PlayerChatLog;
        $chatInstance->create([
            'player_id'           => $playerId,
            'content'             => $content,
            'char_id'             => $charId,
            'char_avatar_id'      => $ownedCharInfo->avatar_img,
            'char_background_id'  => $ownedCharInfo->background_img,
            'is_player'           => true,
        ]);
        return true;
    }
}
