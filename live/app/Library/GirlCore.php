<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\SetImg;
use App\Term;
use App\Item;
use App\OwnedItem;
use App\Subject;
use App\GirlTermSubject;
use App\GirlTermScore;
use App\PlayerScenarioData;
use App\AdminEventChatLog;
use App\AdminChatLog;
use App\EventFixedPhrase;
use App\Scenario;
use App\EventMemory;
use App\ProloguePhrase;

// コンスタントの呼び出し
use App\Library\Constant;

class GirlCore
{
    // girl選択 仮 もしかしたらいらないかも
    public static function girlSelect($playerId, $charId)
    {
        $ownedChar   = OwnedCharacterData::where('player_id', $playerId)->where('char_id', $charId)->first();
        $playerInfo  = Player::where('player_id', $playerId)->first();

        $playerInfo->owned_char_id = $ownedChar->owned_char_id;
        $playerInfo->save();

        return $playerInfo;
    }

    /**
     * girl情報をロードする
     *
     * @param int $ownedCharId
     * @return object $ownedCharInfo
     *
     */
    public static function girlLoad($ownedCharId)
    {
        $ownedChar = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();

        // img_infoの中身
        $setImgInfo = SetImg::where('owned_char_id', $ownedCharId)->first();
        //$setImgInfo['img_name'] = Item::where('item_id', $setImgInfo->avatar_img)->first()->img_name;

        $ownedCharInfo = $ownedChar;
        $ownedCharInfo['char_name']  = CharacterData::where('char_id', $ownedChar->char_id)->first()->char_name;
        $ownedCharInfo['avatar_img'] = $setImgInfo->avatar_img;
        $ownedCharInfo['bg_img']     = $setImgInfo->bg_img;
        $ownedCHarInfo['effect_img'] = is_null($setImgInfo->effect_img) ? false : $setImgInfo->effect_img;

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();
        // girl_term_scoreデータを取得
        $myGirlScoreInfo = GirlTermScore::where('owned_char_id', $ownedCharId)->where('term_id', $term->term_id)->first();
        if(!$myGirlScoreInfo)
        {
            // 点数情報がない場合
            $girlScoreInstance = new GirlTermScore;
            $girlScoreInstance->create([
                'owned_char_id' => $ownedCharId,
                'char_id'       => $ownedChar->char_id,
                'player_id'     => $ownedChar->player_id,
                'term_id'       => $term->term_id,
            ]);
            $myGirlScoreInfo = GirlTermScore::where('owned_char_id', $ownedCharId)->where('term_id', $term->term_id)->first();
        }

        $ownedCharInfo['score'] = $myGirlScoreInfo['score'];
        $girlSubjectId = GirlTermSubject::where('char_id', $ownedChar->char_id)->where('term_id', $term->term_id)->first();
        $subjectName = Subject::where('subject_id', $girlSubjectId->subject_id)->first();
        $ownedCharInfo['subject_name'] = $subjectName->subject_name;
        $ownedCharInfo['subject_id'] = $girlSubjectId->subject_id;

        $ownedCharInfo['attitude'] = self::getAttitude($ownedCharId);

        return $ownedCharInfo;
    }

    /**
     * set_imgを更新する
     *
     * @param int $playerId
     * @param int $itemId
     * @return array $setImgInfo
     *
     */
    public static function setImg($playerId, $itemId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();
        $ownedCharImg = OwnedItem::where('owned_char_id', $playerInfo->owned_char_id)->where('item_id', $itemId)->first();
        $itemInfo = Item::where('item_id', $itemId)->first();

        // エラー回避
        if (!$ownedCharImg || $ownedCharImg->num <= 0) return false;

        $setImgInfo = SetImg::where('owned_char_id', $playerInfo->owned_char_id)->first();
        if ($itemInfo->category == Constant::ITEM_BG) {
            $setImgInfo->bg_img = $itemInfo->item_img;
        } elseif ($itemInfo->category == Constant::ITEM_AVATAR) {
            $setImgInfo->avatar_img = $itemInfo->item_img;
        } elseif ($itemInfo->category == Constant::ITEM_EFFECT) {
            $setImgInfo->avatar_img = $itemInfo->item_img;
        }
        $setImgInfo->save();

        return $setImgInfo;
    }

