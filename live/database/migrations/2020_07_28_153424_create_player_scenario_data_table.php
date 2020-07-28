<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerScenarioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_scenario_data', function (Blueprint $table) {
            $table->increments('player_scenario_id');           // primary
            $table->integer('player_id');                       // player_id
            $table->integer('scenario_id');                     // scenario_id
            $table->integer('scenario_num')->default(0);        // scenario_num
            $table->boolean('is_read')->default(false);         // 既読フラグ
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
        Schema::dropIfExists('player_scenario_data');
    }
}
