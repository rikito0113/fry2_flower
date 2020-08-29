<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memory')->insert([
            [
                'char_id'       => 1,
                'memory_name'   => 'sample char 1',
            ],
            [
                'char_id'       => 2,
                'memory_name'   => 'sample char 2',
            ],
            [
                'char_id'       => 3,
                'memory_name'   => 'sample char 3',
            ],
            [
                'char_id'       => 4,
                'memory_name'   => 'sample char 4',
            ],
            [
                'char_id'       => 5,
                'memory_name'   => 'sample char 5',
            ],
            [
                'char_id'       => 6,
                'memory_name'   => 'sample char 6',
            ],
        ]);
    }
}
