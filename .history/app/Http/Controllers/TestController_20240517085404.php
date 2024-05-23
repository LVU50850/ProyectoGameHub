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

    public function agregarJuegos($id, $juegos){
        $usuario = Usuario::find($id);


    }

    public function subirJuegos(Request $request){
        let recommendedGames = "";

        if (answerCounts.respuesta1 > answerCounts.respuesta2) {
            recommendedGames = "Detroit Become Human, Heavy Rain y Beyond: Two Souls";
        } else if (answerCounts.respuesta2 > answerCounts.respuesta3) {
            recommendedGames = "Uncharted 4, Tomb Raider y God Of War";
        } else if (answerCounts.respuesta3 > answerCounts.respuesta4) {
            recommendedGames = "GTA 5, Red Dead Redemption 2 y Mafia 2";
        } else {
            recommendedGames = "Counter Strike, Valorant, Fortnite";
        }

    }
}
