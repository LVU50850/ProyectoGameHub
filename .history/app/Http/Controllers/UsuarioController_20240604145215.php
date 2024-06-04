<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Juego;

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
        $rules = [
            'nombre' => 'required|string|unique:usuarios,nombre|max:255',
            'contrasenia' => 'required|string|min:5',
            'email' => 'required|string|email|unique:usuarios,email', // Verifica la unicidad del email en la tabla usuarios
        ];

        // Define mensajes personalizados para las reglas de validación
        $messages = [
            'nombre.required' => 'El nombre de usuario es obligatorio.',
            'nombre.string' => 'El nombre de usuario debe ser una cadena de texto.',
            'nombre.max' => 'El nombre de usuario no puede tener más de 255 caracteres.',
            'nombre.unique' => 'El nombre de usuario ya está registrado. Por favor, utiliza otro nombre',
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.string' => 'La contraseña debe ser una cadena de texto.',
            'contrasenia.min' => 'La contraseña debe tener al menos 5 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.string' => 'El email debe ser una cadena de texto.',
            'email.email' => 'Por favor ingresa un email válido.',
            'email.unique' => 'Este email ya está registrado. Por favor, utiliza otro email.',
        ];

        // Ejecuta la validación
        $validator = Validator::make($request->all(), $rules, $messages);

        // Verifica si la validación ha fallado
        if ($validator->fails()) {
            // Redirige de vuelta con los errores y los campos anteriores
            return redirect()->back()
                             ->withErrors($validator) // Enviar errores a la vista
                             ->withInput(); // Mantener los datos anteriores en el formulario
        }

        // Crear el nuevo usuario si la validación pasa
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'contrasenia' => ($request->contrasenia), // Asegúrate de encriptar la contraseña
            'email' => $request->email,
        ]);

        $usuario->save();


        return redirect()->route('bienvenida')->with('success', 'Usuario registrado con éxito');
    }

    public function entrar(){
        return response()->view("usuarios.entrar");
    }

    public function entrarUsuario(Request $request){
        $rules = [
            'nombre' => [
                'required',
                Rule::exists('usuarios')->where(function ($query) use ($request) {
                    $query->where('nombre', $request->nombre);
                }),
            ],
            'contrasenia' => [
                'required',
                Rule::exists('usuarios')->where(function ($query) use ($request) {
                    $query->where('contrasenia', $request->contrasenia);
                }),
            ],
            'email' => [
                'required',
                'email',
                Rule::exists('usuarios')->where(function ($query) use ($request) {
                    $query->where('email', $request->email);
                }),
            ],
        ];

        // Define mensajes personalizados para las reglas de validación
        $messages = [
            'nombre.required' => 'El nombre de usuario es obligatorio.',
            'nombre.exists' => 'El nombre no es correcto',
            'email.exists' => 'El correo electrónico no es correcto',
            'contrasenia.exists' => 'La contraseña no es correcta',
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Por favor ingresa un email válido.',
        ];

        // Ejecuta la validación
        $validator = Validator::make($request->all(), $rules, $messages);

        // Verifica si la validación ha fallado
        if ($validator->fails()) {
            // Redirige de vuelta con los errores y los campos anteriores
            return redirect()->back()
                             ->withErrors($validator) // Enviar errores a la vista
                             ->withInput(); // Mantener los datos anteriores en el formulario
        }

        // Validación exitosa, procede con la autenticación
        $usuario = Usuario::where('nombre', $request->nombre)
                          ->where('contrasenia', $request->contrasenia)
                          ->where('email', $request->email)
                          ->first();

        if ($usuario) {
            // Usuario autenticado, redirige a la vista deseada
            if($usuario->email == "admin@admin.com"){
                $juegos = Juego::all();
                return response()->view("usuarios.juegosAdmin", ['juegos'=> $juegos]);
            }else{

                    return response()->view('usuarios.indexTest', ['usuario' => $usuario]);

            }
        } else {
            // Credenciales inválidas, redirige de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales inválidas. Inténtalo de nuevo.');
        }
    }


    public function entrarJuegos($id){
        $usuario= Usuario::find($id);

        $juegos = Juego::all();



        return response()->view('usuarios.juegos',['usuario' => $usuario, 'juegos' => $juegos]);
    }
    public function verFavoritos($id) {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $favoritos = $usuario->favoritos ?: []; // Asegurarse de que sea un array
        $juegosFavoritos = Juego::whereIn('id', $favoritos)->get();

        return view('usuarios.favoritos', ['usuario' => $usuario, 'juegos' => $juegosFavoritos]);
    }

    public function entrarJuegosAdmin(){
        return response()->view('usuarios.juegosAdmin');
    }
    public function mostrarPerfil($id){
        $usuario= Usuario::find($id);

        $favoritos = [];
        if ($usuario && !empty($usuario->favoritos)) {
            // Decodifica el JSON si es necesario
            $favoritosIds = json_decode($usuario->favoritos, true);

            // Obtén los juegos favoritos por sus IDs
            $favoritos = Juego::whereIn('id', $favoritosIds)->get();
        }
        return response()->view('usuarios.perfil',['usuario' => $usuario, 'favoritos'=> $favoritos]);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = Usuario::find($id);

        if (!$user) {
            return back()->withErrors(['user_not_found' => 'Usuario no encontrado']);
        }

        // Validar las entradas del formulario
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:4',
        ], [
            'current_password.required' => 'La contraseña actual es obligatoria.',
            'new_password.required' => 'La nueva contraseña es obligatoria.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 4 caracteres.',
        ]);

        // Verificar la contraseña actual
        if ($user->contrasenia !== $request->current_password) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }
        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['current_password' => 'La confirmación no es válida']);
        }

        // Actualizar la contraseña
        $user->contrasenia = ($request->new_password);
        $user->save();

        return back()->with('success', 'Contraseña actualizada correctamente');
    }

    public function updateFoto(Request $request, $id){
        $user = Usuario::find($id);

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = $request->file('avatar')->store('images','public');

        $user->avatar = $imagenPath;
        $user->save();

        return back()->with('success', 'Foto actualizada correctamente');
    }

}
