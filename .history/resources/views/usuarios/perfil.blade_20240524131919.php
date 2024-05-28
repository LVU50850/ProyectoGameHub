<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="{{ asset('images/monigote.png') }}" alt="Perfil" class="profile-icon">
            <span>Mi perfil ({{ $usuario->nombre }})</span>
            <div class="dropdown-content hidden">
                <a href="#" onclick="openProfileModal()">Mi perfil</a>
                <a href="{{ route('configuracion') }}">Configuración</a>
            </div>
        </div>
    </header>
    <h1>Bienvenido, {{ $usuario->nombre }}</h1>
    <h2>Aquí están tus juegos recomendados: {{ $usuario->juegos }}</h2>
    <div class="container">
        <h1>Listado de juegos</h1>
        @foreach($juegos as $juego)
            <div class="juego">
                <h2>{{ $juego->nombre }}</h2>
                <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" style="width: 200px; height: auto;">
                <p><strong>Comentarios:</strong> {{ $juego->comentarios ?? 'Sin comentarios' }}</p>

                <!-- Formulario para añadir comentario -->
                <form action="{{ route('addComment', $juego->id) }}" method="POST">
                    @csrf
                    <textarea name="comentario" placeholder="Añadir un comentario"></textarea><br>
                    <button type="submit">Añadir comentario</button>
                </form>
            </div>
        @endforeach
    </div>

    <!-- Modal para "Mi perfil" -->
    <div id="profileModal" class="modal hidden">
        <div class="modal-content">
            <span class="close" onclick="closeProfileModal()">&times;</span>
            <h2>Mi Perfil</h2>
            <form action="{{ route('updateProfile') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Cambiar Nombre:</label>
                    <input type="text" id="name" name="name" value="{{ $usuario->nombre }}" required>
                </div>
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
    </div>

    <script>
        function toggleDropdown() {
            document.querySelector('.dropdown-content').classList.toggle('hidden');
        }

        function openProfileModal() {
            document.getElementById('profileModal').classList.remove('hidden');
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
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
