<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_info', function (Blueprint $table) {
            $table->increments('event_info_id');                     // id
            $table->text('title');                              // イベントのタイトル
            $table->text('content');
            $table->string('banner_img');                       // バナーのimg
            $table->date('start_time');                         // イベント開始時間
            $table->date('end_time');                           // イベント終了時間
            $table->string('content_img')->nullable();          // 記事内のimg
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
