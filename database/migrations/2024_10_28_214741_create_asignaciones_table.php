<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_interesado', 25);
            $table->string('usuario_asignado', 25);
            $table->integer('hora_inicio');
            $table->integer('minuto_inicio');
            $table->integer('hora_fin');
            $table->integer('minuto_fin');
            $table->integer('id_dia');
            $table->integer('anio');
            $table->integer('estado');
            $table->integer('id_tipo_asignacion');
            $table->string('usuario_registro', 50);
            $table->string('usuario_actualiza', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaciones');
    }
}
