<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPointRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_point_reward', function (Blueprint $table) {
            $table->increments('reward_id');
            $table->integer('char_id');
            $table->enum('attitude', [          // TorN
                'tun',
                'dere',
            ]);
            $table->integer('term_id');
            $table->integer('need_study_point');
            $table->integer('item_id');
            $table->enum('category', ['shop', 'tool', 'scene_normal', 'scene_ero', 'bg', 'avatar_form', 'avatar_hair']);
            $table->integer('num');
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
        Schema::dropIfExists('study_point_reward');
    }
}
