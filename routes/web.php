<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AglomeracionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotoController;

// Vista principal
Route::get('/', fn () => view('welcome'));
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Puntos (públicos)
Route::get('/punto1', fn () => view('punto1'));
Route::get('/punto2', fn () => view('punto2'));
Route::get('/punto3', fn () => view('punto3'));
Route::get('/punto4', fn () => view('punto4'));
Route::get('/punto5', fn () => view('punto5'));
Route::get('/punto6', fn () => view('punto6'));

// Ruta para refrescar el nivel actual usando AJAX (pública)
Route::get('/nivel-actual/{punto}', function ($punto) {
    $nivel = AglomeracionController::obtenerNivelActual($punto);
    return response()->json(['nivel' => $nivel ?? 'Sin datos']);
});

// Protegidas: Solo usuarios logueados pueden votar o comentar
Route::middleware('auth')->group(function () {
    Route::post('/votar', [VotoController::class, 'guardarVoto'])->name('votar');
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});