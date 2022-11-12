<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivoAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo_asignados', function (Blueprint $table) {
            $table->id();
            $table->string('registro')->default('Activo');

            $table->unsignedBigInteger('id_puntoVenta');
            $table->foreign('id_puntoVenta')->references('id')->on('punto_ventas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_dispositivo');
            $table->foreign('id_dispositivo')->references('id')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_userCreador');
            $table->foreign('id_userCreador')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('dispositivo_asignados');
    }
}
