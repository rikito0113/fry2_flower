<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\CharacterImg;
use App\OwnedCharacterImg;
use App\SetImg;
use App\OwnedTitle;

// ライブラリの呼び出し
use App\Library\GirlCore;

use Illuminate\Support\Facades\Hash;

class TopCore
{
    // デフォルトの背景id
    const DEFAULT_BACKGOUND_ID = 11;

    // ログイン
    public static function login($PFPlayerId)
    {
        $playerInfo = Player::where('pf_player_id', $PFPlayerId)->first();

        // playerがない場合はfalse
        if (!$playerInfo)
            return false;
        else {
            self::updateHash($playerInfo->player_id);
            return $playerInfo;
        }
    }

    // ハッシュ値をupdate
    public static function updateHash($playerId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();
        $hash = Hash::make($playerId);
        $playerInfo->hash = $hash;
        $playerInfo->save();

        // ハッシュ値をsessionに保持
        session(['hash' => $hash]);
    }

    // 会員登録
    // 返り値を入れてもいいかもしれない fujiwara
    public static function register($request)
    {

        // player登録
        $instance = new Player;
        $playerInfo = $instance->create([
            'pf_player_id'   => $request->pf_player_id,
            'name'           => $request->name
        ]);

        // createの返り値はauto incrementは入らないため再度get
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        self::updateHash($playerInfo->player_id);

        // player毎のcharDataを作成
        $allCharInfo = CharacterData::latest()->get();
        foreach ($allCharInfo as $key => $girl) {
            // charの数だけ生成
            $charInstance = new OwnedCharacterData;
            $charInstance->create([
                'player_id'     => $playerInfo->player_id,
                'char_id'       => $girl->char_id,
            ]);
            $charInstance = OwnedCharacterData::where('player_id', $playerInfo->player_id)->where('char_id', $girl->char_id)->first();

            // ここでchar_imgからデフォルトを取得し、owned_character_imgを登録 girls×row
            $defaultImg = CharacterImg::where('char_id', $girl->char_id)->orderBy('item_id', 'asc')->first();
            $imgInstance = new OwnedCharacterImg;
            $imgInstance->create([
                'owned_char_id' => $charInstance->owned_char_id,
                'player_id'     => $playerInfo->player_id,
                'item_id'        => $defaultImg->item_id,
                'num'           => 1,
                'category'    => $defaultImg->category,
            ]);

            // 同じくset_imgも登録
            $setImgInstance = new SetImg;
            $setImgInstance->create([
                'owned_char_id' => $charInstance->owned_char_id,
                'char_id'       => $girl->char_id,
                'background_img'=> self::DEFAULT_BACKGOUND_ID,
                'avatar_form_img'    => $defaultImg->item_id,
            ]);

        }

        // 1つ目の称号を付与
        $ownedTitleInstance = new OwnedTitle;
        $ownedTitleInstance->create([
            'player_id' => $playerInfo->player_id,
            'title_id'  => 1,
        ]);

        // defaultのowned_char_idをupdate のちにconstant.phpとか制御
        GirlCore::girlSelect($playerInfo->player_id, 1);
    }
}
