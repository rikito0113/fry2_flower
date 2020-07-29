<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGirlTermScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girl_term_score', function (Blueprint $table) {
            $table->increments('girl_term_score_id');
            $table->integer('owned_char_id');
            $table->integer('score')->default(0);;
            $table->integer('term_id');
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
        Schema::dropIfExists('girl_term_score');
    }
}
