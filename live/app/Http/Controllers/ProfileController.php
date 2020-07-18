<?php

namespace App\Http\Controllers;

use App\Player;
use App\Title;
use App\OwnedTitle;
use App\ChangeNameAndTitle;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // プロフィールページ
    public function profile()
    {
        // playerのgirl情報
        // $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        // $allOwnedCharInfo = array();
        // foreach ($allOwnedCharId as $key => $ownedCharId) {
        //     $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        // }

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        $title = Title::where('title_id', $playerInfo->title_id)->first();

        
        
        return view('profile.profile')->with('player_info', $playerInfo);
    }
}
