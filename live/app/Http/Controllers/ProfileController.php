<?php

namespace App\Http\Controllers;

use App\Player;
use App\Title;
use App\OwnedTitle;
use App\ChangeNameAndTitle;
use App\OwnedCharacterData;

use App\Library\Profile;
use App\Library\GirlCore;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // プロフィールページ
    public function profile()
    {
        // playerのgirl情報
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        $title = Title::where('title_id', $playerInfo->title_id)->select('title_text')->first();

        $ownedTitles = OwnedTitle::where('player_id', $this->_playerId)->get();
        
        return view('profile.profile')
            ->with('player_info',  $playerInfo)
            ->with('owned_titles', $ownedTitles)
            ->with('title',        $title);
    }

    // 名前変更確認
    public function changeNameConfirm(Request $request)
    {
        if (isset($request->name)) 
        {
            return view('profile.changeNameConfirm')
                ->with('change_name',$request->name);
        }
            
        return redirect()->route('profile.profile');
    }

    // 名前変更確認
    public function changeNameExec($changeName)
    {
        if (isset($changeName)) 
        {
            ProfileCore::changeName($this->_playerId, $changeName);
        }
            
        return redirect()->route('profile.profile');
    }
}
