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
        Schema::create('simcards', function (Blueprint $table) {
            $table->id();
            $table->string('linea');
            $table->string('apn')->nullable();
            $table->string('usuario')->nullable();
            $table->string('clave')->nullable();
            $table->string('planAsignado');
            $table->integer('fechaCorte')->nullable();
            $table->string('estado')->default('Inactiva');
            $table->integer('id_userAsignado')->default(1);
            $table->string('operador');

            $table->unsignedBigInteger('id_userCreador')->default(1);
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
        Schema::dropIfExists('simcards');
    }
};
