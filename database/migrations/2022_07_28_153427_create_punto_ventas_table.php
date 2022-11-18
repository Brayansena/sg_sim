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
        Schema::create('punto_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePdv');
            $table->string('direccion')->nullable();

            $table->string('municipio');
            $table->text('zona');
            $table->string('canal');
            $table->string('conexion');
            $table->string('jefeComercial');
            $table->string('ccCordinador');
            $table->string('cordinador');
            $table->string('ccLider');
            $table->string('lider');
            $table->string('estado')->default('Activo');


            // $table->unsignedBigInteger('id_municipio');
            // $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_zona');
            // $table->foreign('id_zona')->references('id')->on('zonas')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_canal');
            // $table->foreign('id_canal')->references('id')->on('canales')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_conexion');
            // $table->foreign('id_conexion')->references('id')->on('conexiones')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_cordinador');
            // $table->foreign('id_cordinador')->references('id')->on('cordinadores')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_jefeComercial');
            // $table->foreign('id_jefeComercial')->references('id')->on('jefe_comerciales')->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('id_lider');
            // $table->foreign('id_lider')->references('id')->on('lideres')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('punto_ventas');
    }
};
