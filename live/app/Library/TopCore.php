<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;

use Illuminate\Support\Facades\Hash;

class TopCore
{
    // ログイン
    public static function login($PFPlayerId)
    {
        $playerInfo = Player::where('pf_player_id', $PFPlayerId)->first();
        self::updateHash($playerInfo->player_id);
        return $playerInfo;
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
        $ownedcharInfo = OwnedCharacterData::latest()->get();
        foreach ($ownedcharInfo as $key => $girl) {
            // charの数だけ生成
            $charObject = new CharacterData;
            $charObject->create([
                'player_id'     => $playerInfo->player_id,
                'char_id'       => $girl->char_id,
            ]);
        }
    }
}