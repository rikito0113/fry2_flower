<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CharacterDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_data')->insert([
            [
                'char_name'      => '花菱あおい',
            ],
            [
                'char_name'      => '橘花さくら',
            ],
            [
                'char_name'      => '桐島せら',
            ],
            [
                'char_name'      => '道明寺くるみ',
            ],
            [
                'char_name'      => '神代ゆめ',
            ],
            [
                'char_name'      => '椿姫まり',
            ],
        ]);
    }
}
