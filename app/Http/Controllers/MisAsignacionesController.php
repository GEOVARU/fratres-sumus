<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsignacionesPreguntas;
use App\Models\Preguntas;
use App\Models\TipoAsignaciones;
use App\Models\Asignaciones;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class MisAsignacionesController extends Controller
{
    public function index()
    {
        $asignaciones = Asignaciones::with(['interesado', 'asignado', 'diaSemana', 'tipoAsignacion'])
            ->where('usuario_asignado', Auth::user()?->usuario)
            ->orderBy('id', 'asc')
            ->get();

        return Inertia::render('MisAsignaciones/index', [
            'asignaciones' => $asignaciones,
        ]);
    }
}
