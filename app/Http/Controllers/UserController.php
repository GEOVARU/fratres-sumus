<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    // Muestra la lista de usuarios activos
    public function index()
    {
        $users = User::with('TypeUser')
            ->orderBy('condicion', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        return Inertia::render('User/index', [
            'users' => $users, // Asegúrate que la relación 'tipoUsuario' está cargada
        ]);
    }


    public function create()
    {
        // Obtener todos los tipos de usuario
        $tiposUsuarios = TipoUsuario::all();
        $pais = Pais::all();

        return Inertia::render('User/create', [
            'tiposUsuarios' => $tiposUsuarios,
            'pais' => $pais
        ]);
    }

    // Almacena un nuevo usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'otros_nombres' => 'nullable|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'nullable|string|max:100',
            'tipo_documento_identificacion' => 'required|integer',
            'identificacion' => 'required|string|max:25|unique:users',
            'telefono_1' => 'required|string|max:20',
            'telefono_2' => 'nullable|string|max:20',
            'usuario' => 'required|string|max:25|unique:users',
            'correo_electronico' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8',
            'pais' => 'required|integer',
            'estado' => 'required|integer',
            'ciudad' => 'required|integer',
            'direccion' => 'required|string|max:100',
            'colegiado' => 'nullable|string|max:100',
            'tipo_usuario' => 'required|integer',
        ]);

        // Crear el nuevo usuario
        User::create([
            'primer_nombre' => $validatedData['primer_nombre'],
            'segundo_nombre' => $validatedData['segundo_nombre'],
            'otros_nombres' => $validatedData['otros_nombres'],
            'primer_apellido' => $validatedData['primer_apellido'],
            'segundo_apellido' => $validatedData['segundo_apellido'],
            'tipo_documento_identificacion' => $validatedData['tipo_documento_identificacion'],
            'identificacion' => $validatedData['identificacion'],
            'telefono_1' => $validatedData['telefono_1'],
            'telefono_2' => $validatedData['telefono_2'],
            'usuario' => $validatedData['usuario'],
            'correo_electronico' => $validatedData['correo_electronico'],
            'password' => bcrypt($validatedData['password']),
            'pais' => $validatedData['pais'],
            'estado' => $validatedData['estado'],
            'ciudad' => $validatedData['ciudad'],
            'direccion' => $validatedData['direccion'],
            'colegiado' => $validatedData['colegiado'],
            'tipo_usuario' => $validatedData['tipo_usuario'],
            'condicion' => 1,
            'usuario_registro' => Auth::user()?->usuario, // null-safe
            'usuario_actualiza' => Auth::user()?->usuario, // null-safe
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        return Inertia::render('User/edit', [
            'user' => $user, // Pasa el usuario a la vista de edición
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'otros_nombres' => 'nullable|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'nullable|string|max:100',
            'tipo_documento_identificacion' => 'required|integer',
            'identificacion' => 'required|string|max:25|unique:users,identificacion,' . $id,
            'telefono_1' => 'required|string|max:20',
            'telefono_2' => 'nullable|string|max:20',
            'usuario' => 'required|string|max:25|unique:users,usuario,' . $id,
            'correo_electronico' => 'required|email|max:150|unique:users,correo_electronico,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'pais' => 'required|integer',
            'estado' => 'required|integer',
            'ciudad' => 'required|integer',
            'direccion' => 'required|string|max:100',
            'colegiado' => 'nullable|string|max:100',
            'tipo_usuario' => 'required|integer',
        ]);

        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Actualizar los campos
        $user->primer_nombre = $validatedData['primer_nombre'];
        $user->segundo_nombre = $validatedData['segundo_nombre'];
        $user->otros_nombres = $validatedData['otros_nombres'];
        $user->primer_apellido = $validatedData['primer_apellido'];
        $user->segundo_apellido = $validatedData['segundo_apellido'];
        $user->tipo_documento_identificacion = $validatedData['tipo_documento_identificacion'];
        $user->identificacion = $validatedData['identificacion'];
        $user->telefono_1 = $validatedData['telefono_1'];
        $user->telefono_2 = $validatedData['telefono_2'];
        $user->usuario = $validatedData['usuario'];
        $user->correo_electronico = $validatedData['correo_electronico'];

        // Solo actualizar la contraseña si se ha proporcionado
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->pais = $validatedData['pais'];
        $user->estado = $validatedData['estado'];
        $user->ciudad = $validatedData['ciudad'];
        $user->direccion = $validatedData['direccion'];
        $user->colegiado = $validatedData['colegiado'];
        $user->tipo_usuario = $validatedData['tipo_usuario'];

        // Guardar los cambios
        $user->save();

        // Redirigir a una vista o devolver una respuesta
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }


    // Desactiva un usuario
    public function destroy(User $user)
    {
        $user->condicion = 0;
        $user->save();

        return response()->json([
            'message' => 'Usuario desactivado correctamente.',
        ], 200);
    }

    public function active(User $user)
    {
        $user->condicion = 1;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario activado correctamente.');
    }
}
