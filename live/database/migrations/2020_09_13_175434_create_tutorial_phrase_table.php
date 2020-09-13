<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialPhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorial_phrase', function (Blueprint $table) {
            $table->increments('tutorial_id');          // primary
            $table->mediumText('content');              // テキストの内容
            $table->integer('img_id');                  // tutorial/img_id
            $table->boolean('is_player');               // girl=false | player=true
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
        Schema::dropIfExists('tutorial_phrase');
    }
}
