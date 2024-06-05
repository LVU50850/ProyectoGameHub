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
    <a class = "enlace" href = "/bienvenida"><div class="logo">GameHub</div></a>
</header>
<div class="container">
    <br><br>
    <h1>Listado de juegos</h1>
    @foreach($juegos as $juego)
        <div class="juego">
            <h2 class = "centrar">{{ $juego->nombre }}</h2>
            <img class = "centrara" src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" style="width: 200px; height: auto;">
            <p><strong>Descripcion:</strong> {{ $juego->descripcion }}</p>
            <p><strong>Comentarios:</strong></p>
            <ul>
                @foreach($juego->comentarios as $comentario)
                    <li>
                        {{ $comentario->texto }} - <em>{{ $comentario->usuario?->nombre }}</em>
                        <form action="{{ route('deleteComment', $comentario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form action="{{ route('deleteJuego', $juego->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Juego</button>
            </form>
        </div>
    @endforeach
</div>
<button id="addGameButton">Añadir juego</button>
<div id="gameFormContainer">
    <form id="gameForm" method="POST" action="/bienvenida/juegosAdminJuego" enctype="multipart/form-data">
        @csrf
    </form>
</div>
<script src="{{ asset('js/juegosAdmin.js') }}"></script>
</body>
</html>
