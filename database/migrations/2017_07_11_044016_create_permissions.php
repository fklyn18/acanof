<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('iduser');
            $table->integer('idscreen');
            $table->smallInteger('level')->comment('1:Consultar, 2:Modificar, 3:Eliminar');
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idscreen')->references('id')->on('screens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
