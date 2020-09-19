<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\CharacterImg;
use App\Item;
use App\SetImg;
use App\OwnedTitle;
use App\OwnedItem;

// ライブラリの呼び出し
use App\Library\GirlCore;

// コンスタントの呼び出し
use App\Library\Constant;

use Illuminate\Support\Facades\Hash;

class TopCore
{
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

            // ここでchar_imgからデフォルトを取得しowned_character_imgを登録 avatar, bg, effect
            $defaultImg = CharacterImg::where('char_id', $girl->char_id)->orderBy('item_id', 'asc')->get()->take(Constant::DEFAULT_CHARACTER_IMG_NUM);
            foreach ($defaultImg as $key => $img) {
                $imgItem = Item::where('item_id', $img->item_id)->first();
                $ownedItemInstance = new OwnedItem;
                $ownedItemInstance->create([
                    'player_id'     => $playerInfo->player_id,
                    'item_id'       => $img->item_id,
                    'owned_char_id' => $charInstance->owned_char_id,
                ]);

                // $imgInstance = new OwnedCharacterImg;
                // $imgInstance->create([
                //     'owned_char_id' => $charInstance->owned_char_id,
                //     'player_id'     => $playerInfo->player_id,
                //     'item_id'       => $img->item_id,
                //     'num'           => 1,
                //     'category'      => $img->category,
                // ]);

                if ($img->category == Constant::ITEM_AVATAR) {
                    $avatarImg = $imgItem->item_img;
                } elseif ($img->category == Constant::ITEM_BG) {
                    $bgImg = $imgItem->item_img;
                }
            }

            // 同じくset_imgも登録
            $setImgInstance = new SetImg;
            $setImgInstance->create([
                'owned_char_id'      => $charInstance->owned_char_id,
                'char_id'            => $girl->char_id,
                'avatar_img'         => $avatarImg,
                'bg_img'             => $bgImg,
            ]);

        }

        // 1つ目の称号を付与
        $ownedTitleInstance = new OwnedTitle;
        $ownedTitleInstance->create([
            'player_id' => $playerInfo->player_id,
            'title_id'  => 1,
        ]);

        // defaultのowned_char_idをupdate
        GirlCore::girlSelect($playerInfo->player_id, Constant::DEFAULT_CHARACTER_ID);

        return $playerInfo->player_id;
    }
}
