<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Bienvenido, {{$usuario->nombre}} </h1>

    <p>Antes de continuar, nos gustaría que hicieses un breve test para saber tus gustos <a href = "/test"> proceder con el test </a> </p>
</body>
</html>
