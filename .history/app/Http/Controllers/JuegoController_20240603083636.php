<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Juego;
use App\Models\Comentario;
use App\Models\Usuario;

class JuegoController extends Controller
{
    public function guardarJuego(Request $request)
    {
         // Validar los datos recibidos del formulario

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = $request->file('imagen')->store('images','public');

        // Crear un nuevo juego en la base de datos
        $juego = new Juego();
        $juego->nombre = $request->input('nombre');
        $juego->imagen = $imagenPath;
        $juego->descripcion = $request->input('descripcion');// Guardar la ruta de la imagen en la base de datos
        $juego->save();

        // Devolver una respuesta (puedes ajustar según tus necesidades)
        $juegos = Juego::all();
        return view("usuarios.juegosAdmin", ['juegos' => $juegos]);
    }

    public function mostrarJuegos(){
        $juegos = Juego::all();

        return view("juegosAdmin",compact('juegos'));
    }

    public function addComment(Request $request, $juego_id, $usuario_id)
    {
        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        Comentario::create([
            'texto' => $request->input('comentario'),
            'user_id' => $usuario_id,
            'juego_id' => $juego_id,
        ]);

        return back()->with('success', 'Comentario añadido correctamente');
    }

    public function deleteJuego($id)
    {
        $juego = Juego::find($id);
        if ($juego) {
            $juego->delete();
            return view("usuarios.juegosAdmin", ['juegos' => $juegos]);
        }
        return back()->withErrors(['error' => 'Juego no encontrado']);
    }

    public function deleteComment($id)
    {
        $comentario = Comentario::find($id);
        if ($comentario) {
            $comentario->delete();
            return view("usuarios.juegosAdmin", ['juegos' => $juegos]);
        }
        return back()->withErrors(['error' => 'Comentario no encontrado']);
    }
    public function addToFavorites(Request $request, $juego_id)
    {
        $user_id = $request->input('user_id');
        $usuario = Usuario::find($user_id);

        if ($usuario) {
            // Decodifica el campo 'favoritos' de JSON a array
            $favoritos = json_decode($usuario->favoritos, true) ?: [];

            if (!in_array($juego_id, $favoritos)) {
                $favoritos[] = $juego_id;

                // Codifica el array de nuevo a JSON
                $usuario->favoritos = json_encode($favoritos);
                $usuario->save();
                return back()->with('success', 'Juego añadido a favoritos');
            }

            return back()->with('info', 'El juego ya está en tus favoritos');
        }

        return back()->withErrors(['error' => 'Usuario no encontrado']);
    }



}
