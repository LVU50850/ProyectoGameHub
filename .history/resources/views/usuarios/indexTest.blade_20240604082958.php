<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - GameHub</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <a class = "enlace" href = "/bienvenida"><div class="logo">GameHub</div></a>
    </header>
    <div class="welcome-container">
        <h1>Bienvenido, {{$usuario->nombre}} </h1>
        <h2>Antes de continuar, nos gustaría que hicieses un breve test para saber tus gustos
        <a href = "/test/{{$usuario->id}}" class = "button"> Proceder con el test </a> </h2>
        <div class="button-container">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class = "alert alert-danger"></div>
            Si no quieres hacerlo o ya lo hiciste, pues acceder a la <a href = "juegos/{{$usuario->id}}">Página principal</a>
        </div>
    </div>
</body>
</html>
