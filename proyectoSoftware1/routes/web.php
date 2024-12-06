<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

// Redirigir la ruta de inicio ('/') al login si el usuario no está autenticado, o a la lista de reservas si lo está
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('reservas.index');
    }
    return view('auth.login'); // Asegúrate de que este archivo esté en la carpeta 'auth'
})->name('home');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de reservas, accesibles solo para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::resource('reservas', ReservaController::class);
});

Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');

