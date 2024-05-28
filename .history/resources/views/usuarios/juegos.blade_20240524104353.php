<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
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
</body>
</html>
