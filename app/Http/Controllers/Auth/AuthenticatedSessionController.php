<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los campos de entrada
        $request->validate([
            'correo_electronico' => 'required_without:usuario|email',
            'usuario' => 'required_without:correo_electronico|string',
            'password' => 'required|string',
        ]);

        // Determinar el campo de autenticación (correo o usuario)
        $field = filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL) ? 'correo_electronico' : 'usuario';

        // Intentar autenticar al usuario
        if (Auth::attempt([$field => $request->input($field), 'password' => $request->password])) {
            // Regenerar la sesión
            $request->session()->regenerate();

            // Redirigir a la ruta deseada después de iniciar sesión
            return redirect()->intended(route('dashboard', absolute: false)); // Cambia 'dashboard' por la ruta que deseas
        }

        // Si las credenciales no coinciden, devolver un error
        return back()->withErrors([
            'correo_electronico' => 'Las credenciales no coinciden.',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
