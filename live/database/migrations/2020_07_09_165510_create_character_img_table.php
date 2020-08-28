<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_img', function (Blueprint $table) {
            $table->increments('img_id');
            $table->integer('char_id');
            $table->string('name');
            $table->enum(
                'category',
                ['avatar_form', 'background', 'avatar_hair']
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
        Schema::dropIfExists('character_img');
    }
}
