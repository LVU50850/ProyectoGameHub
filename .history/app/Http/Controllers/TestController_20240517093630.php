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

    public function subirJuegos(Request $request, $id){
         // Validar los datos recibidos
        $request->validate([
            'juegos' => 'required|string',
        ]);

        // Obtener el usuario por su ID
        $user = User::find($id);

        // Verificar si el usuario existe
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Asignar los juegos al campo 'juegos' del usuario
        $user->juegos = $request->input('juegos');

        // Guardar los cambios en la base de datos
        $user->save();


    }
}
