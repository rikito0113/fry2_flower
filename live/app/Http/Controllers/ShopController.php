<?php

namespace App\Http\Controllers;

// モデルの呼び出し
use App\Player;

// ライブラリの呼び出し
use App\Library\ShopCore;

use Illuminate\Http\Request;

// HTTP通信用
use GuzzleHttp\Client;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    // アイテム購入
    public function buyItem(Request $request)
    {
        $playerInfo = Player::where('player_id', $this->_playerId)->first();
        $buyResult = ShopCore::buyItem($playerInfo, $request->item_id);
        if (!$buyResult) {
            // こけてる
        }

        // return view('shop.index');
    }

    public function callback(Request $request)
    {
        // callback用
        var_dump($request);
        echo $request->paymentId;
        echo $request->status;
        echo $request->transactionUrl;

        // コイン消費処理
        // $url = "https://api.nijiyome.jp/v2/api/rest/payment/@me/@self/@app/".$request->transactionUrl;
        // $params =  ["_status" => 1];
        // $client = new Client();
        // $response = $client->request(
        //     'POST',
        //     $url, // URLを設定
        //     ['headers' => ['Content-Type' => 'application/json'], 'query' => $params],
        // );

        // echo $response->status;

        // // status=2を返して完了させる
        // $params2 =  ["_status" => 2];
        // $response2 = $client->request(
        //     'POST',
        //     $url, // URLを設定
        //     ['headers' => ['Content-Type' => 'application/json'], 'query' => $params2],
        // );

        // if ($response2->status == 2) {
        //     // アイテム付与
        // }
    }
}
