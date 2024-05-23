<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\JuegoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/bienvenida', [UsuarioController::class, 'index']);
Route::get('/bienvenida/registrarse',[UsuarioController::class, 'registro']);
Route::post('/bienvenida/registrarUsuario',[UsuarioController::class, 'registrarUsuario']);
Route::get('/bienvenida/entrar',[UsuarioController::class,'entrar']);
Route::post('/bienvenida/entrarUsuario',[UsuarioController::class,'entrarUsuario']);
Route::get('/test',[TestController::class,'realizarTest']);
Route::get('/bienvenida/juegos/{id}', [UsuarioController::class,'entrarJuegos']);
Route::get('/bienvenida/juegosAdmin', [UsuarioController::class, 'entrarJuegosAdmin']);
Route::post('/bienvenida/juegosAdminJuego', [JuegoController::class, 'guardarJuego']);
