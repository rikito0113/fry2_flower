<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnedCharacterImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_character_img', function (Blueprint $table) {
            $table->integer('owned_char_id');
            $table->integer('player_id');
            $table->integer('item_id');
            $table->integer('num')->default(0);
            $table->enum(
                'category',
                ['avatar', 'bg', 'effect']
            );
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
        Schema::dropIfExists('owned_character_img');
    }
}
