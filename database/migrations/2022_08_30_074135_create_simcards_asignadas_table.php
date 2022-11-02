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
        Schema::create('simcards_asignadas', function (Blueprint $table) {
            $table->id();

            $table->string('observaciones')->nullable();

            $table->unsignedBigInteger('id_simcard')->unique();
            $table->foreign('id_simcard')->references('id')->on('simcards')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_puntoVenta');
            $table->foreign('id_puntoVenta')->references('id')->on('punto_ventas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_userCreador');
            $table->foreign('id_userCreador')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('estado');

            $table->dateTime('fechaRegistro');

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
        Schema::dropIfExists('simcards_asignadas');
    }
};
