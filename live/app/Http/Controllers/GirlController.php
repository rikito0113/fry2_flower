<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\OwnedCharacterImg;
use App\PlayerChatLog;


// ライブラリの呼び出し
use App\Library\GirlCore;

use Illuminate\Http\Request;

class GirlController extends Controller
{

    // My page
    public function index()
    {
        // 全てのgirl情報
        $charInfo = CharacterData::latest()->get();
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        // 所持中のimg情報
        $ownedCharImg = OwnedCharacterImg::where('owned_char_id', $playerInfo->owned_char_id)->get();

        return view('girl.index')
            ->with('char_info',         $charInfo)
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('owned_char_img',    $ownedCharImg)
            ->with('player_info',       $playerInfo);
    }

    // 登録時のgirl選択
    public function girlSelect()
    {
        $charInfo = CharacterData::latest()->get();
        return view('girl_select')->with('char_info', $charInfo);
    }

    // girl選択実行処理
    public function girlSelectExec($charId)
    {
        $playerInfo = GirlCore::girlSelect($this->_playerId, $charId);

        return redirect()->route('girl.index');
    }

    // set_img実行処理
    public function setImgExec($imgId)
    {
        $setImgInfo = GirlCore::setImg($this->_playerId, $imgId);

        // エラー用
        // if ($setImgInfo) {
        //     # code...
        // }

        return redirect()->route('girl.index');
    }

    public function mainChat($charId)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        return view('girl.main-chat')
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('player_info',       $playerInfo);
    }

    public function mainChatSend(Request $request)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        $chatInstance = new PlayerChatLog;
        $chatInstance->create([
            'player_id'           => $this->_playerId,
            'content'             => 'あああ',
            'char_id'             => 1,
            'char_avatar_id'      => 1,
            'char_background_id'  => 1,
            'is_player'           => 0,
        ]);

        // プレイヤーの送った情報をinsert
        return view('girl.main-chat')
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('player_info',       $playerInfo);
    }
}
