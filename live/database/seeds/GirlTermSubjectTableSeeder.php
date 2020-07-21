<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GirlTermSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('girl_term_subject')->truncate();

        DB::table('girl_term_subject')->insert([
            [
                'char_id'      => 1,
                'subject_id'   => 1,
                'term_id'      => 1,
            ],
            [
                'char_id'      => 2,
                'subject_id'   => 2,
                'term_id'      => 1,
            ],
            [
                'char_id'      => 3,
                'subject_id'   => 3,
                'term_id'      => 1,
            ],
            [
                'char_id'      => 4,
                'subject_id'   => 4,
                'term_id'      => 1,
            ],
            [
                'char_id'      => 5,
                'subject_id'   => 5,
                'term_id'      => 1,
            ],
            [
                'char_id'      => 6,
                'subject_id'   => 6,
                'term_id'      => 1,
            ],
        ]);
    }
}
