<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Preguntas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Preguntas::orderBy('estado', 'desc')
        ->orderBy('id', 'asc')
        ->get();

        return Inertia::render('Preguntas/index', [
            'preguntas' => $preguntas,
        ]);
    }

    public function create()
    {
        return Inertia::render('Preguntas/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pregunta' => 'required',
        ]);
        try {
            DB::beginTransaction();

            Preguntas::create([
                'pregunta' => $data['pregunta'],
                'usuario_registro' => Auth::user()?->usuario,
                'usuario_actualiza' => Auth::user()?->usuario,
                'estado' => 1,
            ]);

            DB::commit();

            return redirect()->route('preguntas.index')->with('success', 'pregunta creada correctamente');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('preguntas.index')
                ->with('error', 'Ocurrió un error al crear la pregunta. Inténtalo de nuevo.');
        }
    }

    public function edit($id)
    {
        $dataInfo = Preguntas::findOrFail($id);

        return Inertia::render('Preguntas/edit', [
            'dataInfo' => $dataInfo,
        ]);
    }

    public function update(Request $request, $id)
    {

        $preguntas = Preguntas::findOrFail($id);

        $data = $request->validate([
            'pregunta' => 'required',
        ]);

        $preguntas->update($data);

        return redirect()->route('preguntas.index')
            ->with('success', 'Registro actualizado exitosamente');
    }

    public function destroy(Preguntas $item)
    {
        $item->estado = 0;
        $item->save();

        return response()->json([
            'message' => 'Registro desactivado correctamente.',
        ], 200);
    }
    public function active(Preguntas $item)
    {
        $item->estado = 1;
        $item->save();

        return response()->json([
            'message' => 'Registro activado correctamente.',
        ], 200);
    }
}
