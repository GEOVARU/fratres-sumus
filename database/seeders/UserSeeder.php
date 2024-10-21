<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'primer_nombre' => 'Alfredo',
                'segundo_nombre' => 'Geovanni',
                'otros_nombres' => '',
                'primer_apellido' => 'Ramirez',
                'segundo_apellido' => 'Tzunun',
                'tipo_documento_identificacion' => 1, // Ej. 1: DPI
                'identificacion' => '1010101010101',
                'telefono_1' => '33334444',
                'telefono_2' => '',
                'usuario' => 'gramirez',
                'correo_electronico' => 'alfrediviris.1@gmail.com',
                'password' => Hash::make('abc123**'), // Hasheando la contraseña
                'pais' => 1, // Ej. 1: Guatemala
                'estado' => 1, // depto: 1 Guate
                'ciudad' => 1,  // depto: 1 Guate
                'direccion' => 'Calle Falsa 123',
                'colegiado' => null,
                'tipo_usuario' => 1, // Ej. 1: Administrador
                'condicion' => 1, // Ej. 1: Activo
                'fotografia' => null,
                'usuario_registro' => 'admin',
                'usuario_actualiza' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
