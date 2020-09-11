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
        if (session()->has('opensocial_viewer_id')) {
            $pfPlayerId = session('opensocial_viewer_id');
            $player = Player::where('pf_player_id', $pfPlayerId)->first();
            if (isset($player)) {
                $this->_playerId = $player->player_id;
            } else {
                // エラー
            }
        } else {
            // session切れ
            if (isset($_GET['opensocial_viewer_id']) && isset($_GET['opensocial_owner_id'])) {
                $opensocialViewerId = $_GET['opensocial_viewer_id'];
                $opensocialOwnerId  = $_GET['opensocial_owner_id'];
                if ($opensocialViewerId != $opensocialOwnerId) {
                    // 不正:エラーもしくはトップページに飛ばす
                } else {
                    $player = Player::where('pf_player_id', $opensocialViewerId)->first();
                    if (isset($player)) {
                        $this->_playerId = $player->player_id;
                        session(['opensocial_viewer_id' => $opensocialViewerId]);
                    } else {
                        // 登録
                        echo '登録いく';
                        $this->_pfPlayerId = $opensocialViewerId;
                        $this->goRegist = true;
                    }
                }
            } else {
                $opensocialViewerId = null;
                $this->goTop = true;
            }
        }

        if ($opensocialViewerId) {
            echo 'viewer:'.$opensocialViewerId.' and owner:'.$opensocialOwnerId;

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
