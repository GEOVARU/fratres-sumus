<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id(); // Campo id, auto incremental
            $table->unsignedBigInteger('id_pais'); // Campo para el ID del país
            $table->string('nombre', 150); // Campo para el nombre del estado
            $table->timestamps(); // Campos created_at y updated_at

            // Si deseas establecer una relación con la tabla paises
            $table->foreign('id_pais')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
