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
                'attitude'      => 'tun',
                'item_id'     => 1,
            ],
            [
                'level'         => 5,
                'char_id'       => 1,
                'attitude'      => 'dere',
                'item_id'     => 1,
            ],
            [
                'level'         => 5,
                'char_id'       => 2,
                'attitude'      => 'tun',
                'item_id'     => 2,
            ],
            [
                'level'         => 5,
                'char_id'       => 2,
                'attitude'      => 'dere',
                'item_id'     => 2,
            ],
            [
                'level'         => 5,
                'char_id'       => 3,
                'attitude'      => 'tun',
                'item_id'     => 3,
            ],
            [
                'level'         => 5,
                'char_id'       => 3,
                'attitude'      => 'dere',
                'item_id'     => 3,
            ],
            [
                'level'         => 5,
                'char_id'       => 4,
                'attitude'      => 'tun',
                'item_id'     => 4,
            ],
            [
                'level'         => 5,
                'char_id'       => 4,
                'attitude'      => 'dere',
                'item_id'     => 4,
            ],
            [
                'level'         => 5,
                'char_id'       => 5,
                'attitude'      => 'tun',
                'item_id'     => 5,
            ],
            [
                'level'         => 5,
                'char_id'       => 5,
                'attitude'      => 'dere',
                'item_id'     => 5,
            ],
            [
                'level'         => 5,
                'char_id'       => 6,
                'attitude'      => 'tun',
                'item_id'     => 6,
            ],
            [
                'level'         => 5,
                'char_id'       => 6,
                'attitude'      => 'dere',
                'item_id'     => 6,
            ],
        ]);
    }
}
