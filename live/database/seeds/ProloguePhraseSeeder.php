<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProloguePhraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prologue_phrase')->insert([
            [
                'char_id'           => 1,
                'content'           => '初めまして！私char_id1です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 1,
                'content'           => 'へえ、どうでもいいけどね。年齢は？',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 1,
                'content'           => 'そうなんだ！同じだね。血液型は？',
                'content_index'     => 2,
            ],
            [
                'char_id'           => 1,
                'content'           => 'まあまあどうでもいいね。これでチュートリアル終わります。',
                'content_index'     => 3,
            ],
            [
                'char_id'           => 2,
                'content'           => '初めまして！私char_id2です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 2,
                'content'           => 'その名前大好き！好きな食べ物は？',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 2,
                'content'           => 'ふーん、チュートリアル終わります。',
                'content_index'     => 2,
            ],
            [
                'char_id'           => 3,
                'content'           => '初めまして！私char_id3です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 3,
                'content'           => '名前かっこいいいいいいいいいいいいいいいいいん！ぶひ？',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 3,
                'content'           => 'オッケー、チュートリアル終わります。',
                'content_index'     => 2,
            ],
            [
                'char_id'           => 4,
                'content'           => '初めまして！私char_id4です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 4,
                'content'           => 'どんどんいくデー、嫌いな食べ物は？',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 4,
                'content'           => '私もそれ嫌いだー。でもお前の方がもっと嫌いだよ？',
                'content_index'     => 2,
            ],
            [
                'char_id'           => 4,
                'content'           => '嘘嘘、大好きだよ',
                'content_index'     => 3,
            ],
            [
                'char_id'           => 4,
                'content'           => 'チュートリアル終わるね。',
                'content_index'     => 4,
            ],
            [
                'char_id'           => 5,
                'content'           => '初めまして！私char_id5です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 5,
                'content'           => 'ジャスミン茶が似合う名前だね、何か聞きたいことある？',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 5,
                'content'           => 'はーい、チュートリアル終わります。',
                'content_index'     => 2,
            ],
            [
                'char_id'           => 6,
                'content'           => '初めまして！私char_id6です。君はなんて名前？',
                'content_index'     => 0,
            ],
            [
                'char_id'           => 6,
                'content'           => 'あんまり興味なかったわ・・・ごめん・・・。何か発言しろ',
                'content_index'     => 1,
            ],
            [
                'char_id'           => 6,
                'content'           => 'はーい、チュートリアル終わります。',
                'content_index'     => 2,
            ],
        ]);
    }
}
