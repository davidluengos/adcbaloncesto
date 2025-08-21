<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Añadimos la columna 'activo' a la tabla 'jugadores'
        Schema::table('jugadores', function (Blueprint $table) {
            $table->boolean('activo')->default(false)->after('posicion_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminamos la columna 'activo' de la tabla 'jugadores'
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropColumn('activo');
        });
    }
}
