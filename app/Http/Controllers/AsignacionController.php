<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Asignaciones;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\DiaSemana;
use App\Models\TipoAsignaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = User::with('TypeUser')
            ->where('condicion', 1)
            ->where('tipo_usuario', '!=', 3)
            ->orderBy('primer_nombre', 'asc')
            ->get();

        $beneficiarias = User::with('TypeUser')
            ->where('condicion', 1)
            ->where('tipo_usuario', 3)
            ->orderBy('primer_nombre', 'asc')
            ->get();

        $diasSemana = DiaSemana::all();
        $tiposAsignaciones = TipoAsignaciones::all();

        return Inertia::render('Asignaciones/create', [
            'user' => $user,
            'beneficiarias' => $beneficiarias,
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
            'id_dia' => 'required|integer',
            'anio' => 'required|integer',
            'id_tipo_asignacion' => 'required|exists:tipo_asignaciones,id',
        ]);
        try {
            DB::beginTransaction();

            Asignaciones::create([
                'usuario_interesado' => $data['usuario_interesado'],
                'usuario_asignado' => $data['usuario_asignado'],
                'hora_inicio' => $data['hora_inicio'],
                'minuto_inicio' => $data['minuto_inicio'],
                'hora_fin' => $data['hora_fin'],
                'minuto_fin' => $data['minuto_fin'],
                'id_dia' => $data['id_dia'],
                'anio' => $data['anio'],
                'id_tipo_asignacion' => $data['id_tipo_asignacion'],
                'estado' => 1,
                'usuario_registro' => Auth::user()?->usuario, // null-safe
                'usuario_actualiza' => Auth::user()?->usuario, // null-safe
            ]);

            DB::commit();

            return redirect()->route('asignaciones.index')->with('success', 'Asignación creada correctamente');
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

    public function destroy(Asignaciones $item)
    {
        $item->estado = 0;
        $item->save();

        return response()->json([
            'message' => 'Asignación desactivada correctamente.',
        ], 200);
    }
}
