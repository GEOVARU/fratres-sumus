<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Estado;
use Illuminate\Http\Request;

class ServiciosApiController extends Controller
{
    public function pais($paisId)
    {
        // Obtiene los estados asociados al país utilizando el ID
        $estados = Estado::where('id_pais', $paisId)->get();

        // Verifica si hay estados para el país
        if ($estados->isEmpty()) {
            return response()->json(['error' => 'No se encontraron estados para el país especificado'], 404);
        }

        return response()->json($estados);
    }

    public function estado($estadoId)
    {
        // Obtiene las ciudades asociadas al estado utilizando el ID
        $ciudades = Ciudad::where('id_estado', $estadoId)->get();

        // Verifica si hay ciudades para el estado
        if ($ciudades->isEmpty()) {
            return response()->json(['error' => 'No se encontraron ciudades para el estado especificado'], 404);
        }

        return response()->json($ciudades);
    }
}
