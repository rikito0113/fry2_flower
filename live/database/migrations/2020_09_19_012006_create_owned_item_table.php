<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnedItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_item', function (Blueprint $table) {
            $table->increments('owned_item_id');
            $table->integer('player_id');
            $table->integer('item_id');
            $table->integer('owned_char_id');
            $table->integer('num')->default(1);
            $table->dateTime('expire_time')->nullable();    // 有効期限 NULL時は無期限
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
        Schema::dropIfExists('owned_item');
    }
}
