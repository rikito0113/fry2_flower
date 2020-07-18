<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('title')->insert([
            [
                'title_text'    => 'King Of Enachan',
            ],
        ]);
    }
}
