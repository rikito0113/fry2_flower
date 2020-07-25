<?php

namespace App\Http\Controllers;

use App\Term;
use App\Player;
use App\OwnedCharacterData;

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

        return view('study.index')
            ->with('player_info',           $playerInfo)
            ->with('all_girl_info',         $allOwnedCharInfo)
            ->with('term',                  $term)
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


        return view('study.girl_score_status')
            ->with('player_info',           $playerInfo)
            ->with('owned_girl_info',       $ownedCharInfo)
            ->with('term',                  $term)
            ;
    }

    // 女の子の点数UP処理
    public function upScoreExec(Request $request)
    {
        if (isset($request->add_score))
        {
            StudyCore::upScore($request->owned_char_id, $request->add_score);
        }

        return redirect()->route('study.index');
        
    }
   




}
