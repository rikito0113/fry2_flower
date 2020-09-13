<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorialPhraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutorial_phrase')->insert([
            [
                'content'   => '....あなたは？？',
                'img_id'    => 1,
                'is_player' => false,
            ],
            [
                'content'   => '....オレ？？？',
                'img_id'    => 1,
                'is_player' => false,
            ],
            [
                'content'   => '私は〇〇よ',
                'img_id'    => 2,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ。僕は〇〇',
                'img_id'    => 2,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなのね、転校生？',
                'img_id'    => 3,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ',
                'img_id'    => 3,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ1',
                'img_id'    => 4,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ1',
                'img_id'    => 4,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ2',
                'img_id'    => 5,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ2',
                'img_id'    => 5,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ3',
                'img_id'    => 6,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ3',
                'img_id'    => 6,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ4',
                'img_id'    => 7,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ4',
                'img_id'    => 7,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ5',
                'img_id'    => 8,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ5',
                'img_id'    => 8,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ6',
                'img_id'    => 9,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ6',
                'img_id'    => 9,
                'is_player' => false,
            ],
            [
                'content'   => 'そうなんだ7',
                'img_id'    => 10,
                'is_player' => false,
            ],
            [
                'content'   => 'そうだよ7',
                'img_id'    => 10,
                'is_player' => false,
            ],
        ]);
    }
}
