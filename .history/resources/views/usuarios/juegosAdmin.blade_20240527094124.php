<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Juegos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="{{ asset('images/monigote.png') }}" alt="Perfil" class="profile-icon">
            <span>Mi perfil ({{ $usuario->nombre }})</span>
            <div class="dropdown-content hidden">
                <a href="/perfil/{{$usuario->id}}">Mi perfil</a>
                <a href="/perfil/{{$usuario->id}}">Configuración</a>
            </div>
        </div>
    </header>

    <div class="container">
        <button id="addGameButton">Añadir Juego</button>
        <div id="gameFormContainer"></div>
    </div>

    <script src="{{ asset('js/juegosAdmin.js') }}"></script>
    <script>
        function toggleDropdown() {
            document.querySelector('.dropdown-content').classList.toggle('hidden');
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.user-profile') && !event.target.matches('.user-profile *')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
</body>
</html>
