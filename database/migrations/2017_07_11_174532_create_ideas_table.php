<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser');
            $table->string('name', 50);
            $table->string('your', 500)->comment('Tell us about yourself');
            $table->string('problem', 600)->comment('Tell us about the problem');
            $table->string('solution', 600)->comment('Tell us the solution');
            $table->string('industry', 500)->comment('Tell us about the industry where you want to');
            $table->string('competitors', 300)->comment('Who are your competitors?');
            $table->string('entry', 300)->comment('What is your income model?');
            $table->string('us', 600)->comment('What do you expect from us?');
            $table->string('representative_name', 60)->comment('Representative name');
            $table->string('equipment', 600)->comment('How the equipment is divided?');
            $table->string('Partners', 400)->comment('Who are the partners?');
            $table->string('society', 400)->comment('How is society divided');
            $table->string('phone', 15)->comment('Representative phone');
            $table->string('email', 60)->comment('Representative email');
            $table->string('skypeid', 60)->comment('Representative skype');
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
