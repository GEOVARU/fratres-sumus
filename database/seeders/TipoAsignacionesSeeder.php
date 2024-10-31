<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAsignacionesSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            ['descripcion' => 'Psicológica', 'estado' => 1],
            ['descripcion' => 'Tutoría', 'estado' => 1],
            ['descripcion' => 'Administrativa', 'estado' => 1],
        ];

        foreach ($tipos as $tipo) {
            DB::table('tipo_asignaciones')->insert($tipo);
        }
    }
}
