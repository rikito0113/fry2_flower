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
                'char_name'      => '齋藤飛鳥',
            ],
            [
                'char_name'      => '白石麻衣',
            ],
            [
                'char_name'      => '西野七瀬',
            ],
            [
                'char_name'      => '橋本奈々未',
            ],
            [
                'char_name'      => '生田絵梨花',
            ],
            [
                'char_name'      => '松村沙友理',
            ],
        ]);
    }
}
