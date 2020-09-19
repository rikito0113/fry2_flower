<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_img', function (Blueprint $table) {
            $table->integer('owned_char_id');
            $table->integer('char_id');
            $table->string('avatar_img')->nullable();
            $table->string('bg_img')->nullable();
            $table->string('effect_img')->nullable();
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
        Schema::dropIfExists('set_img');
    }
}
