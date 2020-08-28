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
        ]);
    }
}
