<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendación de Videojuegos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Recomendación de Videojuegos</h1>

    <div class="recommendation-container">
        <h2>¡Te recomendamos estos juegos!</h2>
        <p>Basado en tus respuestas, te sugerimos el siguiente paquete de juegos:</p>

        <ul>
            <li>{{ $recommendedPackage }}</li>
        </ul>

        <p>¡Disfruta jugando!</p>
    </div>
</body>
</html>
