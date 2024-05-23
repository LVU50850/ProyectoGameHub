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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que la imagen sea válida
        ]);

        // Obtener la imagen del formulario
        $imagen = $request->file('imagen');

        // Guardar la imagen en la carpeta public/storage/images (o cualquier otra ruta deseada)
        $rutaImagen = $imagen->store('images', 'public');

        // Crear un nuevo juego en la base de datos
        $juego = new Juego();
        $juego->nombre = $request->input('nombre');
        $juego->imagen = $request->file('imagen'); // Guardar la ruta de la imagen en la base de datos
        $juego->save();

        // Devolver una respuesta (puedes ajustar según tus necesidades)
        return response()->json(['message' => 'Juego guardado correctamente'], 200);
        dd($request->all());
    }

}
