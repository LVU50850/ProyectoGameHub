<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Juego;

class TestController extends Controller
{
    public function realizarTest($id){
        $usuario= Usuario::find($id);

        return response()->view("usuarios.test",['usuario' => $usuario]);
    }

    public function submitTest(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if ($usuario) {
            $mostSelected = $request->input('mostSelected');
            $juegos = [];

            switch ($mostSelected) {
                case 1:
                    $juegos = [1, 2, 3];
                    break;
                case 2:
                    $juegos = [4, 5, 6];
                    break;
                case 3:
                    $juegos = [7, 8, 9];
                    break;
                case 4:
                    $juegos = [10, 11, 12];
                    break;
            }

            $usuario->recomendados = json_encode($juegos);
            $usuario->save();

            return response()->json(['success' => true]);
            $usuario= Usuario::find($id);

        $juegos = Juego::all();



        return response()->view('usuarios.juegos',['usuario' => $usuario, 'juegos' => $juegos]);
        }

        return response()->json(['success' => false], 400);
    }
}
