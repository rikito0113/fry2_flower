<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ScenarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scenario')->insert([
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => 'プール',
                'daytime'             => '朝',
                'char_id'             => 1,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => '教室',
                'daytime'             => '昼',
                'char_id'             => 1,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => '保健室',
                'daytime'             => '晩',
                'char_id'             => 1,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => '部屋',
                'daytime'             => '朝',
                'char_id'             => 2,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => 'トイレ',
                'daytime'             => '昼',
                'char_id'             => 2,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => 'お風呂',
                'daytime'             => '晩',
                'char_id'             => 2,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '繁華街',
                'place'               => 'ゲームセンター',
                'daytime'             => '朝',
                'char_id'             => 3,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '繁華街',
                'place'               => 'レストラン',
                'daytime'             => '昼',
                'char_id'             => 3,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '繁華街',
                'place'               => '映画館',
                'daytime'             => '晩',
                'char_id'             => 3,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '出身地',
                'place'               => '駅',
                'daytime'             => '朝',
                'char_id'             => 4,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '出身地',
                'place'               => '実家',
                'daytime'             => '昼',
                'char_id'             => 4,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '出身地',
                'place'               => '海辺',
                'daytime'             => '晩',
                'char_id'             => 4,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => '保健室',
                'daytime'             => '朝',
                'char_id'             => 5,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => 'プール',
                'daytime'             => '昼',
                'char_id'             => 5,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '学校',
                'place'               => '教室',
                'daytime'             => '晩',
                'char_id'             => 5,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => 'トイレ',
                'daytime'             => '朝',
                'char_id'             => 6,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => '風呂',
                'daytime'             => '昼',
                'char_id'             => 6,
                'default_background'  => 12,
            ],
            [
                'start_datetime'      => '2020-07-20 10:00:00',
                'end_datetime'        => '2020-08-20 23:59:59’',
                'field'               => '華姫寮',
                'place'               => '部屋',
                'daytime'             => '晩',
                'char_id'             => 6,
                'default_background'  => 12,
            ],
        ]);
    }
}
