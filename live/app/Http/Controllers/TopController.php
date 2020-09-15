<?php

namespace App\Http\Controllers;


// モデルの呼び出し
use App\Player;
use App\TutorialPhrase;

// HTTP通信用
use GuzzleHttp\Client;

// ライブラリの呼び出し
use App\Library\TopCore;
use Exception;
use Illuminate\Http\Request;

class TopController extends Controller
{
    // login
    public function index()
    {
        // authリダイレクト対策
        // 一回目はfirst=1 ⇨ bladeでauth関数走る ⇨ ここにリダイレクト
        // 2回目以降は GETで取得し、authが回らないように
        $first = 1;
        if (isset($_GET['code'])) {
            $first = 2;

            // auth認証
            try {
                $url = "https://spapi.nijiyome.jp/v2/spapi/oauth2/token";
                $params =  ['grant_type' => "authorization_code",
                            'code' => $_GET['code'],
                            'client_id' => "c504a71e4eeb325ff85b0cd36d9d8e", // sandbox用
                            'client_secret' => "f9485395fd",                 // sandbox用
                            'redirect_uri' => "https://flower-dev.maaaaakoto35.com/",
                            ];
                // $client = new Client();
                // $response = $client->request(
                //     'POST',
                //     $url, // URLを設定
                //     ['data' => $params] //'header' => ['content-type' => 'application/x-www-form-urlencoded'],
                // );

                // echo $response->getStatusCode();   // 200が正解?
                // echo $response->getReasonPhrase(); // OKが正解

                // $responseBody = $response->getBody()->getContents();

                // echo $responseBody;

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // パラメータをセット
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $json = json_decode($response);
                echo $json;
                curl_close($curl);

            } catch (\Exception $e) {
                echo $e;
                report($e);
            }
        }

        // ログイン処理execでhashをsessionに入れる
        if (isset($this->_playerId)) {
            $playerId = $this->_playerId;
        } else {
            $playerId = 0;
        }
        return view('index')
        ->with('player_id', $playerId)
        ->with('first', $first);
    }

    public function login()
    {
        // ログイン処理execでhashをsessionに入れる
        if (isset($this->_playerId)) {
            // // return redirect()->route('my.my');
            return redirect()->route('tutorial',[
                'playerId' => $this->_playerId
            ]);
        }

        if ($this->goRegist == true) {
            return redirect()->route('register');
        }
        return view('index')
        ->with('player_id', $this->_playerId);
    }

    // login処理実行
    public function loginExec(Request $request)
    {
        echo $request->pf_player_id;
        $playerInfo = TopCore::login($request->pf_player_id);

        if (isset($playerInfo) && $playerInfo != false)
            // return redirect()->route('my.my');
            return redirect()->route('tutorial',[
                'playerId' => $this->_playerId
            ]);
        else
            return view('register');
    }

    // register
    public function register()
    {
        // sessionの確認 未実装
        if (isset($this->_playerId))
            // return redirect()->route('my.my');
            return redirect()->route('tutorial',[
                'playerId' => $this->_playerId
            ]);
        else
            return view('register')
            ->with('pf_player_id', $this->_pfPlayerId);
    }

    // 会員登録実行処理
    public function registerExec(Request $request)
    {
        if (!isset($request->pf_player_id)) {
            // FIXME:エラーに飛ばす
            return view('index')
            ->with('player_id', $this->_playerId);
        }
        $playerInfo = Player::where('pf_player_id', $request->pf_player_id)->first();
        if ($playerInfo) {
            TopCore::updateHash($playerInfo->player_id);
            // return redirect()->route('my.my');
            return redirect()->route('tutorial',[
                'playerId' => $this->_playerId
            ]);
        } else {
            // 会員登録
            TopCore::register($request);
            // return redirect()->route('my.my');
            return redirect()->route('tutorial',[
                'playerId' => $this->_playerId
            ]);
        }
    }

    // 登録時のチュートリアル
    public function tutorial($playerId)
    {
        $playerInfo = Player::where('player_id', $playerId)->first();
        if ($playerInfo) {
            // マスタ取得
            $tutorialPhrase = TutorialPhrase::orderBy('tutorial_id', 'asc')->get();
            foreach ($tutorialPhrase as &$phrase) {
                if ($phrase->is_player)
                    $phrase->side = 'right';
                else
                    $phrase->side = 'left';
            }

            return view('tutorial')
                ->with('tutorial_phrase',   $tutorialPhrase)
                ->with('player_info',       $playerInfo);
        } else {
            return redirect()->route('login');
        }
    }

}
