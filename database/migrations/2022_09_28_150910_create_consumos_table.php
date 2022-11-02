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
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_simcards');
            $table->foreign('id_simcards')->references('id')->on('simcards')->onUpdate('cascade')->onDelete('cascade');

            $table->string('consumo1');
            $table->string('consumo2')->nullable();
            $table->string('consumo3')->nullable();

            $table->unsignedBigInteger('id_userCreador')->default();
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
        Schema::dropIfExists('consumos');
    }
};
