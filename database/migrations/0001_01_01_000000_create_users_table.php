<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Llave primaria
            $table->id();

            // Información del usuario
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('otros_nombres', 100)->nullable();
            $table->string('primer_apellido', 100);
            $table->string('segundo_apellido', 100)->nullable();

            // Documento de identificación
            $table->integer('tipo_documento_identificacion');
            $table->string('identificacion', 25)->unique();

            // Teléfonos
            $table->string('telefono_1', 20);
            $table->string('telefono_2', 20)->nullable();

            // Información de usuario y autenticación
            $table->string('usuario', 25)->unique();
            $table->string('correo_electronico', 150)->unique();
            $table->timestamp('correo_electronico_verified_at')->nullable();
            $table->string('password');

            // Ubicación
            $table->integer('pais');
            $table->integer('estado');
            $table->integer('ciudad');
            $table->string('direccion', 100);

            // Información adicional
            $table->string('colegiado', 100)->nullable();
            $table->integer('tipo_usuario');
            $table->integer('condicion');
            $table->string('fotografia', 100)->nullable();

            // Información de registro y actualización
            $table->string('usuario_registro', 25)->nullable();
            $table->string('usuario_actualiza', 25);

            $table->rememberToken();
            // Timestamps para la fecha de creación y actualización
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
