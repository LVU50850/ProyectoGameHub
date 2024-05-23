<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return view("usuarios.bienvenida");
    }

    public function registro(){
        return response()->view("usuarios.registrarse");
    }

    public function registrarUsuario(Request $request){
        $usuario = new Usuario([
            "nombre" => $request->nombre,
            "contrasenia" => $request->contrasenia,
            "email" => $request->email,
        ]);
        
        $usuario->save();
    
        return redirect('/bienvenida');
    }

    public function entrar(){
        return response()->view("usuarios.entrar");
    }

    public function entrarUsuario(Request $request){

         $usuario = Usuario::where("nombre", "=", $request->nombre)->where("contrasenia", "=", $request->contrasenia)->first();
         return response()->view("usuarios.index",["usuario"=>$usuario]);
    }

}
