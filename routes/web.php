<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiciosApiController; // Importar el nuevo controlador
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\PreguntaController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/active/{user}', [UserController::class, 'active'])->name('users.active');
    // asignaciones
    Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');
    Route::get('/asignaciones/create', [AsignacionController::class, 'create'])->name('asignaciones.create');
    Route::post('/asignaciones', [AsignacionController::class, 'store'])->name('asignaciones.store');
    Route::delete('/asignaciones/{item}', [AsignacionController::class, 'destroy'])->name('asignaciones.destroy');
    // preguntas
    Route::get('/preguntas', [PreguntaController::class, 'index'])->name('preguntas.index');
    Route::get('/preguntas/create', [PreguntaController::class, 'create'])->name('preguntas.create');
    Route::post('/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
    Route::delete('/preguntas/{item}', [PreguntaController::class, 'destroy'])->name('preguntas.destroy');



    /**  api **/
    Route::get('/api/estados/{pais}', [ServiciosApiController::class, 'pais'])->name('api.pais');
    Route::get('/api/ciudades/{estado}', [ServiciosApiController::class, 'estado'])->name('api.estado');
});

require __DIR__ . '/auth.php';
