<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use App\Player;
use App\Item;
use App\OwnedItem;
use App\PlayerChatLog;
use App\Scenario;
use App\EventMemory;
use App\AdminChatLog;
use App\Library\Constant;
// ライブラリの呼び出し
use App\Library\GirlCore;
use App\Library\ItemCore;
use App\Library\PlayerChatCore;
use App\MainMemory;
use App\RewardLevel;
use Illuminate\Http\Request;

class GirlController extends Controller
{
    const DAY_TIME_MORNING   = '10:00:00';
    const DAY_TIME_NOON      = '14:00:00';
    const DAY_TIME_NIGHT     = '19:00:00';
    const DAY_TIME_MIDNIGHT  = '';

    const MORNING  = 'morning';
    const NOON     = 'noon';
    const NIGHT    = 'night';

    // My page
    public function index()
    {
        // 全てのgirl情報
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        // 全ガール情報
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        $scenarioInfo = array(
            'morning' => null,
            'noon'    => null,
            'night'   => null,
        );
        $charScenario = Scenario::where('char_id', $ownedCharInfo->char_id)->get();
        foreach ($charScenario as $key => $scenario) {
            $scenarioInfo[$scenario->daytime] = $scenario->title;
        }


        return view('girl.index')
            ->with('all_char_info',     $allOwnedCharInfo)
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('current_date',      date('m月d日 H:i'))
            ->with('player_info',       $playerInfo)
            ->with('scenario_info',     $scenarioInfo);
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

    // ツン・デレポイント/達成報酬
    public function status($ownedCharId)
    {
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($ownedCharId);

        $mainMemoryLv = self::_getMemoryLv($this->_playerId, $ownedCharId);

        return view('girl.status')
            ->with('main_memory_Lv',    $mainMemoryLv)
            ->with('current_date',      date('m月d日 H:i'))
            ->with('owned_char_info',   $ownedCharInfo);
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
        if (isset($request->add_tsun))
        {
            $type = 1;
            $point = $request->add_tsun;
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
        $result = GirlCore::statusUp($ownedCharInfo['owned_char_id'], 1, $point);
        if (!$result)
        {
            // エラー
            return redirect()->route('girl.index');
        }

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
        $result = GirlCore::statusUp($ownedCharInfo['owned_char_id'], 2, $point);
        if (!$result)
        {
            // エラー
            return redirect()->route('girl.index');
        }

        return redirect()->route('girl.index');
    }

    public function mainChat()
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);
        $charId = $ownedCharInfo['char_id'];

        // 初めての会話の時は、prologue_index=0が送信される。
        $hasChat = (bool)AdminChatLog::where('player_id', $this->_playerId)->where('char_id', $charId)->first();
        if (!$ownedCharInfo->done_prologue && $ownedCharInfo->prologue_index == 0 && !$hasChat)
            GirlCore::createPrologue($ownedCharInfo->owned_char_id);

        // チャットログの取得
        $chatLog = PlayerChatCore::getChatLogBrGirl($this->_playerId, $charId, $ownedCharInfo);

        return view('girl.main_chat')
            ->with('chat_log',          $chatLog)
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('player_info',       $playerInfo)
            ->with('current_date',      date('m月d日 H:i'));
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
        $fieldScenario = Scenario::select('field')->where('start_datetime', '<=', now())->where('end_datetime', '>', now())->groupBy('field')->get();

        return view('girl.event_chat_entry')
            ->with('field_scenario',    $fieldScenario)
            ->with('place_scenario',    false);
    }

    // 外へ行く Place選択画面
    public function eventPlace($field)
    {
        $placeScenario = Scenario::select('place')->where('field', $field)->groupBy('place')->get();

        return view('girl.event_chat_entry')
            ->with('field_scenario',    false)
            ->with('field',             $field)
            ->with('place_scenario',    $placeScenario);
    }

