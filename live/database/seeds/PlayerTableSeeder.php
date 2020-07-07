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
                'pf_player_id'      => 1,
                'name'              => 'rikito',
            ],
            [
                'pf_player_id'      => 2,
                'name'              => 'ayato',
            ],
            [
                'pf_player_id'      => 3,
                'name'              => 'makoto',
            ],
        ]);
    }
}
