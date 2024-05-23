<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/bienvenida', [UsuarioController::class, 'index']);
Route::get('/bienvenida/registrarse',[UsuarioController::class, 'registro']);
Route::post('/bienvenida/registrarUsuario',[UsuarioController::class, 'registrarUsuario']);
Route::get('/bienvenida/entrar',[UsuarioController::class,'entrar']);
Route::post('/bienvenida/entrarUsuario',[UsuarioController::class,'entrarUsuario']);
