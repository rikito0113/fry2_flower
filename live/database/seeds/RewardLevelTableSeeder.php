<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reward_level')->insert([
            [
                'level'         => 5,
                'char_id'       => 1,
                'attitude'      => 'tsun',
                'item_id'     => 4,
            ],
            [
                'level'         => 5,
                'char_id'       => 1,
                'attitude'      => 'dere',
                'item_id'     => 10,
            ],
            [
                'level'         => 5,
                'char_id'       => 2,
                'attitude'      => 'tsun',
                'item_id'     => 5,
            ],
            [
                'level'         => 5,
                'char_id'       => 2,
                'attitude'      => 'dere',
                'item_id'     => 11,
            ],
            [
                'level'         => 5,
                'char_id'       => 3,
                'attitude'      => 'tsun',
                'item_id'     => 6,
            ],
            [
                'level'         => 5,
                'char_id'       => 3,
                'attitude'      => 'dere',
                'item_id'     => 12,
            ],
            [
                'level'         => 5,
                'char_id'       => 4,
                'attitude'      => 'tsun',
                'item_id'     => 7,
            ],
            [
                'level'         => 5,
                'char_id'       => 4,
                'attitude'      => 'dere',
                'item_id'     => 13,
            ],
            [
                'level'         => 5,
                'char_id'       => 5,
                'attitude'      => 'tsun',
                'item_id'     => 8,
            ],
            [
                'level'         => 5,
                'char_id'       => 5,
                'attitude'      => 'dere',
                'item_id'     => 14,
            ],
            [
                'level'         => 5,
                'char_id'       => 6,
                'attitude'      => 'tsun',
                'item_id'     => 9,
            ],
            [
                'level'         => 5,
                'char_id'       => 6,
                'attitude'      => 'dere',
                'item_id'     => 15,
            ],
        ]);
    }
}
