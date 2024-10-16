<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\PuntoAccesoController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\HistorialVisitasController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\VisitasProgramadasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class);
Route::resource('roles', RolController::class);
Route::resource('residentes', ResidenteController::class);
Route::resource('visitantes', VisitanteController::class);
Route::resource('unidades', UnidadController::class);
Route::resource('puntos_acceso', PuntoAccesoController::class);
Route::resource('accesos', AccesoController::class);
Route::resource('historial_visitas', HistorialVisitasController::class);
Route::resource('dispositivos', DispositivoController::class);
Route::resource('visitas_programadas', VisitasProgramadasController::class);

require __DIR__.'/auth.php';
