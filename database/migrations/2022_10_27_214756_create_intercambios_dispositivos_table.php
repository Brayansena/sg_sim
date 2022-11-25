<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntercambiosSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intercambios_dispositivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_oldDispositivo');
            $table->foreign('id_oldDispositivo')->references('id')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_puntoVenta');
            $table->foreign('id_puntoVenta')->references('id')->on('punto_ventas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_userCreador');
            $table->foreign('id_userCreador')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_newDispositivo');
            $table->foreign('id_newDispositivo')->references('id')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('intercambios_dispositivos');
    }
}
