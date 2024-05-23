<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<body>
    <button id="addGameButton">Añadir juego</button>
    <div id="gameFormContainer">
        <form id = "gameForm" method = "POST" action = "/bienvenida/juegosAdminJuego">

        </form>
    </div>
</body>
<script src="{{ asset('js/juegosAdmin.js') }}"></script>
</html>
