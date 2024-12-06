<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContactoController;

Route::get('/', [UsuarioController::class, 'index'])->name('inicio');
Route::get('/informacion', [UsuarioController::class, 'informacion'])->name('informacion');
Route::get('/habitaciones', [UsuarioController::class, 'habitaciones'])->name('habitaciones');
Route::get('/ofertas', [UsuarioController::class, 'ofertas'])->name('ofertas');
Route::get('/reservar', [UsuarioController::class, 'reservar'])->name('reservar');
Route::get('/contacto', [UsuarioController::class, 'contacto'])->name('contacto');
Route::post('/contacto/guardar', [ContactoController::class, 'guardar'])->name('contacto.guardar');
Route::post('/reservar/guardar', [ReservaController::class, 'guardar'])->name('reserva.guardar'); // Nueva ruta


Route::middleware('auth')->group(function () {
    // Ruta principal para ver todas las reservas
    Route::get('admin/reservas', [AdminController::class, 'index'])->name('admin.reservas.index');
    
    // Ruta para cambiar el estado de una reserva (aceptar/rechazar)
    Route::post('admin/reservas/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.reservas.updateStatus');
    
    // Ruta para eliminar una reserva
    Route::delete('admin/reservas/{id}', [AdminController::class, 'destroy'])->name('admin.reservas.destroy');
});
