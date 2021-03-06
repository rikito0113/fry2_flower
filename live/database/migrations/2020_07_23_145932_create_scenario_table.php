<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenario', function (Blueprint $table) {
            $table->increments('scenario_id');          // primary_id
            $table->string('start_datetime');
            $table->string('end_datetime');
            $table->integer('field');                   // 場所A
            $table->integer('place');                   // 場所B
            $table->enum('daytime', [
                'morning',
                'noon',
                'night'
            ]);                                         // 出現時間
            $table->integer('char_id');
            $table->string('title');                    // シナリオのタイトル
            $table->integer('default_background');
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
        Schema::dropIfExists('scenario');
    }
}
