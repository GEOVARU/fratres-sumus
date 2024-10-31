<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteAsignacionTable extends Migration
{
    public function up()
    {
        Schema::create('reporte_asignacion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pregunta');
            $table->integer('id_asignacion');
            $table->text('respuesta');
            $table->string('usuario_registro', 50);
            $table->string('usuario_actualiza', 50);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reporte_asignacion');
    }
}
