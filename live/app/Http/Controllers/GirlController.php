<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\OwnedCharacterImg;
use App\PlayerChatLog;
use App\Scenario;


// ライブラリの呼び出し
use App\Library\GirlCore;
use App\Library\PlayerChatCore;

use Illuminate\Http\Request;

class GirlController extends Controller
{
    const DAY_TIME_MORNING   = '10:00:00';
    const DAY_TIME_NOON      = '14:00:00';
    const DAY_TIME_NIGHT     = '18:00:00';
    const DAY_TIME_MIDNIGHT  = '';

    const MORNING  = '朝';
    const NOON     = '昼';
    const NIGHT    = '晩';

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

    // ツン・デレポイント/達成報酬
    public function status($ownedCharId)
    {
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($ownedCharId);
        return view('girl.status')
            ->with('owned_char_info', $ownedCharInfo);
    }

    // ツンデレポイント割り振り
    public function statusUp($ownedCharId)
    {
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($ownedCharId);
        return view('girl.status_up')
            ->with('owned_char_info', $ownedCharInfo);
    }

    // ツンデレポイント割り振り確認
    public function statusUpConfirm(Request $request)
    {
        // 1：ツン、2：デレ
        $type = 0;
        $point = 0;
        if (isset($request->add_tun))
        {
            $type = 1;
            $point = $request->add_tun;
        } elseif (isset($request->add_dere))
        {
            $type = 2;
            $point = $request->add_dere;
        }
        // あまりポイント確認
        $ownedCharInfo = GirlCore::girlLoad($request->owned_char_id);
        if ($point > $ownedCharInfo['remain_point'] || $point <= 0)
        {
            // エラーに飛ばす
            return redirect()->route('girl.index');
        }

        return view('girl.status_up_confirm')
        ->with('owned_char_info', $ownedCharInfo)
        ->with('point',           $point)
        ->with('type',            $type);
    }

    // ツンポイントアップ
    public function statusUpTunExec($point)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        // あまりポイント確認
        if ($point > $ownedCharInfo['remain_point'] || $point <= 0)
        {
            // エラーに飛ばす
            return redirect()->route('girl.index');
        }

        // point付与処理


        return redirect()->route('girl.index');
    }

    // デレポイントアップ
    public function statusUpDereExec($point)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);
        // あまりポイント確認
        if ($point > $ownedCharInfo['remain_point'] || $point <= 0)
        {
            // エラーに飛ばす
            return redirect()->route('girl.index');
        }
        // point付与処理


        return redirect()->route('girl.index');
    }

    public function mainChat()
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);
        $charId = $ownedCharInfo['char_id'];
        // チャットログの取得
        $chatLog = PlayerChatCore::getChatLogBrGirl($this->_playerId, $charId, $ownedCharInfo);

        return view('girl.main-chat')
            ->with('chat_log',          $chatLog)
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('player_info',       $playerInfo);
    }

    public function mainChatSend(Request $request)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        $sendResult = PlayerChatCore::playerSend($this->_playerId, $request->char_id, $request->content, $ownedCharInfo);
        if (!$sendResult) {
            // こけてる
        }

        // プレイヤーの送った情報をinsert
        return redirect()->route('girl.mainChat');
    }

    // 外へ行く Field選択画面
    public function eventField()
    {
        $fieldList = Scenario::select('field')->where('start_datetime', '<=', now())->where('end_datetime', '>', now())->groupBy('field')->get()->pluck('field');
        return view('girl.event_chat_entry')
            ->with('field_list',    $fieldList)
            ->with('place_list',    false);
    }

    // 外へ行く Place選択画面
    public function eventPlace($field)
    {
        $placeList = Scenario::select('place')->where('field', $field)->groupBy('place')->get()->pluck('place');
        return view('girl.event_chat_entry')
            ->with('field_list',    false)
            ->with('place_list',    $placeList);
    }

    // 外へ行く eventChat画面
    public function eventChat($place = false)
    {
        $dayTime = null;
        if (strtotime(date('H:i:s')) > self::DAY_TIME_NIGHT) {
            $dayTime = self::NIGHT;
        } elseif (strtotime(date('H:i:s')) > self::DAY_TIME_NOON) {
            $dayTime = self::NOON;
        } elseif (strtotime(date('H:i:s')) > self::DAY_TIME_MORNING) {
            $dayTime = self::MORNING;
        } else {
            $dayTime = self::NIGHT;             // 深夜帯 開発用
        }

        $scenarioInfo = false;
        // eventChat送信後のリダイレクトの際はplaceを付属すること
        if ($place){
            $scenarioInfo = Scenario::where('place', $place)->where('daytime', $dayTime)->first();
        }


        return view('girl.event-chat')
            ->with('scenario_info',    $scenarioInfo);
    }
}
