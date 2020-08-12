<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerEventChatLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_event_chat_log', function (Blueprint $table) {
            $table->increments('player_event_chat_log_id');  // primary_id
            $table->integer('player_id');
            $table->mediumText('content');                   // chatの内容
            $table->integer('scenario_id');                  // シナリオID
            $table->boolean('is_player');                    // プレイヤーが送信したか、adminが送信か（後ほどfetchするため）
            $table->boolean('is_read');                      // 未読(false),既読(true)
            $table->timestamps();                            // create&update
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_event_chat_log');
    }
}
