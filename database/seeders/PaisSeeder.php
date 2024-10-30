<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            ['nombre' => 'Guatemala', 'codigo' => '+502', 'estado' => 1],
            ['nombre' => 'El Salvador', 'codigo' => '+503', 'estado' => 1],
            ['nombre' => 'Honduras', 'codigo' => '+504', 'estado' => 1],
            ['nombre' => 'Nicaragua', 'codigo' => '+505', 'estado' => 1],
            ['nombre' => 'Costa Rica', 'codigo' => '+506', 'estado' => 1],
            ['nombre' => 'Panamá', 'codigo' => '+507', 'estado' => 1],
            ['nombre' => 'México', 'codigo' => '+52', 'estado' => 1],
            ['nombre' => 'Estados Unidos', 'codigo' => '+1', 'estado' => 1],
            ['nombre' => 'España', 'codigo' => '+34', 'estado' => 1],
            ['nombre' => 'Francia', 'codigo' => '+33', 'estado' => 1],
            ['nombre' => 'Colombia', 'codigo' => '+57', 'estado' => 1],
            ['nombre' => 'Venezuela', 'codigo' => '+58', 'estado' => 1],
            ['nombre' => 'Argentina', 'codigo' => '+54', 'estado' => 1],
            ['nombre' => 'Chile', 'codigo' => '+56', 'estado' => 1],
            ['nombre' => 'Canadá', 'codigo' => '+1', 'estado' => 1],
        ];

        DB::table('paises')->insert($paises);
    }
}
