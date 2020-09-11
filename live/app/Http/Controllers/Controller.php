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
            if (isset($player)) {
                $this->_playerId = $player->player_id;
            } else {
                // エラー
                $this->goRegist = true;
            }
        } else {
            // session切れ
            if (isset($_GET['opensocial_viewer_id']) && isset($_GET['opensocial_owner_id'])) {
                $this->_pfPlayerId = $_GET['opensocial_viewer_id'];
                $opensocialOwnerId  = $_GET['opensocial_owner_id'];
                if ($this->_pfPlayerId != $opensocialOwnerId) {
                    // 不正:エラーもしくはトップページに飛ばす
                } else {
                    $player = Player::where('pf_player_id', $this->_pfPlayerId)->first();
                    if (isset($player)) {
                        $this->_playerId = $player->player_id;
                    } else {
                        // 登録
                        $this->goRegist = true;
                    }
                    session(['opensocial_viewer_id' => $this->_pfPlayerId]);
                }
            } else {
                $this->_pfPlayerId = null;
                $this->goTop = true;
            }
        }

        if ($this->_pfPlayerId) {
            echo 'viewer:'.$this->_pfPlayerId;

            // $url = "https://spapi.nijiyome.jp/v2/spapi/oauth2/token";
            // $method = "POST";

            // //接続
            // $client = new Client();
            // $response = $client->request($method, $url);

            // $posts = $response->getBody();
            // $posts = json_decode($posts, true);
            // echo $posts;
        }

        // ハッシュ値を保持している時
        // if (session()->has('hash')) {
        //     $hash = session('hash');
        //     $player = Player::where('hash', $hash)->first();
        //     $this->_playerId = $player->player_id;
        // }
    }
}
