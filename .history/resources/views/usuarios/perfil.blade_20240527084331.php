<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/juego.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="logo">GameHub</div>
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="{{ asset('images/monigote.jpg') }}" alt="Perfil" class="profile-icon">
            <span>{{ $usuario->nombre }}</span>
            <div class="dropdown-content hidden">
                <a href="/perfil/{{$usuario->id}}">Configuración</a>
                <a href="/perfil/{{$usuario->id}}">Mi perfil</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Mi Perfil</h1>
        <div class="user-info">
            <p><strong>Nombre de usuario:</strong> {{ $usuario->nombre }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
        </div>

        <button onclick="togglePasswordForm()">Cambiar contraseña</button>

        <form id="password-form" action="/perfil/{{$usuario->id}}/update" method="POST" class="hidden">
            @csrf
            <div class="form-group">
                <label for="current_password">Contraseña Actual:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Nueva Contraseña:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>

    <script>
        function toggleDropdown() {
            document.querySelector('.dropdown-content').classList.toggle('hidden');
        }

        function togglePasswordForm() {
            document.getElementById('password-form').classList.toggle('hidden');
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

        function toggleDropdown() {
            document.querySelector('.dropdown-content').classList.toggle('hidden');
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.user-profile')) {
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
