<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnedCharacterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_character_data', function (Blueprint $table) {
            $table->increments('owned_char_id');
            $table->integer('player_id');
            $table->integer('char_id');
            $table->integer('level')->default(1);
            $table->integer('exp')->default(0);
            $table->integer('dere')->default(0);
            $table->integer('tun')->default(0);
            $table->integer('remain_point')->default(0);
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
        Schema::dropIfExists('owned_character_data');
    }
}
