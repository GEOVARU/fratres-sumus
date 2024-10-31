<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Preguntas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PreguntaController extends Controller
{
    public function index()
    {

        $preguntas = Preguntas::all();

        return Inertia::render('Preguntas/index', [
            'preguntas' => $preguntas,
        ]);
    }

    public function create()
    {
        return Inertia::render('Preguntas/create');
    }
}
