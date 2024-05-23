<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Usuario;

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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contrasenia' => 'required|string|min:5',
            'email' => 'required|string|email|unique:usuarios,email', // Verifica la unicidad del email en la tabla usuarios
        ]);

        // Verificar si el email ya está en uso
        $emailExistente = Usuario::where('email', $request->email)->first();
        if ($emailExistente) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este email ya está registrado. Por favor, utiliza otro email.']);
        }

        // Crear el nuevo usuario si la validación pasa y el email no está en uso
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'contrasenia' =>($request->contrasenia),
            'email' => $request->email,
        ]);

        $usuario->save();

        return response()->view("usuarios.bienvenida");
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

                if($usuario->juegos == "NOGAMES"){
                    return response()->view('usuarios.indexTest', ['usuario' => $usuario]);
                }else{
                    return response()->view('usuarios.juegos', ['usuario' => $usuario]);
                }
            }
        } else {
            // Credenciales inválidas, redirige de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales inválidas. Inténtalo de nuevo.');
        }
    }

    public function entrarJuegos($id){
        $usuario= Usuario::find($id);

        return response()->view('usuarios.juegos',['usuario' => $usuario]);
    }

    public function entrarJuegosAdmin(){
        return response()->view('usuarios.juegosAdmin');
    }

}
