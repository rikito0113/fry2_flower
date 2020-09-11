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
            $table->mediumText('content');          // chatの内容
            $table->integer('char_id');             // キャラID
            $table->integer('char_avatar_id'); // キャラ服id
            $table->integer('char_effect_id'); // キャラ髪id
            $table->integer('char_bg_id');  // キャラ背景id
            $table->boolean('is_player');           // プレイヤーが送信したか、adminが送信か（後ほどfetchするため）
            $table->boolean('is_read');             // 未読(false),既読(true)
            $table->timestamps();                   // create&update
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
