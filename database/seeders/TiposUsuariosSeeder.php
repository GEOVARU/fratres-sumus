<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta los registros en la tabla tipos_usuarios
        DB::table('tipos_usuarios')->insert([
            ['descripcion' => 'administrador', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'general', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'beneficiarias', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'psicologas', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'tutores', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'padres', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'encargados legales', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'equipo redes sociales', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'equipo it', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'equipo economico', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'atencion', 'estado' => 1,'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
