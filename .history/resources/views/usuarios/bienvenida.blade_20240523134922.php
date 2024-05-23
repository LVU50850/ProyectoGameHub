<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - GameHub</title>
    <link href="{{ asset('css/bienvenida.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <div class="welcome-container">
        <h1 class="main-title">GameHub</h1>
        <h2>Para ingresar al sitio web tienes que tener una cuenta, inicia sesión o crea una nueva:</h2>
        <div class="button-container">
            <a class="button" href="/bienvenida/registrarse">Registrarse</a>
            <a class="button" href="/bienvenida/entrar">Entrar</a>
        </div>
    </div>
</body>
</html>
