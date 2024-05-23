<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<body>

    <div class = "container">
        <h1>Listado de juegos</h1>
        @foreach($juegos as $juego)
            <div class = "juego"></div>
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
