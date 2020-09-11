<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventFixedPhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_fixed_phrase', function (Blueprint $table) {
            $table->increments('event_fixed_phrase_id');
            $table->mediumText('content')->charset('utf8');   // chatの内容
            $table->integer('scenario_id');                   // シナリオID
            $table->integer('content_index');                 // シナリオ中で何番目か
            $table->enum('attitude', [                        // TorN
                'neutral',
                'tsun',
                'dere'
            ]);
            $table->boolean('is_auto');                       // entry時、自動挿入フラグ enty=true or それ以外 = false
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
        Schema::dropIfExists('event_fixed_phrase');
    }
}
