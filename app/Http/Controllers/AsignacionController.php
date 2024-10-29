<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Asignaciones;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\DiaSemana;
use App\Models\TipoAsignaciones;

class AsignacionController extends Controller
{
    // Método para mostrar todas las asignaciones
    public function index()
    {
        $asignaciones = Asignaciones::with(['interesado', 'asignado', 'diaSemana', 'tipoAsignacion'])
            ->orderBy('id', 'asc')
            ->get();

        return Inertia::render('Asignaciones/index', [
            'asignaciones' => $asignaciones,
        ]);
    }
    public function create()
    {
        $diasSemana = DiaSemana::all();
        $tiposAsignaciones = TipoAsignaciones::all();

        return Inertia::render('Asignaciones/create', [
            'diasSemana' => $diasSemana,
            'tiposAsignaciones' => $tiposAsignaciones,
        ]);
    }
    // Método para crear una nueva asignación
    public function store(Request $request)
    {
        $data = $request->validate([
            'usuario_interesado' => 'required|string|max:25',
            'usuario_asignado' => 'required|string|max:25',
            'hora_inicio' => 'required|integer',
            'minuto_inicio' => 'required|integer',
            'hora_fin' => 'required|integer',
            'minuto_fin' => 'required|integer',
            'id_dia' => 'required|exists:dia_semana,id',
            'anio' => 'required|integer',
            'id_tipo_asignacion' => 'required|exists:tipo_asignaciones,id',
            'usuario_registro' => 'required|string|max:50',
            'usuario_actualiza' => 'nullable|string|max:50',
        ]);

        // Establecer el estado por defecto a 1
        $data['estado'] = 1;

        try {
            DB::beginTransaction();
            $asignacion = Asignaciones::create($data);
            DB::commit();
            return redirect()->route('asignaciones.index')
                ->with('success', 'Asignación creada exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('asignaciones.index')
                ->with('error', 'Ocurrió un error al crear la asignación. Inténtalo de nuevo.');
        }
    }
    public function edit($id)
    {
        $asignacion = Asignaciones::with(['interesado', 'asignado', 'diaSemana', 'tipoAsignacion'])
            ->findOrFail($id);

        return Inertia::render('Asignaciones/show', [
            'asignacion' => $asignacion,
        ]);
    }
    // Método para actualizar una asignación
    public function update(Request $request, $id)
    {
        $asignacion = Asignaciones::findOrFail($id);

        $data = $request->validate([
            'usuario_interesado' => 'string|max:25',
            'usuario_asignado' => 'string|max:25',
            'hora_inicio' => 'integer',
            'minuto_inicio' => 'integer',
            'hora_fin' => 'integer',
            'minuto_fin' => 'integer',
            'id_dia' => 'exists:dia_semana,id',
            'anio' => 'integer',
            'estado' => 'integer',
            'id_tipo_asignacion' => 'exists:tipo_asignaciones,id',
            'usuario_actualiza' => 'string|max:50',
        ]);

        $asignacion->update($data);

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación actualizada exitosamente');
    }

    // Método para eliminar una asignación
    public function destroy($id)
    {
        $asignacion = Asignaciones::findOrFail($id);
        $asignacion->update(['estado' => 0]);

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación desactivada exitosamente');
    }
}
