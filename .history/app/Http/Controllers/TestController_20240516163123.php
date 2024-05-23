<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class TestController extends Controller
{


    public function realizarTest($id){
        $usuario= Usuario::find($id);

        return response()->view("usuarios.test",['usuario' => $usuario]);
    }
}
