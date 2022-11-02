<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos', function (Blueprint $table) {

            $table->string('tipoDispositivo');
            $table->id();
            $table->string('serial');
            $table->string('modelo');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_puntoVenta');
            $table->foreign('id_puntoVenta')->references('id')->on('punto_ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('estado');
            $table->string('cedulaResponsable')->nullable();
            $table->string('nombreResponsable')->nullable();
            $table->unsignedBigInteger('id_userAsignado');
            $table->foreign('id_userAsignado')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('fechaAsignacion')->nullable();
            $table->string('numeroActa')->nullable();
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('discoDuro')->nullable();
            $table->string('mac')->nullable();
            $table->string('imei')->nullable();
            $table->text('observacion')->nullable();
            $table->string('cantidad')->nullable();
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
        Schema::dropIfExists('dispositivos');
    }
};
