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
        <div class="logo">GameHub</div>
    </header>
    <div class="welcome-container">
        <h1>Bienvenido, {{$usuario->nombre}} </h1>
        <h2>Antes de continuar, nos gustaría que hicieses un breve test para saber tus gustos
        <a href = "/test/{{$usuario->id}}"> proceder con el test </a> </h2>
        <div class="button-container">
            Si no quieres hacerlo, pues acceder a la <a href = "#">Página principal</a>
        </div>
    </div>
</body>
</html>
