<?php

use Illuminate\Database\Seeder;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('term')->insert([
            [
                'term_name'    => '京都大乱闘',
                'term_start'   => '2020-07-17',
                'term_end'     => '2020-09-01',
            ],
        ]);
    }
}
