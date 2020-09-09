<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_info')->insert([
            [
                'title'             => 'イベント情報No.1',
                'content'           => 'demodemodemodemodemo111111111',
                'banner_img'        => 'bn_event001',
                'start_time'        => '2020-09-09',
                'end_time'          => '2020-10-09',
                'content_img'       => 'news_contents001',
            ],
            [
                'title'             => 'イベント情報No.2',
                'content'           => 'demodemodemodemodemo222222222',
                'banner_img'        => 'bn_event002',
                'start_time'        => '2020-09-09',
                'end_time'          => '2020-10-09',
                'content_img'       => 'news_contents001',
            ],
        ]);
    }
}
