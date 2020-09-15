<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;

// HTTP通信用
use GuzzleHttp\Client;

class ShopCore
{
    public static function buyItem($playerInfo, $itemId) {
        $url = "https://api.nijiyome.jp/api/rest/payment/@me/@self/@app";
        $params =  ['paymentId' => 1,
                    'appId' => 785,
                    'userid' => $playerInfo->player_id,
                    'callbackUrl' => "https://flower-dev.maaaaakoto35.com/Shop/callback",
                    'finishPageUrl' => "https://flower-dev.maaaaakoto35.com/Shop/index",
                    'paymentItems' => ["itemId" => 1, "itemName" => "test", "unitPrice" => 100, "quantity" => 1, "imageUrl" => "https://flower-dev.maaaaakoto35.com/ex101.jpg", "description" => "test"]];
        $client = new Client();
        $response = $client->request(
            'POST',
            $url, // URLを設定
            ['headers' => ['Content-Type' => 'application/json'], 'query' => $params] // パラメーターがあれば設定 ?foo=barの場合は $params = ['foo' => 'bar']
        );
        echo $response->getStatusCode();
        echo $response->getReasonPhrase(); // OK
        echo $response->getProtocolVersion(); // 1.1

        $responseBody = $response->getBody()->getContents();
        echo $responseBody;
    }

}
