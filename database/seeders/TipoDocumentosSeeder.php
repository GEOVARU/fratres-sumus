<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;
use Carbon\Carbon;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::insert([
            [
                'nombre' => 'DPI',
                'descripcion' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'CUI',
                'descripcion' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'DUI',
                'descripcion' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'PASAPORTE',
                'descripcion' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
