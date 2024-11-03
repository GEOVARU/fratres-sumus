<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsignacionesPreguntas;
use App\Models\Preguntas;
use App\Models\TipoAsignaciones;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class AsignaPreguntasController extends Controller
{
    public function index()
    {
        $registros = AsignacionesPreguntas::with(['tipoAsignacion', 'pregunta'])->orderBy('estado', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        return Inertia::render('AsignaPreguntas/index', [
            'registros' => $registros,
        ]);
    }

    public function create()
    {
        $TipoAsignaciones = TipoAsignaciones::where('estado', 1)->get();
        $Preguntas = Preguntas::where('estado', 1)->get();


        return Inertia::render('AsignaPreguntas/create', [
            'TipoAsignaciones' => $TipoAsignaciones,
            'Preguntas' => $Preguntas,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_tipo_asignacion' => 'required',
            'id_pregunta' => 'required',
        ]);
        try {
            DB::beginTransaction();

            AsignacionesPreguntas::create([
                'id_tipo_asignacion' => $data['id_tipo_asignacion'],
                'id_pregunta' => $data['id_pregunta'],
                'usuario_registro' => Auth::user()?->usuario,
                'usuario_actualiza' => Auth::user()?->usuario,
                'estado' => 1,
            ]);

            DB::commit();

            return redirect()->route('asignaPreguntasTipo.index')->with('success', 'Registro creado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('asignaPreguntasTipo.index')
                ->with('error', 'Ocurrió un error al crear el registro. Inténtalo de nuevo.');
        }
    }



    public function edit($id)
    {
        $dataInfo = AsignacionesPreguntas::findOrFail($id);
        $TipoAsignaciones = TipoAsignaciones::where('estado', 1)->get();
        $Preguntas = Preguntas::where('estado', 1)->get();

        return Inertia::render('AsignaPreguntas/edit', [
            'dataInfo' => $dataInfo,
            'TipoAsignaciones' => $TipoAsignaciones,
            'Preguntas' => $Preguntas,
        ]);
    }


    public function update(Request $request, $id)
    {

        $preguntas = AsignacionesPreguntas::findOrFail($id);

        $data = $request->validate([
            'id_tipo_asignacion' => 'required',
            'id_pregunta' => 'required',
        ]);
        $data['usuario_actualiza'] = Auth::user()->usuario;

        $preguntas->update($data);

        return redirect()->route('asignaPreguntasTipo.index')
            ->with('success', 'Registro actualizado exitosamente');
    }

    public function destroy(AsignacionesPreguntas $item)
    {
        $item->estado = 0;
        $item->save();

        return response()->json([
            'message' => 'Registro desactivado correctamente.',
        ], 200);
    }

    public function active(AsignacionesPreguntas $item)
    {
        $item->estado = 1;
        $item->save();

        return response()->json([
            'message' => 'Registro activado correctamente.',
        ], 200);
    }
}
