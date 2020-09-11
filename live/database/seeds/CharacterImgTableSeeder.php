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
            ['char_id'=>1,'name'=>'花菱あおい','category'=>'bg','item_id'=>4011],
            ['char_id'=>1,'name'=>'花菱あおい','category'=>'avatar','item_id'=>6001],
            ['char_id'=>1,'name'=>'花菱あおい','category'=>'effect','item_id'=>7001],
            ['char_id'=>2,'name'=>'橘花さくら','category'=>'bg','item_id'=>4014],
            ['char_id'=>2,'name'=>'橘花さくら','category'=>'avatar','item_id'=>6002],
            ['char_id'=>2,'name'=>'橘花さくら','category'=>'effect','item_id'=>7002],
            ['char_id'=>3,'name'=>'桐島せら','category'=>'bg','item_id'=>4017],
            ['char_id'=>3,'name'=>'桐島せら','category'=>'avatar','item_id'=>6003],
            ['char_id'=>3,'name'=>'桐島せら','category'=>'effect','item_id'=>7003],
            ['char_id'=>4,'name'=>'道明寺くるみ','category'=>'bg','item_id'=>4020],
            ['char_id'=>4,'name'=>'道明寺くるみ','category'=>'avatar','item_id'=>6004],
            ['char_id'=>4,'name'=>'道明寺くるみ','category'=>'effect','item_id'=>7004],
            ['char_id'=>5,'name'=>'神代ゆめ','category'=>'bg','item_id'=>4023],
            ['char_id'=>5,'name'=>'神代ゆめ','category'=>'avatar','item_id'=>6005],
            ['char_id'=>5,'name'=>'神代ゆめ','category'=>'effect','item_id'=>7005],
            ['char_id'=>6,'name'=>'椿姫まり','category'=>'bg','item_id'=>4026],
            ['char_id'=>6,'name'=>'椿姫まり','category'=>'avatar','item_id'=>6006],
            ['char_id'=>6,'name'=>'椿姫まり','category'=>'effect','item_id'=>7006],
        ]);
    }
}
