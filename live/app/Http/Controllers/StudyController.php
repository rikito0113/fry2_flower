<?php

namespace App\Http\Controllers;

use App\Term;
use App\Player;
use App\CharacterData;
use App\OwnedCharacterData;
use App\StudyPointReward;
use App\GetStudyPointRewardLog;
use App\Item;

use App\Library\ProfileCore;
use App\Library\GirlCore;
use App\Library\StudyCore;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    // 育成・勉学画面index画面
    public function index()
    {
        // playerのgirl情報
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        $myRankInfo = StudyCore::getMyRankingByAll($this->_playerId);

        return view('study.index')
            ->with('player_info',           $playerInfo)
            ->with('all_girl_info',         $allOwnedCharInfo)
            ->with('term',                  $term)
            ->with('my_rank_info',          $myRankInfo)
            ;
    }

    // 女の子の点数ステータス
    public function girlScoreStatus(Request $request)
    {
        // playerのgirl情報
        $ownedCharInfo = GirlCore::girlLoad($request->owned_char_id);

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // ランキング取得
        $rankingData = StudyCore::getMyRankingByCharId($this->_playerId, $ownedCharInfo->char_id);

        return view('study.girl_score_status')
            ->with('player_info',           $playerInfo)
            ->with('owned_girl_info',       $ownedCharInfo)
            ->with('ranking_data',          $rankingData)
            ->with('term',                  $term)
            ;
    }

    // 女の子の点数UP処理
    public function upScoreExec(Request $request)
    {
        if (isset($request->add_score))
        {
            StudyCore::upScore($this->_playerId, $request->owned_char_id, $request->add_score);
        }

        return redirect()->route('study.index');
    }

    // 勉学ptランキング
    public function studyRanking(Request $request)
    {
        $rankingCharId = $request->char_id;
        if ($request->char_id)
            $charName = CharacterData::where('char_id', $request->char_id)->first()->char_name;
        else
            $charName = '総合';

        if($rankingCharId)
        {
            $rankingData = StudyCore::getRankingByCharId($rankingCharId);
        }
        else
        {
            $rankingData = StudyCore::getRankingByAll();
        }

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // 女の子情報
        $charInfo = CharacterData::latest()->get();

        return view('study.study_ranking')
            ->with('player_info',           $playerInfo)
            ->with('ranking_data',          $rankingData)
            ->with('term',                  $term)
            ->with('char_name',             $charName)
            ->with('ranking_char_id',       $rankingCharId)
            ->with('char_info',             $charInfo)
            ;
    }

    // 勉学pt達成報酬
    public function studyReward(Request $request)
    {
        if($request->owned_char_id)
        {
            $ownedCharId = $request->owned_char_id;
        }
        else
        {
            $ownedChar = OwnedCharacterData::where('player_id', $this->_playerId)->where('char_id',   1)->first();
            $ownedCharId = $ownedChar->owned_char_id;
        }
        // playerのgirl情報
        $ownedCharInfo = GirlCore::girlLoad($ownedCharId);

        // 現在のtermを取得
        $term = Term::where('term_start', '<=', date("Y-m-d"))->where('term_end', '>=', date("Y-m-d"))->first();

        // 勉学pt達成報酬取得
        $rewardList = StudyPointReward::where('char_id', $ownedCharInfo->char_id)->where('attitude', $ownedCharInfo->attitude)->where('term_id', $term->term_id)->get();
        foreach($rewardList as $key => &$rewardRow)
        {
            $rewardRow['item_info'] = Item::where('item_id', $rewardRow->item_id)->first();
        }
        // 勉学pt達成報酬獲得ログ取得
        $getRewardLogList = GetStudyPointRewardLog::where('player_id', $this->_playerId)->where('term_id', $term->term_id)->get();

        if(!empty($getRewardLogList[0]))
        {
            // $getRewardLogList->toArray();
            $logArray = $getRewardLogList->pluck("reward_id");

            foreach($rewardList as $key => &$rewardRow)
            {

                if(in_array($rewardRow['reward_id'], $logArray->toArray()))
                {
                    $rewardRow['is_get'] = true;
                }
            }
        }

        // プレイヤー情報取得
        $playerInfo = Player::where('player_id', $this->_playerId)->first();

        // playerのgirl情報
        $allOwnedCharId = OwnedCharacterData::where('player_id', $this->_playerId)->get();
        $allOwnedCharInfo = array();
        foreach ($allOwnedCharId as $key => $ownedCharId) {
            $allOwnedCharInfo[$ownedCharId->owned_char_id] = GirlCore::girlLoad($ownedCharId->owned_char_id);
        }

        return view('study.study_reward')
            ->with('player_info',           $playerInfo)
            ->with('owned_girl_info',       $ownedCharInfo)
            ->with('reward_list',           $rewardList)
            ->with('all_owned_char_info',   $allOwnedCharInfo)
            ->with('term',                  $term)
            ;
    }

    // 勉学pt達成報酬獲得実行
    public function getStudyRewardExec(Request $request)
    {
        if($request->owned_char_id)
        {
            $ownedCharId = $request->owned_char_id;
        }
        else
        {
            return redirect()->route('study.studyReward');
        }

        if($request->reward_id)
        {
            $getRewardId = $request->reward_id;
        }
        else
        {
            return redirect()->route('study.studyReward');
        }

        $isGet = StudyCore::getStudyPointReward($this->_playerId,$ownedCharId,$getRewardId);

        return redirect()->route('study.studyReward', ['owned_char_id' => $ownedCharId]);
    }
}
