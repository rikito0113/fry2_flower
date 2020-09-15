<?php

namespace App\Http\Controllers;

use App\Player;

// HTTP通信用
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $_playerId;
    protected $goTop;
    protected $goRegist;
    protected $_pfPlayerId;

    public function __construct()
    {
        // oauth関連
        // opensocial_viewer_id = 現在アクセスしてるuserのpf_player_id
        // opensocial_owner_id  = アクセスされてるgreeアプリをインストールしたuserのpf_player_id
        // opensocial_viewer_id = opensocial_owner_id が正常

        // session確認
        $opensocialViewerId = null;
        $opensocialOwnerId = null;
        if (session()->has('opensocial_viewer_id')) {
            $this->_pfPlayerId = session('opensocial_viewer_id');
            $player = Player::where('pf_player_id', $this->_pfPlayerId)->first();
            echo 'ここ１';
            if (isset($player)) {
                echo 'ここ2';
                echo 'player_id:'. $player->player_id;
                $this->_playerId = $player->player_id;
            } else {
                // エラー
                $this->goRegist = true;
            }
        } else {
            // session切れ
            echo 'ここ3';
            if (isset($_GET['opensocial_viewer_id']) && isset($_GET['opensocial_owner_id'])) {
                $this->_pfPlayerId = $_GET['opensocial_viewer_id'];
                $opensocialOwnerId  = $_GET['opensocial_owner_id'];

                if ($this->_pfPlayerId != $opensocialOwnerId) {
                    // 不正:エラーもしくはトップページに飛ばす（ありえないはず）
                } else {
                    $player = Player::where('pf_player_id', $this->_pfPlayerId)->first();
                    if (isset($player)) {
                        echo 'ここ4';
                        echo 'player_id:'.$player->player_id;
                        $this->_playerId = $player->player_id;
                    } else {
                        echo 'ここ5:登録に飛ぶ';
                        // 登録
                        $this->goRegist = true;
                    }
                    session(['opensocial_viewer_id' => $this->_pfPlayerId]);
                }
            } else {
                echo 'ここ6';
                $this->_pfPlayerId = null;
                $this->goTop = true;
            }
        }

        if ($this->_pfPlayerId) {
            echo 'viewer:'.$this->_pfPlayerId;

        }

        // ハッシュ値を保持している時
        // if (session()->has('hash')) {
        //     $hash = session('hash');
        //     $player = Player::where('hash', $hash)->first();
        //     $this->_playerId = $player->player_id;
        // }
    }
}
