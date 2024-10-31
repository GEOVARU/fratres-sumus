<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesPreguntasTable extends Migration
{
    public function up()
    {
        Schema::create('asignaciones_preguntas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo_asignacion');
            $table->integer('id_pregunta');
            $table->string('usuario_registro', 50);
            $table->string('usuario_actualiza', 50);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaciones_preguntas');
    }
}
