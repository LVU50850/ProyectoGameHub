
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos - GameHub</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/juego.css') }}" rel="stylesheet">
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
<div id = "juegos-container">
    <header>
        <div class="logo">GameHub</div>
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Perfil" class="profile-icon">
            <span>{{ $usuario->nombre }}</span>
            <div class="dropdown-content hidden">
                <a href="/perfil/{{$usuario->id}}">Mi perfil</a>
                <a href="/bienvenida/juegos/{{$usuario->id}}">Juegos</a>
                <a class = "alert alert-danger" href = "/bienvenida">Cerrar sesión</a>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar mensajes de información -->
        @if (session('info'))
            <div class="alert alert-danger">
                {{ session('info') }}
            </div>
        @endif

        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="container">
        <div class="filter">
            <label>
                <input type="radio" name="filter" value="all" checked onclick="filterJuegos('all')">
                Todos los juegos
            </label>
            <label>
                <input type="radio" name="filter" value="favorites" onclick="filterJuegos('favorites')">
                Juegos favoritos
            </label>
            <label>
                <input type="radio" name="filter" value="recommended" onclick="filterJuegos('recommended')">
                Juegos recomendados
            </label>
        </div>
        <h1>Todos los juegos</h1>
        @foreach($juegos as $juego)
                <div class="juego">
                    <h2>{{ $juego->nombre }}</h2>
                    <div class = "imagen">
                        <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" style="width: 200px; height: auto;">
                    </div>
                    <p><strong>Descripción:</strong>{{ $juego->descripcion }}</p>
                    <p><strong>Comentarios:</strong></p>
                    <ul>
                @foreach($juego->comentarios as $comentario)
                    <li><img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Perfil" class="profile-icon"><em>{{ $comentario->usuario?->nombre }} - </em>{{ $comentario->texto }}</li>
                @endforeach
            </ul>
                    <!-- Formulario para añadir comentario -->
                    <!-- Formulario para añadir comentario -->
                    <form action="{{ route('addComment', ['juego_id' => $juego->id, 'usuario_id' => $usuario->id]) }}" method="POST">

        @csrf
        <textarea name="comentario" placeholder="Añadir un comentario"></textarea><br>
        <button type="submit">Añadir comentario</button>
        </form>
        <form action="/juegos/favoritos/{{ $juego->id }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $usuario->id }}">
            <button type="submit" class="favorito-btn">Añadir a favoritos</button>
        </form>


                </div>

            @endforeach


</div>
    <script>
        function toggleDropdown() {
            document.querySelector('.dropdown-content').classList.toggle('hidden');
        }
        function filterJuegos(filter) {
            const userId = {{ $usuario->id }};
            let url = '';

            if (filter === 'all') {
                url = `/bienvenida/juegos/${userId}`;
            } else if (filter === 'favorites') {
                url = `/bienvenida/favoritos/${userId}`;
            } else if (filter === 'recommended') {
                url = `/bienvenida/recomendados/${userId}`;
            }

            fetch(url)

                .then(response => response.text())
                .then(html => {

                    document.getElementById('juegos-container').innerHTML = html;
                    console.log("hola");
                })
                .catch(error => console.error('Error:', error));
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
