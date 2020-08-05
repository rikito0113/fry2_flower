<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EventFixedPhraseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_fixed_phrase')->insert([
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 1,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => '授業サボってるでしょ',
                'scenario_id'       => 1,
                'content_index'     => 1,
                'attitude'          => 'neutral',
                'is_auto'           => false,
            ],
            [
                'content'           => 'うるせー、バカやろー',
                'scenario_id'       => 1,
                'content_index'     => 2,
                'attitude'          => 'neutral',
                'is_auto'           => false,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 2,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 3,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 4,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 5,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 6,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 7,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 8,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 9,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 10,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 11,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 12,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 13,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 14,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 15,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 16,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 17,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
            [
                'content'           => 'あっ、待ってたよー',
                'scenario_id'       => 18,
                'content_index'     => 0,
                'attitude'          => 'neutral',
                'is_auto'           => true,
            ],
        ]);
    }
}
