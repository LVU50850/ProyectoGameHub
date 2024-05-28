<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/juego.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="{{ asset('images/monigote.jpg') }}" alt="Perfil" class="profile-icon" onclick="toggleDropdown()">
            <span>{{ $usuario->nombre }}</span>
            <div class="dropdown-content hidden">
                <a href="route_to_configuracion" onclick="toggleDropdown()">Configuración</a>
                <a href="route_to_mi_perfil" onclick="toggleDropdown()">Mi perfil</a>
            </div>
        </div>
    </header>
    <h1>Bienvenido, {{$usuario->nombre}} </h1>
    <h2>Aquí están tus juegos recomendados: {{$usuario->juegos}}</h2>
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

    <script>
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
