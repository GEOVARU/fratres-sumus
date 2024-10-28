<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TiposUsuariosSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(TipoDocumentosSeeder::class);
        $this->call(DiaSemanaSeeder::class);
        $this->call(TipoAsignacionesSeeder::class);
    }
}
