<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Test de Gustos</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="quiz-container">
        <h1>Test de Gustos</h1>

        <!-- Pregunta 1: ¿Alguna vez has jugado algún videojuego? -->
        <div class="question" id="question1">
            <p class="question-text">¿Alguna vez has jugado algún videojuego?</p>
            <div class="answers">
                <button onclick="showNextQuestion('si')">Sí</button>
                <button onclick="showNextQuestion('no')">No</button>
            </div>
        </div>

        <!-- Preguntas para quienes han jugado videojuegos -->
        <div class="question hidden" id="question2">
            <p class="question-text">¿Cuál es tu tipo de película favorita?</p>
            <div class="answers">
                <button onclick="showPreviousQuestion()">Anterior</button>
                <button onclick="showNextQuestion('drama')">Drama</button>
                <button onclick="showNextQuestion('accion')">Acción</button>
                <button onclick="showNextQuestion('historia')">Historia</button>
                <button onclick="showNextQuestion('competitivas')">Competitivas</button>
            </div>
        </div>

        <div class="question hidden" id="question3">
            <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
            <div class="answers">
                <button onclick="showPreviousQuestion()">Anterior</button>
                <button onclick="showNextQuestion('peliculas_series')">Ver películas o series</button>
                <button onclick="showNextQuestion('deportes')">Practicar deportes o actividades físicas</button>
                <button onclick="showNextQuestion('leer')">Leer libros o comics</button>
                <button onclick="showNextQuestion('juegos_mesa')">Jugar juegos de mesa</button>
            </div>
        </div>

        <!-- Preguntas para quienes no han jugado videojuegos -->
        <div class="question hidden" id="question4">
            <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
            <div class="answers">
                <button onclick="showPreviousQuestion()">Anterior</button>
                <button onclick="showNextQuestion('drama')">Drama</button>
                <button onclick="showNextQuestion('accion')">Acción</button>
                <button onclick="showNextQuestion('historia')">Historia</button>
                <button onclick="showNextQuestion('online')">Online</button>
            </div>
        </div>

    </div>

    <script src="script.js"></script>
</body>
</html>