    /**
     * tsun・dereポイントの更新、remain_pointの更新
     *
     * @param int $ownedCharId
     * @param int $type  1:tsun 2:dere
     * @param int $point
     * @return array $setImgInfo
     *
     */
    public static function statusUp($ownedCharId, $type, $point)
    {
        $ownedChar = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();
        // ポイントあるか確認
        if ($point > $ownedChar['remain_point'] || $point <= 0)
        {
            return false;
        }

        if ($type == 1)
        {
            // ツン
            $ownedChar->tsun = $ownedChar->tsun + $point;
        } elseif ($type == 2)
        {
            // デレ
            $ownedChar->dere = $ownedChar->dere + $point;
        } else
        {
            // エラー
            return false;
        }
        // remain_pointの削除更新
        $ownedChar->remain_point = $ownedChar->remain_point - $point;

        $ownedChar->save();

        return true;
    }

    /**
     * シナリオデータの作成と初期メッセージの作成
     *
     * @param int $playerId
     * @param int $scenarioId
     * @return bool
     *
     */
    public static function createPlayerScenarioData($playerId, $scenarioId)
    {
        $playerScenarioInstance = new PlayerScenarioData;
        $playerScenarioInstance->create([
            'player_id'           => $playerId,
            'scenario_id'         => $scenarioId,
        ]);

        $eventChatLog = AdminEventChatLog::where('player_id', $playerId)->where('scenario_id', $scenarioId)->get();

        // trueの時はentry時
        if ($eventChatLog->isEmpty()) {
            // 最初の定型文取得 複数でも対応可能なようにget()で取得
            $firstPhrase = EventFixedPhrase::where('scenario_id', $scenarioId)->where('is_auto', true)->get();

            foreach ($firstPhrase as $key => $phrase) {
                $adminEventChatInstance = new AdminEventChatLog;
                $adminEventChatInstance->create([
                    'player_id'           => $playerId,
                    'admin_id'            => 0,
                    'content'             => $phrase->content,
                    'scenario_id'         => $scenarioId,
                    'is_player'           => false,
                ]);
            }

            $charId = Scenario::where('scenario_id', $scenarioId)->first()->char_id;
            $ownedCharId = OwnedCharacterData::where('char_id', $charId)->where('player_id', $playerId)->first()->owned_char_id;

            // 思ひ出作成
            $eventMemInstance = new EventMemory;
            $eventMemInstance->create([
                'player_id'     => $playerId,
                'scenario_id'   => $scenarioId,
                'owned_char_id' => $ownedCharId,
            ]);
        }
    }

    /**
     * 女の子がツンかデレか取得
     *
     * @param int $ownedCharId
     * @return string
     *
     */
    public static function getAttitude($ownedCharId)
    {
        $ownedCharInfo = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();

        $attitude = null;
        if ($ownedCharInfo->dere > $ownedCharInfo->tsun)
            $attitude = Constant::ATTITUDE_DERE;
        else
            $attitude = Constant::ATTITUDE_TSUN;

        return $attitude;
    }

    /**
     * 花嫁修行入場時に初期メッセージの送信
     *
     * @param int $ownedCharId
     * @return string
     *
     */
    public static function createPrologue($ownedCharId)
    {
        $ownedCharInfo = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();
        $defaultPhrase = ProloguePhrase::where('char_id', $ownedCharInfo->char_id)->where('content_index', 0)->first();

        $adminChat = new AdminChatLog;
        $adminChat->create([
            'player_id'     => $ownedCharInfo->player_id,
            'admin_id'      => 0,
            'content'       => $defaultPhrase->content,
            'char_id'       => $ownedCharInfo->char_id,
            'is_player'     => false,
        ]);

        return true;
    }
}
