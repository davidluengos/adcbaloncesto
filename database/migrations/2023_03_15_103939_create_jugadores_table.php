<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->foreignId('equipo_id')->references('id')->on('equipos');
            $table->foreignId('rol_id')->references('id')->on('roles');
            $table->foreignId('posicion_id')->references('id')->on('posiciones');
            $table->string('imagen', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
