<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Juego;

class TestController extends Controller
{
    public function realizarTest($id){

        $usuario= Usuario::find($id);
        if($usuario->recomendados == null){
            return response()->view("usuarios.test",['usuario' => $usuario]);
        }
        $usuario->juegos = "Error, ya realizaste el test";
        return response()->view("usuarios.indexTest",["usuario"=>$usuario]);
    }

    public function accederIndex($id){
        $usuario= Usuario::find($id);
        return response()->view("usuarios.indexTest", ['usuario'=>$usuario]);
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

            return response()->view('usuarios.juegosRecomendados', ['id' => $usuario->id]);

        }

    }
    public function mostrarRecomendados($id)
{
    $usuario = Usuario::find($id);

    if ($usuario) {
        $juegosRecomendadosIds = json_decode($usuario->recomendados, true);
        $juegosRecomendados = Juego::whereIn('id', $juegosRecomendadosIds)->get();

        return view('usuarios.juegosRecomendados', ['usuario' => $usuario, 'juegos' => $juegosRecomendados]);
    }

    return redirect()->route('index')->with('error', 'Usuario no encontrado');
}
}
