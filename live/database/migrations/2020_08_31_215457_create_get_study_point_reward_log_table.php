<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetStudyPointRewardLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_study_point_reward_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->integer('player_id');
            $table->integer('char_id');
            $table->integer('term_id');
            $table->integer('reward_id');
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
        Schema::dropIfExists('get_study_point_reward_log');
    }
}
