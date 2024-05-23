<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión -  GameHub</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Hola </h1>
    <form method = "POST" action  = "/bienvenida/entrarUsuario">
        @csrf
        <label>Nombre de usuario: <input type = "text" name = "nombre" id = "nombre"> </label>
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <label>Contraseña: <input type = "password" name = "contrasenia" id = "contrasenia"></label>
        @error('contrasenia')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <label>Email: <input type = "text" name = "email" id = "email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <input type = "submit">
</form>
</body>
</html>
