<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Juego;

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
        $juego->imagen = $request->file('imagen');
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

    public function addComment(Request $request, $id){
        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        $juego = Juego::findOrFail($id);

        $juego->comentario = $request->input('comentario');
        $juego->save();

        return redirect()->back()->with('success', 'Comentario añadido correctamente.');
    }

}
