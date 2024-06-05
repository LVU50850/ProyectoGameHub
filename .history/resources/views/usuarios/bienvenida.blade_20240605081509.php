<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - GameHub</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1 class="main-title">GameHub</h1>
        <h2>Para ingresar al sitio web tienes que tener una cuenta, inicia sesión o crea una nueva:</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="button-container">
            <a class="button" href="/bienvenida/registrarse">Registrarse</a>
            <a class="button" href="/bienvenida/entrar">Entrar</a>
        </div>
    </div>
</body>
</html>
