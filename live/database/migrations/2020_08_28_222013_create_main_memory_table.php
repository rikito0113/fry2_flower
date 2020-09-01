<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMemoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_memory', function (Blueprint $table) {
            $table->integer('player_id');
            $table->integer('memory_id');
            $table->integer('owned_char_id');
            $table->enum('attitude', [                        // TorN
                'tun',
                'dere'
            ]);
            $table->boolean('is_Lv');                         // Lv達成かイベントか
            $table->boolean('is_open_ecstasy')->default(0);   // 射精多
            $table->boolean('is_open_char')->default(0);      // エロ文字
            $table->boolean('is_recieved')->default(0);       // 開放の是非
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
        Schema::dropIfExists('main_memory');
    }
}
