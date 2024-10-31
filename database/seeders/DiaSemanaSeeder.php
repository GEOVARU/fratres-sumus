<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaSemanaSeeder extends Seeder
{
    public function run()
    {
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        foreach ($dias as $dia) {
            DB::table('dia_semana')->insert(['nombre' => $dia]);
        }
    }
}
