<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->nullable();
            $table->foreignId('equipo_local_id')->references('id')->on('equipos');
            $table->foreignId('equipo_visitante_id')->references('id')->on('equipos');
            $table->foreignId('categoria_id')->references('id')->on('categorias');
            $table->string('pabellon', 255)->nullable();
            $table->string('localidad', 255)->nullable();
            $table->string('comentario', 255)->nullable();
            $table->integer('resultado_local')->nullable();
            $table->integer('resultado_visitante')->nullable();
            $table->boolean('alqazeres_es_local')->nullable();
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
        Schema::dropIfExists('partidos');
    }
}
