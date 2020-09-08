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

    public function __construct()
    {
        // oauth関連
        if ($_GET['opensocial_viewer_id']) {
            $opensocialViewerId = $_GET['opensocial_viewer_id'];
        } else {
            $opensocialViewerId = null;
        }
        if ($opensocialViewerId) {
            echo $opensocialViewerId;
            $url = "http://ec2-54-168-163-241.ap-northeast-1.compute.amazonaws.com/v2/api/oauth2/token";
            $method = "POST";

            //接続
            $client = new Client();
            $response = $client->request($method, $url);

            $posts = $response->getBody();
            $posts = json_decode($posts, true);
            echo $posts;
        }

        // ハッシュ値を保持している時
        if (session()->has('hash')) {
            $hash = session('hash');
            $player = Player::where('hash', $hash)->first();
            $this->_playerId = $player->player_id;
        }

        // もしplayerIdが取れなかった場合はloginへ
        // if (!$this->_playerId)
        //     session()->flush();
    }
}
