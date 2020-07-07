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
                'subject'        => '国語',
            ],
            [
                'char_name'      => '白石麻衣',
                'subject'        => '数学',
            ],
            [
                'char_name'      => '西野七瀬',
                'subject'        => '生物',
            ],
            [
                'char_name'      => '橋本奈々未',
                'subject'        => '歴史',
            ],
            [
                'char_name'      => '生田絵梨花',
                'subject'        => '音楽',
            ],
            [
                'char_name'      => '松村沙友理',
                'subject'        => '英語',
            ],
        ]);
    }
}
