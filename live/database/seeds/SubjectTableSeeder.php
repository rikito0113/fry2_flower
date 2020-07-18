<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            [
                'subject_name'              => '数学',
            ],
            [
                'subject_name'              => '国語',
            ],
            [
                'subject_name'              => '英語',
            ],
            [
                'subject_name'              => '生物',
            ],
            [
                'subject_name'              => '歴史',
            ],
            [
                'subject_name'              => '音楽',
            ],
        ]);
    }
}
