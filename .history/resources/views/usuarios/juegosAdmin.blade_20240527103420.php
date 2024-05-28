<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/juego.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="logo">GameHub</div>
    </header>
    <div class = "container">
        <br><br>
        <h1>Listado de juegos</h1>
        @foreach($juegos as $juego)
            <div class = "juego">
                <h2>{{ $juego->nombre }}</h2>
                <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" style="width: 200px; height: auto;">
                <p><strong>Descripcion:</strong>{{ $juego->descripcion }}</p>
                <p><strong>Comentarios:</strong> {{ $juego->comentarios ?? 'Sin comentarios' }}</p>
            </div>
        @endforeach
    </div>
    <button id="addGameButton">Añadir juego</button>
    <div id="gameFormContainer">
        <form id = "gameForm" method = "POST" action = "/bienvenida/juegosAdminJuego" enctype="multipart/form-data">
            @csrf
        </form>
    </div>
</body>
<script src="{{ asset('js/juegosAdmin.js') }}"></script>
</html>
