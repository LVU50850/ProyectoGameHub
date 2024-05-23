<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function processTest(Request $request)
    {
        // Aquí procesa las respuestas del test y determina el paquete de juegos recomendado
        $recommendedPackage = 'Pack 1: Detroit Become Human, Heavy Rain y Beyond: Two Souls';
        // Puedes cambiar esto según la lógica implementada

        // Redirigir al usuario a la vista de recomendación con la variable $recommendedPackage
        return view('recommendation', ['recommendedPackage' => $recommendedPackage]);
    }

    public function realizarTest(){

    }
}
