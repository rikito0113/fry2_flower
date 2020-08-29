<?php

namespace App\Http\Controllers;

use App\Player;
use App\Title;
use App\OwnedTitle;
use App\ChangeNameAndTitle;
use App\OwnedCharacterData;

use App\Library\ProfileCore;
use App\Library\GirlCore;
use App\Library\StudyCore;

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

        // 称号情報を取得
        $title = Title::where('title_id', $playerInfo->title_id)->select('title_text')->first();

        $ownedTitles = OwnedTitle::where('player_id', $this->_playerId)->get();
        foreach($ownedTitles as $key => &$ownedTitle)
        {
            $titleInfo = Title::where('title_id', $ownedTitle->title_id)->first();
            $ownedTitle['title_text'] = $titleInfo->title_text;
        }

        // 名前・称号を変更したかどうか
        $isTodayNameChange = ChangeNameAndTitle::where('player_id',$this->_playerId)->where('change_date',date("Y-m-d"))->where('change_type',1)->first();
        $isTodayTitleChange = ChangeNameAndTitle::where('player_id',$this->_playerId)->where('change_date',date("Y-m-d"))->where('change_type',2)->first();

        $myRankInfo = StudyCore::getMyRankingByAll($this->_playerId);

        return view('profile.profile')
            ->with('player_info',           $playerInfo)
            ->with('owned_titles',          $ownedTitles)
            ->with('title',                 $title)
            ->with('is_name_change',        $isTodayNameChange)
            ->with('is_title_change',       $isTodayTitleChange)
            ->with('my_rank_info',          $myRankInfo)
            ;
    }

    // 名前変更確認
    public function changeNameConfirm(Request $request)
    {
        if (isset($request->name))
        {
            return view('profile/change_name_confirm')
                ->with('change_name',$request->name);
        }

        return redirect()->route('profile.profile');
    }

    // 名前変更実行
    public function changeNameExec(Request $request)
    {
        if (isset($request->name))
        {
            ProfileCore::changeName($this->_playerId, $request->name);
        }

        return redirect()->route('profile.profile');
    }

    // 名前変更確認
    public function changeTitleConfirm(Request $request)
    {
        if (isset($request->title_id))
        {
            $changeTitle = Title::where('title_id', $request->title_id)->first();
            return view('profile/change_title_confirm')
                ->with('change_title',$changeTitle);
        }

        return redirect()->route('profile.profile');
    }

    // 名前変更実行
    public function changeTitleExec(Request $request)
    {
        if (isset($request->title_id))
        {
            ProfileCore::changeTitle($this->_playerId, $request->title_id);
        }

        return redirect()->route('profile.profile');
    }
}
