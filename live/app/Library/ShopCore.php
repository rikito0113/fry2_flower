<?php

namespace App\Library;

// モデルの呼び出し
use App\CharacterData;
use App\OwnedCharacterData;
use Exception;
// HTTP通信用
use GuzzleHttp\Client;

class ShopCore
{
    public static function buyItem($playerInfo, $itemId) {

        try {
            //$url = "https://spapi.nijiyome.jp/v2/spapi/rest/payment/@me/@self/@app";
            $url = "https://spapi.nijiyome.jp/v2/spapi/rest/payment";
            $data = array(
                //'callbackUrl' => "https://flower-dev.maaaaakoto35.com/Shop/callback",
                //'finishPageUrl' => "https://flower-dev.maaaaakoto35.com/Shop/index",
                'paymentItems' => array('itemId' => 1, 'itemName' => "test", 'unitPrice' => 100, 'quantity' => 1, 'imageUrl' => "https://flower-dev.maaaaakoto35.com/ex101.jpg", 'description' => "testです."),
            );
            // $data = array(
            //     'itemId' => 1, 'itemName' => "test", 'unitPrice' => 100, 'quantity' => 1, 'imageUrl' => "https://flower-dev.maaaaakoto35.com/ex101.jpg", 'description' => "testです.",
            // );
            $params = json_encode($data);
            $curl = curl_init($url);
            // curl_setopt($curl, CURLOPT_POST, TRUE);
            // curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // パラメータをセット
            // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Content-Length: " . strlen($params))
            );
            $response = curl_exec($curl);
            $json = json_decode($response, true);
            echo '決済処理用:';
            echo $json;
            var_dump($json);

            curl_close($curl);
        } catch(Exception $e) {
            echo $e;
            report($e);
        }

    }

}
