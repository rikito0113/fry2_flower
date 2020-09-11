<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_img')->insert([
            [
                'char_id'           => 1,
                'name'              => '齋藤飛鳥(制服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 2,
                'name'              => '白石麻衣(制服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 3,
                'name'              => '西野七瀬(制服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 4,
                'name'              => '橋本奈々未(私服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 5,
                'name'              => '生田絵梨花(制服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 6,
                'name'              => '松村沙友理(制服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 1,
                'name'              => '齋藤飛鳥(私服)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 3,
                'name'              => '西野七瀬(衣装)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 4,
                'name'              => '橋本奈々未(私服2)',
                'category'          => 'avatar',
            ],
            [
                'char_id'           => 5,
                'name'              => '生田絵梨花(アップ)',
                'category'          => 'avatar',
            ],
        ]);
    }
}
