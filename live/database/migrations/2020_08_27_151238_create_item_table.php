<?php
// アイテムマスタ
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integer('item_id')->unique();
            $table->integer('char_id')->default(0);
            $table->string('item_name');
            $table->enum('category', ['shop', 'tool', 'scene_normal', 'scene_ero', 'bg', 'avatar', 'effect']);
            $table->string('item_img'); // パス(folder/file)
            $table->text('item_description');
            $table->integer('price')->default(0);
            $table->integer('expiration_date')->default(0); // ex) 1 = 付与されたその日に切れる(24:00)、 2 = 付与された次の日消える、 0=なし
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
