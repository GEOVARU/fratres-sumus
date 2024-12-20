<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            // Guatemala
            ['id_pais' => 1, 'nombre' => 'Guatemala'],
            ['id_pais' => 1, 'nombre' => 'Alta Verapaz'],
            ['id_pais' => 1, 'nombre' => 'Baja Verapaz'],
            ['id_pais' => 1, 'nombre' => 'Chimaltenango'],
            ['id_pais' => 1, 'nombre' => 'Chiquimula'],
            ['id_pais' => 1, 'nombre' => 'Escuintla'],
            ['id_pais' => 1, 'nombre' => 'Huehuetenango'],
            ['id_pais' => 1, 'nombre' => 'Izabal'],
            ['id_pais' => 1, 'nombre' => 'Jalapa'],
            ['id_pais' => 1, 'nombre' => 'Peten'],
            ['id_pais' => 1, 'nombre' => 'Quetzaltenango'],
            ['id_pais' => 1, 'nombre' => 'Quiché'],
            ['id_pais' => 1, 'nombre' => 'San Marcos'],
            ['id_pais' => 1, 'nombre' => 'Santa Rosa'],
            ['id_pais' => 1, 'nombre' => 'Solalá'],
            ['id_pais' => 1, 'nombre' => 'Suchitepéquez'],
            ['id_pais' => 1, 'nombre' => 'Totonicapán'],
            ['id_pais' => 1, 'nombre' => 'Zacapa'],

            // El Salvador
            ['id_pais' => 2, 'nombre' => 'Ahuachapán'],
            ['id_pais' => 2, 'nombre' => 'Cabañas'],
            ['id_pais' => 2, 'nombre' => 'Chalatenango'],
            ['id_pais' => 2, 'nombre' => 'La Libertad'],
            ['id_pais' => 2, 'nombre' => 'La Paz'],
            ['id_pais' => 2, 'nombre' => 'San Salvador'],
            ['id_pais' => 2, 'nombre' => 'San Vicente'],
            ['id_pais' => 2, 'nombre' => 'Santa Ana'],
            ['id_pais' => 2, 'nombre' => 'Sonsonate'],
            ['id_pais' => 2, 'nombre' => 'Usulután'],

            // Honduras
            ['id_pais' => 3, 'nombre' => 'Atlántida'],
            ['id_pais' => 3, 'nombre' => 'Choluteca'],
            ['id_pais' => 3, 'nombre' => 'Colón'],
            ['id_pais' => 3, 'nombre' => 'Comayagua'],
            ['id_pais' => 3, 'nombre' => 'Cortés'],
            ['id_pais' => 3, 'nombre' => 'Francisco Morazán'],
            ['id_pais' => 3, 'nombre' => 'Islas de la Bahía'],
            ['id_pais' => 3, 'nombre' => 'La Paz'],
            ['id_pais' => 3, 'nombre' => 'Lempira'],
            ['id_pais' => 3, 'nombre' => 'Ocotepeque'],
            ['id_pais' => 3, 'nombre' => 'Santa Bárbara'],
            ['id_pais' => 3, 'nombre' => 'Valle'],
            ['id_pais' => 3, 'nombre' => 'Yoro'],

            // Nicaragua
            ['id_pais' => 4, 'nombre' => 'Boaco'],
            ['id_pais' => 4, 'nombre' => 'Carazo'],
            ['id_pais' => 4, 'nombre' => 'Chinandega'],
            ['id_pais' => 4, 'nombre' => 'Estelí'],
            ['id_pais' => 4, 'nombre' => 'Granada'],
            ['id_pais' => 4, 'nombre' => 'Jinotega'],
            ['id_pais' => 4, 'nombre' => 'León'],
            ['id_pais' => 4, 'nombre' => 'Masaya'],
            ['id_pais' => 4, 'nombre' => 'Matagalpa'],
            ['id_pais' => 4, 'nombre' => 'Nueva Segovia'],
            ['id_pais' => 4, 'nombre' => 'Rivas'],
            ['id_pais' => 4, 'nombre' => 'Managua'],

            // Costa Rica
            ['id_pais' => 5, 'nombre' => 'Alajuela'],
            ['id_pais' => 5, 'nombre' => 'Cartago'],
            ['id_pais' => 5, 'nombre' => 'Guanacaste'],
            ['id_pais' => 5, 'nombre' => 'Heredia'],
            ['id_pais' => 5, 'nombre' => 'Puntarenas'],
            ['id_pais' => 5, 'nombre' => 'San José'],

            // Panamá
            ['id_pais' => 6, 'nombre' => 'Bocas del Toro'],
            ['id_pais' => 6, 'nombre' => 'Chiriquí'],
            ['id_pais' => 6, 'nombre' => 'Coclé'],
            ['id_pais' => 6, 'nombre' => 'Colón'],
            ['id_pais' => 6, 'nombre' => 'Darién'],
            ['id_pais' => 6, 'nombre' => 'Herrera'],
            ['id_pais' => 6, 'nombre' => 'Los Santos'],
            ['id_pais' => 6, 'nombre' => 'Panamá'],
            ['id_pais' => 6, 'nombre' => 'Veraguas'],

            // México
            ['id_pais' => 7, 'nombre' => 'Aguascalientes'],
            ['id_pais' => 7, 'nombre' => 'Baja California'],
            ['id_pais' => 7, 'nombre' => 'Baja California Sur'],
            ['id_pais' => 7, 'nombre' => 'Campeche'],
            ['id_pais' => 7, 'nombre' => 'Chiapas'],
            ['id_pais' => 7, 'nombre' => 'Chihuahua'],
            ['id_pais' => 7, 'nombre' => 'Coahuila'],
            ['id_pais' => 7, 'nombre' => 'Colima'],
            ['id_pais' => 7, 'nombre' => 'Durango'],
            ['id_pais' => 7, 'nombre' => 'Guanajuato'],
            ['id_pais' => 7, 'nombre' => 'Guerrero'],
            ['id_pais' => 7, 'nombre' => 'Hidalgo'],
            ['id_pais' => 7, 'nombre' => 'Jalisco'],
            ['id_pais' => 7, 'nombre' => 'Estado de México'],
            ['id_pais' => 7, 'nombre' => 'Michoacán'],
            ['id_pais' => 7, 'nombre' => 'Morelos'],
            ['id_pais' => 7, 'nombre' => 'Nayarit'],
            ['id_pais' => 7, 'nombre' => 'Nuevo León'],
            ['id_pais' => 7, 'nombre' => 'Oaxaca'],
            ['id_pais' => 7, 'nombre' => 'Puebla'],
            ['id_pais' => 7, 'nombre' => 'Querétaro'],
            ['id_pais' => 7, 'nombre' => 'Quintana Roo'],
            ['id_pais' => 7, 'nombre' => 'San Luis Potosí'],
            ['id_pais' => 7, 'nombre' => 'Sinaloa'],
            ['id_pais' => 7, 'nombre' => 'Sonora'],
            ['id_pais' => 7, 'nombre' => 'Tabasco'],
            ['id_pais' => 7, 'nombre' => 'Tamaulipas'],
            ['id_pais' => 7, 'nombre' => 'Tlaxcala'],
            ['id_pais' => 7, 'nombre' => 'Veracruz'],
            ['id_pais' => 7, 'nombre' => 'Yucatán'],
            ['id_pais' => 7, 'nombre' => 'Zacatecas'],

            // Estados Unidos
            ['id_pais' => 8, 'nombre' => 'Alabama'],
            ['id_pais' => 8, 'nombre' => 'Alaska'],
            ['id_pais' => 8, 'nombre' => 'Arizona'],
            ['id_pais' => 8, 'nombre' => 'Arkansas'],
            ['id_pais' => 8, 'nombre' => 'California'],
            ['id_pais' => 8, 'nombre' => 'Colorado'],
            ['id_pais' => 8, 'nombre' => 'Connecticut'],
            ['id_pais' => 8, 'nombre' => 'Delaware'],
            ['id_pais' => 8, 'nombre' => 'Florida'],
            ['id_pais' => 8, 'nombre' => 'Georgia'],
            ['id_pais' => 8, 'nombre' => 'Hawái'],
            ['id_pais' => 8, 'nombre' => 'Idaho'],
            ['id_pais' => 8, 'nombre' => 'Illinois'],
            ['id_pais' => 8, 'nombre' => 'Indiana'],
            ['id_pais' => 8, 'nombre' => 'Iowa'],
            ['id_pais' => 8, 'nombre' => 'Kansas'],
            ['id_pais' => 8, 'nombre' => 'Kentucky'],
            ['id_pais' => 8, 'nombre' => 'Luisiana'],
            ['id_pais' => 8, 'nombre' => 'Maine'],
            ['id_pais' => 8, 'nombre' => 'Maryland'],
            ['id_pais' => 8, 'nombre' => 'Massachusetts'],
            ['id_pais' => 8, 'nombre' => 'Michigan'],
            ['id_pais' => 8, 'nombre' => 'Minnesota'],
            ['id_pais' => 8, 'nombre' => 'Misisipi'],
            ['id_pais' => 8, 'nombre' => 'Misuri'],
            ['id_pais' => 8, 'nombre' => 'Montana'],
            ['id_pais' => 8, 'nombre' => 'Nebraska'],
            ['id_pais' => 8, 'nombre' => 'Nevada'],
            ['id_pais' => 8, 'nombre' => 'Nueva Hampshire'],
            ['id_pais' => 8, 'nombre' => 'Nueva Jersey'],
            ['id_pais' => 8, 'nombre' => 'Nueva York'],
            ['id_pais' => 8, 'nombre' => 'Carolina del Norte'],
            ['id_pais' => 8, 'nombre' => 'Dakota del Norte'],
            ['id_pais' => 8, 'nombre' => 'Ohio'],
            ['id_pais' => 8, 'nombre' => 'Oklahoma'],
            ['id_pais' => 8, 'nombre' => 'Oregón'],
            ['id_pais' => 8, 'nombre' => 'Pensilvania'],
            ['id_pais' => 8, 'nombre' => 'Rhode Island'],
            ['id_pais' => 8, 'nombre' => 'Carolina del Sur'],
            ['id_pais' => 8, 'nombre' => 'Dakota del Sur'],
            ['id_pais' => 8, 'nombre' => 'Tennessee'],
            ['id_pais' => 8, 'nombre' => 'Texas'],
            ['id_pais' => 8, 'nombre' => 'Utah'],
            ['id_pais' => 8, 'nombre' => 'Vermont'],
            ['id_pais' => 8, 'nombre' => 'Virginia'],
            ['id_pais' => 8, 'nombre' => 'Washington'],
            ['id_pais' => 8, 'nombre' => 'Virginia Occidental'],
            ['id_pais' => 8, 'nombre' => 'Wisconsin'],
            ['id_pais' => 8, 'nombre' => 'Wyoming'],

            // España (Comunidades Autónomas)
            ['id_pais' => 8, 'nombre' => 'Andalucía'],
            ['id_pais' => 8, 'nombre' => 'Aragón'],
            ['id_pais' => 8, 'nombre' => 'Asturias'],
            ['id_pais' => 8, 'nombre' => 'Islas Baleares'],
            ['id_pais' => 8, 'nombre' => 'Canarias'],
            ['id_pais' => 8, 'nombre' => 'Castilla-La Mancha'],
            ['id_pais' => 8, 'nombre' => 'Castilla y León'],
            ['id_pais' => 8, 'nombre' => 'Cataluña'],
            ['id_pais' => 8, 'nombre' => 'Extremadura'],
            ['id_pais' => 8, 'nombre' => 'Galicia'],
            ['id_pais' => 8, 'nombre' => 'Madrid'],
            ['id_pais' => 8, 'nombre' => 'Murcia'],
            ['id_pais' => 8, 'nombre' => 'Navarra'],
            ['id_pais' => 8, 'nombre' => 'La Rioja'],
            ['id_pais' => 8, 'nombre' => 'País Vasco'],
            ['id_pais' => 8, 'nombre' => 'Ceuta'],
            ['id_pais' => 8, 'nombre' => 'Melilla'],

            // Francia (Regiones)
            ['id_pais' => 9, 'nombre' => 'Auvernia-Ródano-Alpes'],
            ['id_pais' => 9, 'nombre' => 'Borgoña-Franco Condado'],
            ['id_pais' => 9, 'nombre' => 'Bretaña'],
            ['id_pais' => 9, 'nombre' => 'Córcega'],
            ['id_pais' => 9, 'nombre' => 'Grand Este'],
            ['id_pais' => 9, 'nombre' => 'Île-de-France'],
            ['id_pais' => 9, 'nombre' => 'Normandía'],
            ['id_pais' => 9, 'nombre' => 'Nouvelle-Aquitaine'],
            ['id_pais' => 9, 'nombre' => 'Occitania'],
            ['id_pais' => 9, 'nombre' => 'Pays de la Loire'],
            ['id_pais' => 9, 'nombre' => 'Provenza-Alpes-Costa Azul'],
            ['id_pais' => 9, 'nombre' => 'Valle del Loira'],

            // Colombia (Departamentos)
            ['id_pais' => 10, 'nombre' => 'Amazonas'],
            ['id_pais' => 10, 'nombre' => 'Antioquia'],
            ['id_pais' => 10, 'nombre' => 'Atlántico'],
            ['id_pais' => 10, 'nombre' => 'Bolívar'],
            ['id_pais' => 10, 'nombre' => 'Boyacá'],
            ['id_pais' => 10, 'nombre' => 'Caldas'],
            ['id_pais' => 10, 'nombre' => 'Caquetá'],
            ['id_pais' => 10, 'nombre' => 'Casanare'],
            ['id_pais' => 10, 'nombre' => 'Cauca'],
            ['id_pais' => 10, 'nombre' => 'Cesar'],
            ['id_pais' => 10, 'nombre' => 'Chocó'],
            ['id_pais' => 10, 'nombre' => 'Córdoba'],
            ['id_pais' => 10, 'nombre' => 'Cundinamarca'],
            ['id_pais' => 10, 'nombre' => 'Guainía'],
            ['id_pais' => 10, 'nombre' => 'Guaviare'],
            ['id_pais' => 10, 'nombre' => 'Huila'],
            ['id_pais' => 10, 'nombre' => 'La Guajira'],
            ['id_pais' => 10, 'nombre' => 'Magdalena'],
            ['id_pais' => 10, 'nombre' => 'Meta'],
            ['id_pais' => 10, 'nombre' => 'Nariño'],
            ['id_pais' => 10, 'nombre' => 'Norte de Santander'],
            ['id_pais' => 10, 'nombre' => 'Putumayo'],
            ['id_pais' => 10, 'nombre' => 'Quindío'],
            ['id_pais' => 10, 'nombre' => 'Risaralda'],
            ['id_pais' => 10, 'nombre' => 'San Andrés y Providencia'],
            ['id_pais' => 10, 'nombre' => 'Santander'],
            ['id_pais' => 10, 'nombre' => 'Sucre'],
            ['id_pais' => 10, 'nombre' => 'Tolima'],
            ['id_pais' => 10, 'nombre' => 'Valle del Cauca'],
            ['id_pais' => 10, 'nombre' => 'Vaupés'],
            ['id_pais' => 10, 'nombre' => 'Vichada'],

            // Venezuela (Estados)
            ['id_pais' => 11, 'nombre' => 'Amazonas'],
            ['id_pais' => 11, 'nombre' => 'Anzoátegui'],
            ['id_pais' => 11, 'nombre' => 'Apure'],
            ['id_pais' => 11, 'nombre' => 'Aragua'],
            ['id_pais' => 11, 'nombre' => 'Barinas'],
            ['id_pais' => 11, 'nombre' => 'Bolívar'],
            ['id_pais' => 11, 'nombre' => 'Carabobo'],
            ['id_pais' => 11, 'nombre' => 'Cojedes'],
            ['id_pais' => 11, 'nombre' => 'Delta Amacuro'],
            ['id_pais' => 11, 'nombre' => 'Falcón'],
            ['id_pais' => 11, 'nombre' => 'Guárico'],
            ['id_pais' => 11, 'nombre' => 'Lara'],
            ['id_pais' => 11, 'nombre' => 'Mérida'],
            ['id_pais' => 11, 'nombre' => 'Miranda'],
            ['id_pais' => 11, 'nombre' => 'Monagas'],
            ['id_pais' => 11, 'nombre' => 'Nueva Esparta'],
            ['id_pais' => 11, 'nombre' => 'Portuguesa'],
            ['id_pais' => 11, 'nombre' => 'Sucre'],
            ['id_pais' => 11, 'nombre' => 'Táchira'],
            ['id_pais' => 11, 'nombre' => 'Trujillo'],
            ['id_pais' => 11, 'nombre' => 'Yaracuy'],
            ['id_pais' => 11, 'nombre' => 'Zulia'],

            // Argentina (Provincias)
            ['id_pais' => 12, 'nombre' => 'Buenos Aires'],
            ['id_pais' => 12, 'nombre' => 'Catamarca'],
            ['id_pais' => 12, 'nombre' => 'Chaco'],
            ['id_pais' => 12, 'nombre' => 'Chubut'],
            ['id_pais' => 12, 'nombre' => 'Córdoba'],
            ['id_pais' => 12, 'nombre' => 'Corrientes'],
            ['id_pais' => 12, 'nombre' => 'Entre Ríos'],
            ['id_pais' => 12, 'nombre' => 'Formosa'],
            ['id_pais' => 12, 'nombre' => 'Jujuy'],
            ['id_pais' => 12, 'nombre' => 'La Pampa'],
            ['id_pais' => 12, 'nombre' => 'La Rioja'],
            ['id_pais' => 12, 'nombre' => 'Mendoza'],
            ['id_pais' => 12, 'nombre' => 'Misiones'],
            ['id_pais' => 12, 'nombre' => 'Neuquén'],
            ['id_pais' => 12, 'nombre' => 'Río Negro'],
            ['id_pais' => 12, 'nombre' => 'Salta'],
            ['id_pais' => 12, 'nombre' => 'San Juan'],
            ['id_pais' => 12, 'nombre' => 'San Luis'],
            ['id_pais' => 12, 'nombre' => 'Santa Cruz'],
            ['id_pais' => 12, 'nombre' => 'Santa Fe'],
            ['id_pais' => 12, 'nombre' => 'Santiago del Estero'],
            ['id_pais' => 12, 'nombre' => 'Tierra del Fuego'],
            ['id_pais' => 12, 'nombre' => 'Tucumán'],

            // Chile (Regiones)
            ['id_pais' => 13, 'nombre' => 'Arica y Parinacota'],
            ['id_pais' => 13, 'nombre' => 'Tarapacá'],
            ['id_pais' => 13, 'nombre' => 'Antofagasta'],
            ['id_pais' => 13, 'nombre' => 'Atacama'],
            ['id_pais' => 13, 'nombre' => 'Coquimbo'],
            ['id_pais' => 13, 'nombre' => 'Valparaíso'],
            ['id_pais' => 13, 'nombre' => 'Metropolitana de Santiago'],
            ['id_pais' => 13, 'nombre' => 'Libertador General Bernardo O’Higgins'],
            ['id_pais' => 13, 'nombre' => 'Maule'],
            ['id_pais' => 13, 'nombre' => 'Ñuble'],
            ['id_pais' => 13, 'nombre' => 'Biobío'],
            ['id_pais' => 13, 'nombre' => 'La Araucanía'],
            ['id_pais' => 13, 'nombre' => 'Los Ríos'],
            ['id_pais' => 13, 'nombre' => 'Los Lagos'],
            ['id_pais' => 13, 'nombre' => 'Aysén del General Carlos Ibáñez del Campo'],
            ['id_pais' => 13, 'nombre' => 'Magallanes y de la Antártica Chilena'],

            // Canadá (Provincias y Territorios)
            ['id_pais' => 14, 'nombre' => 'Alberta'],
            ['id_pais' => 14, 'nombre' => 'Columbia Británica'],
            ['id_pais' => 14, 'nombre' => 'Manitoba'],
            ['id_pais' => 14, 'nombre' => 'New Brunswick'],
            ['id_pais' => 14, 'nombre' => 'Nueva Escocia'],
            ['id_pais' => 14, 'nombre' => 'Terranova y Labrador'],
            ['id_pais' => 14, 'nombre' => 'Ontario'],
            ['id_pais' => 14, 'nombre' => 'Isla del Príncipe Eduardo'],
            ['id_pais' => 14, 'nombre' => 'Quebec'],
            ['id_pais' => 14, 'nombre' => 'Saskatchewan'],
            ['id_pais' => 14, 'nombre' => 'Territorios del Noroeste'],
            ['id_pais' => 14, 'nombre' => 'Yukón'],
            ['id_pais' => 14, 'nombre' => 'Nunavut'],
        ];


        DB::table('estados')->insert($estados);
    }
}
