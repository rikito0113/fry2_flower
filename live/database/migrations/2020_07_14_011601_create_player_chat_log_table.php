<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerChatLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_chat_log', function (Blueprint $table) {
            $table->increments('player_chat_log_id');  // primary_id
            $table->integer('player_id');
            $table->mediumText('content');                      // chatの内容
            $table->integer('char_id');                         // キャラID
            $table->string('char_avatar_img');                  // キャラ服
            $table->string('char_bg_img');                      // キャラ背景
            $table->string('char_effect_img')->nullable();      // キャラエフェクト
            $table->boolean('is_player');                       // プレイヤーが送信したか、adminが送信か（後ほどfetchするため）
            $table->boolean('is_read');                         // 未読(false),既読(true)
            $table->timestamps();                               // create&update
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_chat_log');
    }
}
