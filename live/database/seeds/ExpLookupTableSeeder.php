<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpLookupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exp_lookup')->insert([
            [
                'level'         => 1,
                'exp'           => 0,
            ],
            [
                'level'         => 2,
                'exp'           => 10,
            ],
            [
                'level'         => 3,
                'exp'           => 20,
            ],
            [
                'level'         => 4,
                'exp'           => 30,
            ],
            [
                'level'         => 5,
                'exp'           => 40,
            ],
            [
                'level'         => 6,
                'exp'           => 50,
            ],
            [
                'level'         => 7,
                'exp'           => 60,
            ],
            [
                'level'         => 8,
                'exp'           => 70,
            ],
            [
                'level'         => 9,
                'exp'           => 80,
            ],
            [
                'level'         => 10,
                'exp'           => 90,
            ],
        ]);
    }
}
