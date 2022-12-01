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
            $table->string('serial')->nullable();
            $table->string('modelo')->nullable();
            $table->unsignedBigInteger('id_puntoVenta')->default(1);
            $table->foreign('id_puntoVenta')->references('id')->on('punto_ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('estado');
            $table->unsignedBigInteger('id_userAsignado')->default(3);
            $table->foreign('id_userAsignado')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('numeroActa');
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('discoDuro')->nullable();
            $table->string('mac')->nullable();
            $table->string('imei')->nullable();
            $table->text('observacion')->nullable();
            $table->string('cantidad')->nullable();
            $table->unsignedBigInteger('id_userCreador')->default(2);
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
