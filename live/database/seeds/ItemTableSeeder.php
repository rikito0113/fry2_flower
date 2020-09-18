<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            [
                'item_id'          => 1,
                'item_name'        => 'sample1 char 1',
                'category'         => 'scene_ero',
                'char_id'          => 1,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 2,
                'item_name'        => 'sample1 char 2',
                'category'         => 'scene_ero',
                'char_id'          => 2,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 3,
                'item_name'        => 'sample1 char 3',
                'category'         => 'scene_ero',
                'char_id'          => 3,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4,
                'item_name'        => 'sample1 char 4',
                'category'         => 'scene_ero',
                'char_id'          => 4,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 5,
                'item_name'        => 'sample1 char51',
                'category'         => 'scene_ero',
                'char_id'          => 5,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6,
                'item_name'        => 'sample1 char 6',
                'category'         => 'scene_ero',
                'char_id'          => 6,
                'item_img'         => 'character/1.png',
                'item_description' => 'erooooo',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6001,
                'item_name'        => '制服のあおい',
                'category'         => 'avatar',
                'char_id'          => 1,
                'item_img'         => 'character/aoi/01_form00_face001_3.png',
                'item_description' => '初期のあおい画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4011,
                'item_name'        => 'あおいの家',
                'category'         => 'bg',
                'char_id'          => 1,
                'item_img'         => 'character/bg/item_4011.jpg',
                'item_description' => '初期のあおい背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7001,
                'item_name'        => '祝・あおい',
                'category'         => 'effect',
                'char_id'          => 1,
                'item_img'         => 'character/effect/ef_aoi001.png',
                'item_description' => 'おめでとう、あおい',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6002,
                'item_name'        => '制服のさくら',
                'category'         => 'avatar',
                'char_id'          => 2,
                'item_img'         => 'character/sakura/02_form00_face001_3.png',
                'item_description' => '初期のさくら画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4014,
                'item_name'        => 'さくらの家',
                'category'         => 'bg',
                'char_id'          => 2,
                'item_img'         => 'character/bg/item_4014.jpg',
                'item_description' => '初期のさくら背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7002,
                'item_name'        => '祝・さくら',
                'category'         => 'effect',
                'char_id'          => 2,
                'item_img'         => 'character/effect/ef_sakura001.png',
                'item_description' => 'おめでとう、さくら',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6003,
                'item_name'        => '制服のせら',
                'category'         => 'avatar',
                'char_id'          => 3,
                'item_img'         => 'character/sera/03_form00_face001_3.png',
                'item_description' => '初期のせら画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4017,
                'item_name'        => 'せらの家',
                'category'         => 'bg',
                'char_id'          => 3,
                'item_img'         => 'character/bg/item_4017.jpg',
                'item_description' => '初期のせら背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7003,
                'item_name'        => '祝・せら',
                'category'         => 'effect',
                'char_id'          => 3,
                'item_img'         => 'character/effect/ef_sera001.png',
                'item_description' => 'おめでとう、せら',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6004,
                'item_name'        => '制服のくるみ',
                'category'         => 'avatar',
                'char_id'          => 4,
                'item_img'         => 'character/kurumi/04_form00_face001_3.png',
                'item_description' => '初期のくるみ画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4020,
                'item_name'        => 'くるみの家',
                'category'         => 'bg',
                'char_id'          => 4,
                'item_img'         => 'character/bg/item_4020.jpg',
                'item_description' => '初期のくるみ背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7004,
                'item_name'        => '祝・くるみ',
                'category'         => 'effect',
                'char_id'          => 4,
                'item_img'         => 'character/effect/ef_kurumi001.png',
                'item_description' => 'おめでとう、くるみ',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6005,
                'item_name'        => '制服のゆめ',
                'category'         => 'avatar',
                'char_id'          => 5,
                'item_img'         => 'character/yume/05_form00_face001_3.png',
                'item_description' => '初期のゆめ画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4023,
                'item_name'        => 'ゆめの家',
                'category'         => 'bg',
                'char_id'          => 5,
                'item_img'         => 'character/bg/item_4023.jpg',
                'item_description' => '初期のゆめ背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7005,
                'item_name'        => '祝・ゆめ',
                'category'         => 'effect',
                'char_id'          => 5,
                'item_img'         => 'character/effect/ef_yume001.png',
                'item_description' => 'おめでとう、ゆめ',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 6006,
                'item_name'        => '制服のまり',
                'category'         => 'avatar',
                'char_id'          => 6,
                'item_img'         => 'character/mari/06_form00_face001_3.png',
                'item_description' => '初期のまり画像',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 4026,
                'item_name'        => 'まりの家',
                'category'         => 'bg',
                'char_id'          => 6,
                'item_img'         => 'character/bg/item_4026.jpg',
                'item_description' => '初期のまり背景',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_id'          => 7006,
                'item_name'        => '祝・まり',
                'category'         => 'effect',
                'char_id'          => 6,
                'item_img'         => 'character/effect/ef_mari001.png',
                'item_description' => 'おめでとう、まり',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
        ]);
    }
}
