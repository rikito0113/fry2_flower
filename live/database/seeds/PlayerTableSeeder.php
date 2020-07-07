<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('player')->insert([
            [
                'player_id'         => 853842,
                'pf_player_id'      => 1,
                'name'              => '853842',
            ]
        ]);
    }
}
