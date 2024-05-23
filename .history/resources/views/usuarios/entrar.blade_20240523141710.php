<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Iniciar sesión</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
    </header>
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