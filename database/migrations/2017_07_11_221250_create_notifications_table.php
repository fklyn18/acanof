<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('idusertransmitter')->comment('Transmitting user');
            $table->integer('iduserreceiver')->comment('Receiving user');
            $table->integer('type')->comment('1:Tracking, 2:To define, etc...');
            $table->integer('idnotification')->comment('Id from notifications...');
            $table->timestamps();
            $table->foreign('idusertransmitter')->references('id')->on('users');
            $table->foreign('iduserreceiver')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
