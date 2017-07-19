<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ididea');
            $table->smallInteger('type')->comment('1:Logo, 2:Video, 3:Image');
            $table->smallInteger('location')->comment('1:Local, 2:External');
            $table->string('src', 1000)->comment('Media file path');
            $table->timestamps();
            $table->foreign('ididea')->references('id')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
