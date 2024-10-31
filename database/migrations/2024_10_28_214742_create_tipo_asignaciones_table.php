<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoAsignacionesTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_asignaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 150);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_asignaciones');
    }
}

