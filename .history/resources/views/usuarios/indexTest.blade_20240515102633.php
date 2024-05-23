<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - GameHub</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenido, {{$usuario->nombre}} </h1>
        <h2>Antes de continuar, nos gustaría que hicieses un breve test para saber tus gustos
        <a href = "/test"> proceder con el test </a> </h2>
        <div class="button-container">

        </div>
    </div>
</body>
</html>
