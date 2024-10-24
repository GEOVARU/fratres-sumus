<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = [
            // Guatemala
            // Departamentos y Municipios
            ['id_estado' => 1, 'nombre' => 'Guatemala'],
            ['id_estado' => 1, 'nombre' => 'Mixco'],
            ['id_estado' => 1, 'nombre' => 'Villa Nueva'],
            ['id_estado' => 1, 'nombre' => 'Santa Catarina Pinula'],
            ['id_estado' => 1, 'nombre' => 'San Miguel Petapa'],
            ['id_estado' => 1, 'nombre' => 'Chinautla'],
            ['id_estado' => 1, 'nombre' => 'San Juan Sacatepéquez'],
            ['id_estado' => 2, 'nombre' => 'Flores'],
            ['id_estado' => 2, 'nombre' => 'Santa Elena'],
            ['id_estado' => 2, 'nombre' => 'San José'],
            ['id_estado' => 2, 'nombre' => 'San Andrés'],
            ['id_estado' => 3, 'nombre' => 'Escuintla'],
            ['id_estado' => 3, 'nombre' => 'Palín'],
            ['id_estado' => 3, 'nombre' => 'Santa Lucía Cotzumalguapa'],
            ['id_estado' => 4, 'nombre' => 'Chiquimula'],
            ['id_estado' => 4, 'nombre' => 'Esquipulas'],
            ['id_estado' => 4, 'nombre' => 'Jocotán'],
            ['id_estado' => 5, 'nombre' => 'Mazatenango'],
            ['id_estado' => 5, 'nombre' => 'San José'],
            ['id_estado' => 6, 'nombre' => 'Quetzaltenango'],
            ['id_estado' => 6, 'nombre' => 'Coatepeque'],
            ['id_estado' => 7, 'nombre' => 'Puerto Barrios'],
            ['id_estado' => 8, 'nombre' => 'Solalá'],
            ['id_estado' => 9, 'nombre' => 'Cobán'],
            ['id_estado' => 10, 'nombre' => 'Zacapa'],
            ['id_estado' => 11, 'nombre' => 'San Marcos'],
            ['id_estado' => 12, 'nombre' => 'Teculután'],
            ['id_estado' => 13, 'nombre' => 'Totonicapán'],
            ['id_estado' => 14, 'nombre' => 'Santa Rosa'],
            ['id_estado' => 15, 'nombre' => 'Baja Verapaz'],
            ['id_estado' => 16, 'nombre' => 'Alta Verapaz'],
            ['id_estado' => 17, 'nombre' => 'Huehuetenango'],
            ['id_estado' => 18, 'nombre' => 'San Juan Ixcoy'],
            ['id_estado' => 19, 'nombre' => 'El Progreso'],
            ['id_estado' => 20, 'nombre' => 'Chimaltenango'],
            ['id_estado' => 21, 'nombre' => 'Guastatoya'],
            ['id_estado' => 22, 'nombre' => 'Quiché'],
            ['id_estado' => 23, 'nombre' => 'Pueblo Nuevo Viñas'],
            ['id_estado' => 24, 'nombre' => 'Chiquimula'],
            ['id_estado' => 25, 'nombre' => 'Cuilapa'],

            // Estados Unidos
            ['id_estado' => 26, 'nombre' => 'Los Ángeles, CA'],
            ['id_estado' => 26, 'nombre' => 'Nueva York, NY'],
            ['id_estado' => 26, 'nombre' => 'Chicago, IL'],
            ['id_estado' => 26, 'nombre' => 'Houston, TX'],
            ['id_estado' => 26, 'nombre' => 'Phoenix, AZ'],
            ['id_estado' => 26, 'nombre' => 'Filadelfia, PA'],
            ['id_estado' => 26, 'nombre' => 'San Antonio, TX'],
            ['id_estado' => 26, 'nombre' => 'San Diego, CA'],
            ['id_estado' => 26, 'nombre' => 'Dallas, TX'],
            ['id_estado' => 26, 'nombre' => 'San José, CA'],
            ['id_estado' => 26, 'nombre' => 'Austin, TX'],
            ['id_estado' => 26, 'nombre' => 'Jacksonville, FL'],
            ['id_estado' => 26, 'nombre' => 'Fort Worth, TX'],
            ['id_estado' => 26, 'nombre' => 'Columbus, OH'],
            ['id_estado' => 26, 'nombre' => 'San Francisco, CA'],
            ['id_estado' => 26, 'nombre' => 'Charlotte, NC'],
            ['id_estado' => 26, 'nombre' => 'Indianápolis, IN'],
            ['id_estado' => 26, 'nombre' => 'Seattle, WA'],
            ['id_estado' => 26, 'nombre' => 'Denver, CO'],
            ['id_estado' => 26, 'nombre' => 'Washington D.C.'],
            ['id_estado' => 26, 'nombre' => 'Boston, MA'],
            ['id_estado' => 26, 'nombre' => 'El Paso, TX'],
            ['id_estado' => 26, 'nombre' => 'Nashville, TN'],
            ['id_estado' => 26, 'nombre' => 'Baltimore, MD'],
            ['id_estado' => 26, 'nombre' => 'Oklahoma City, OK'],
            ['id_estado' => 26, 'nombre' => 'Louisville, KY'],
            ['id_estado' => 26, 'nombre' => 'Portland, OR'],
            ['id_estado' => 26, 'nombre' => 'Las Vegas, NV'],
            ['id_estado' => 26, 'nombre' => 'Milwaukee, WI'],
            ['id_estado' => 26, 'nombre' => 'Albuquerque, NM'],
            ['id_estado' => 26, 'nombre' => 'Tucson, AZ'],
            ['id_estado' => 26, 'nombre' => 'Fresno, CA'],
            ['id_estado' => 26, 'nombre' => 'Sacramento, CA'],
            ['id_estado' => 26, 'nombre' => 'Long Beach, CA'],
            ['id_estado' => 26, 'nombre' => 'Kansas City, MO'],
            ['id_estado' => 26, 'nombre' => 'Mesa, AZ'],
            ['id_estado' => 26, 'nombre' => 'Virginia Beach, VA'],
            ['id_estado' => 26, 'nombre' => 'Atlanta, GA'],

            // México
            ['id_estado' => 27, 'nombre' => 'Ciudad de México'],
            ['id_estado' => 27, 'nombre' => 'Guadalajara'],
            ['id_estado' => 27, 'nombre' => 'Monterrey'],
            ['id_estado' => 27, 'nombre' => 'Cancún'],
            ['id_estado' => 27, 'nombre' => 'Puebla'],
            ['id_estado' => 27, 'nombre' => 'Tijuana'],
            ['id_estado' => 27, 'nombre' => 'León'],
            ['id_estado' => 27, 'nombre' => 'Mérida'],
            ['id_estado' => 27, 'nombre' => 'Veracruz'],
            ['id_estado' => 27, 'nombre' => 'Querétaro'],
            ['id_estado' => 27, 'nombre' => 'San Luis Potosí'],
            ['id_estado' => 27, 'nombre' => 'Hermosillo'],
            ['id_estado' => 27, 'nombre' => 'Chihuahua'],
            ['id_estado' => 27, 'nombre' => 'Toluca'],
            ['id_estado' => 27, 'nombre' => 'Aguascalientes'],
            ['id_estado' => 27, 'nombre' => 'Guadalajara'],
            ['id_estado' => 27, 'nombre' => 'Pachuca'],
            ['id_estado' => 27, 'nombre' => 'Saltillo'],
            ['id_estado' => 27, 'nombre' => 'Culiacán'],
            ['id_estado' => 27, 'nombre' => 'Durango'],
            ['id_estado' => 27, 'nombre' => 'Oaxaca'],
            ['id_estado' => 27, 'nombre' => 'Tuxtla Gutiérrez'],

            // El Salvador
            ['id_estado' => 28, 'nombre' => 'San Salvador'],
            ['id_estado' => 28, 'nombre' => 'Santa Ana'],
            ['id_estado' => 28, 'nombre' => 'San Miguel'],
            ['id_estado' => 28, 'nombre' => 'La Libertad'],
            ['id_estado' => 28, 'nombre' => 'Sonsonate'],
            ['id_estado' => 28, 'nombre' => 'Usulután'],
            ['id_estado' => 28, 'nombre' => 'Ahuachapan'],
            ['id_estado' => 28, 'nombre' => 'San Vicente'],
            ['id_estado' => 28, 'nombre' => 'La Paz'],
            ['id_estado' => 28, 'nombre' => 'Cabañas'],
            ['id_estado' => 28, 'nombre' => 'Morazán'],
            ['id_estado' => 28, 'nombre' => 'San Salvador'],
        ];

        DB::table('ciudades')->insert($ciudades);
    }
}