    // 外へ行く eventChat画面
    public function eventChat($place = false)
    {
        $dayTime        = null;
        $scenarioInfo   = false;
        $eventChatLog   = false;
        $ownedCharInfo  = array();

        if (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_NIGHT)) {
            $dayTime = Constant::NIGHT;
        } elseif (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_NOON)) {
            $dayTime = Constant::NOON;
        } elseif (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_MORNING)) {
            $dayTime = Constant::MORNING;
        } else {
            $dayTime = Constant::NIGHT;             // 深夜帯 開発用
        }

        // eventChat送信後のリダイレクトの際はplaceを付属すること
        if ($place){
            $scenarioInfo = Scenario::where('place', $place)->where('daytime', $dayTime)->where('start_datetime', '<=', date('Y-m-d H:i:s'))->where('end_datetime', '>=', date('Y-m-d H:i:s'))->first();

            // チュートリアル終了していなければ誰もいないへ
            if ($scenarioInfo) {
                $ownedCharInfo = OwnedCharacterData::where('player_id', $this->_playerId)->where('char_id', $scenarioInfo->char_id)->first();
                if ($ownedCharInfo->done_prologue && ($ownedCharInfo->tsun != 0 || $ownedCharInfo->dere != 0))
                    GirlCore::createPlayerScenarioData($this->_playerId, $scenarioInfo->scenario_id);
                else
                    $scenarioInfo = NULL;
            }
        }

        if ($scenarioInfo) {
            $eventChatLog = PlayerChatCore::getEventChatLogByScenario($this->_playerId, $scenarioInfo->scenario_id);
            $ownedCharId = OwnedCharacterData::where('char_id', $scenarioInfo->char_id)->where('player_id', $this->_playerId)->first()->owned_char_id;
            $ownedCharInfo = GirlCore::girlLoad($ownedCharId);
        }


        return view('girl.event_chat')
            ->with('owned_char_info',  $ownedCharInfo)
            ->with('scenario_info',    $scenarioInfo)
            ->with('current_date',      date('m月d日 H:i'))
            ->with('event_chat_log',   $eventChatLog);
    }

    // 外へ行く チャット
    public function eventChatSend(Request $request)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        $sendResult = PlayerChatCore::playerEventSend($this->_playerId, $request->scenario_id, $request->content);
        if (!$sendResult) {
            // こけてる
        }

        $scenarioInfo = Scenario::where('scenario_id', $request->scenario_id)->first();

        // プレイヤーの送った情報をinsert
        return redirect()->route('girl.eventChat', ['place' => $scenarioInfo->place]);
    }

    // 着替え
    public function changeClothers()
    {
        // 全てのgirl情報
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        // 所持中のimg情報
        $ownedCharImg = OwnedItem::where('owned_char_id', $playerInfo->owned_char_id)->get();

        // 画像をカテゴリーに分ける
        $avatarImgs = false;
        $bgImgs = false;
        $effectImgs = false;

        foreach($ownedCharImg as $key => &$ownedImg)
        {
            $ownedImg['item_info'] = OwnedItem::where('item_id', $ownedImg->item_id);

            if($ownedImg['item_info']['category'] == Constant::ITEM_AVATAR)
            {
                $avatarImgs[] = $ownedImg['item_info'];
            }
            elseif($ownedImg['item_info']['category'] == Constant::ITEM_BG)
            {
                $bgImgs = $ownedImg['item_info'];
            }
            elseif($ownedImg['item_info']['category'] == Constant::ITEM_EFFECT)
            {
                $effectImgs = $ownedImg['item_info'];
            }
        }

        return view('girl.change_clothers')
            ->with('owned_char_info',   $ownedCharInfo)
            ->with('owned_char_img',    $ownedCharImg)
            ->with('current_date',      date('m月d日 H:i'))
            ->with('avatar_imgs',       $avatarImgs)
            ->with('bd_imgs',           $bgImgs)
            ->with('effect_imgs',       $effectImgs)
            ->with('player_info',       $playerInfo);
    }

    // set_img実行処理
    public function setImgExec($imgId)
    {
        $setImgInfo = GirlCore::setImg($this->_playerId, $imgId);

        // エラー用
        // if ($setImgInfo) {
        //     # code...
        // }

        return redirect()->route('girl.changeClothers');
    }

    // 思い出
    public function memory()
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // $charIds             = CharacterData::get()->char_id;
        $eventMemory         = EventMemory::where('player_id', $this->_playerId)->where('owned_char_id', $playerInfo->owned_char_id)->get();
        $eventMemoryLength   = count($eventMemory);
        $mainMemoryEv        = MainMemory::where('player_id', $this->_playerId)->where('owned_char_id', $playerInfo->owned_char_id)->where('is_Lv', 0)->get();
        $mainMemoryLv        = self::_getMemoryLv($this->_playerId, $playerInfo->owned_char_id);

        // 選択中のgirl情報
        $ownedCharInfo = GirlCore::girlLoad($playerInfo->owned_char_id);

        // 日常メモリーのtitle追加
        foreach ($eventMemory as $key => &$memory) {
            $memory->title = Scenario::where('scenario_id', $memory->scenario_id)->first()->title;
        }

        // 全ガール情報
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        return view('girl.memory')
            // ->with('char_ids',                $charIds)
            ->with('event_memory',            $eventMemory)
            ->with('main_memory_Lv',          $mainMemoryLv)
            ->with('main_memory_ev',          $mainMemoryEv)
            ->with('event_memory_length',     $eventMemoryLength)
            ->with('owned_char_info',         $ownedCharInfo)
            ->with('all_char_info',           $allOwnedCharInfo)
            ->with('current_date',            date('m月d日 H:i'));
    }

    // 思い出からの画面遷移
    public function memoryToScenario($scenarioId)
    {
        $scenarioInfo = Scenario::where('scenario_id', $scenarioId)->where('start_datetime', '<=', date('Y-m-d H:i:s'))->where('end_datetime', '>=', date('Y-m-d H:i:s'))->first();
        if ($scenarioInfo) {
            $dayTime = null;
            if (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_NIGHT)) {
                $dayTime = Constant::NIGHT;
            } elseif (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_NOON)) {
                $dayTime = Constant::NOON;
            } elseif (strtotime(date('H:i:s')) > strtotime(Constant::DAY_TIME_MORNING)) {
                $dayTime = Constant::MORNING;
            }

            if ($dayTime == $scenarioInfo->daytime)
                return redirect()->route('girl.eventChat', ['place' => $scenarioInfo->place]);
        }

        $scenarioInfo = Scenario::where('scenario_id', $scenarioId)->first();
        $eventChatLog = PlayerChatCore::getEventChatLogByScenario($this->_playerId, $scenarioInfo->scenario_id);

        return view('girl.event_memory')
            ->with('scenario_info',    $scenarioInfo)
            ->with('event_chat_log',   $eventChatLog);
    }










    /**
     * えっちなメモリーの情報取得
     *
     * @param  int   $playerId
     * @param  int   $ownedCharId
     * @return array $mainMemoryLv
     *
     */
    private static function _getMemoryLv($playerId, $ownedCharId)
    {
        $ownedCharInfo = OwnedCharacterData::where('owned_char_id', $ownedCharId)->first();
        $attitude = null;
        if ($ownedCharInfo->dere > $ownedCharInfo->tsun)
            $attitude = Constant::ATTITUDE_DERE;
        else
            $attitude = Constant::ATTITUDE_TSUN;

        $ownedMainMemoryLv   = MainMemory::where('player_id', $playerId)->where('owned_char_id', $ownedCharId)->where('is_Lv', 1)->where('is_recieved', 1)->get();
        $mainMemoryLv        = null;
        if (count($ownedMainMemoryLv)) {
            $count = RewardLevel::where('char_id', $ownedCharInfo->char_id)->where('attitude', $attitude)->count();
            $skip  = count($ownedMainMemoryLv);
            $limit = $count - $skip;
            if ($limit > 0) {
                $allMainMemoryLv     = RewardLevel::where('char_id', $ownedCharInfo->char_id)->where('attitude', $attitude)->orderBy('level', 'asc')->skip($skip)->take($limit)->get();
                $mainMemoryLv = [...$ownedMainMemoryLv, ...$allMainMemoryLv];
            } else {
                $mainMemoryLv = $ownedMainMemoryLv;
            }
        } else {
            $mainMemoryLv = RewardLevel::where('char_id', $ownedCharInfo->char_id)->where('attitude', $attitude)->orderBy('level', 'asc')->get();
        }

        return $mainMemoryLv;
    }
}
