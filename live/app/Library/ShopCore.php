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
        $url = "https://spapi.nijiyome.jp/v2/spapi/rest/payment/@me/@self/@app";
        $params = array(
            'callbackUrl' => "https://flower-dev.maaaaakoto35.com/Shop/callback",
            'finishPageUrl' => "https://flower-dev.maaaaakoto35.com/Shop/index",
            'paymentItems["itemId"]' => 1,
            'paymentItems["itemName"]' => "test",
            'paymentItems["unitPrice"]' => 100,
            'paymentItems["quantity"]' => 1,
            'paymentItems["imageUrl"]' => "https://flower-dev.maaaaakoto35.com/ex101.jpg",
            'paymentItems["description"]' => "testだよ。",
        );
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // パラメータをセット
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $json = json_decode($response, true);
        echo '決済処理用:';
        echo $json;
        var_dump($json);

    }

}
