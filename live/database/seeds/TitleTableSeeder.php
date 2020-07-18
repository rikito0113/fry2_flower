<?php

use Illuminate\Database\Seeder;

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
