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
                'item_name'        => '階段',
                'category'         => 'bg',
                'item_img'         => 'character/11.png',
                'item_description' => '階段で話そう',
                'price'            => 0,
                'expiration_date'  => 0,
            ],
            [
                'item_name'       => '海',
                'category'        => 'bg',
                'item_img'        => 'character/12.png',
                'item_description' => '海で話そう',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => '家',
                'category'        => 'bg',
                'item_img'        => 'character/13.png',
                'item_description' => '家で話そう',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char 1',
                'category'        => 'scene_ero',
                'char_id'         => 1,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char 2',
                'category'        => 'scene_ero',
                'char_id'         => 2,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char 3',
                'category'        => 'scene_ero',
                'char_id'         => 3,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char 4',
                'category'        => 'scene_ero',
                'char_id'         => 4,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char51',
                'category'        => 'scene_ero',
                'char_id'         => 5,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample1 char 6',
                'category'        => 'scene_ero',
                'char_id'         => 6,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char 1',
                'category'        => 'scene_ero',
                'char_id'         => 1,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char 2',
                'category'        => 'scene_ero',
                'char_id'         => 2,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char 3',
                'category'        => 'scene_ero',
                'char_id'         => 3,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char 4',
                'category'        => 'scene_ero',
                'char_id'         => 4,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char51',
                'category'        => 'scene_ero',
                'char_id'         => 5,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
            [
                'item_name'       => 'sample2 char 6',
                'category'        => 'scene_ero',
                'char_id'         => 6,
                'item_img'        => '',
                'item_description' => 'erooooo',
                'price'           => 0,
                'expiration_date' => 0,
            ],
        ]);
    }
}
