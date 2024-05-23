<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Test de Gustos</title>
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
</head>
<body>
    <div class="quiz-container">
        <h1>Test de Gustos</h1>

        <!-- Primera pregunta: ¿Alguna vez has jugado algún videojuego? -->
        <div class="question">
            <p class="question-text">¿Alguna vez has jugado algún videojuego?</p>
            <div class="answers">
                <label><input type="radio" name="has_played" value="si"> Sí</label>
                <label><input type="radio" name="has_played" value="no"> No</label>
            </div>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <!-- Preguntas para quienes no han jugado videojuegos -->
        <div class="question hidden" id="not_played_questions">
            <p class="question-text">¿Cuál es tu tipo de película favorita?</p>
            <div class="answers">
                <label><input type="radio" name="answer" class="answer1"> Drama</label>
                <label><input type="radio" name="answer" class="answer2"> Acción</label>
                <label><input type="radio" name="answer" class="answer3"> Historia</label>
                <label><input type="radio" name="answer" class="answer4"> Competitivas</label>
            </div>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <div class="question hidden" id="not_played_questions">
            <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
            <div class="answers">
                <label><input type="radio" name="answer" class="answer1"> Ver películas o series</label>
                <label><input type="radio" name="answer" class="answer2">
                Practicar deportes o actividades físicas</label>
                <label><input type="radio" name="answer" class="answer3"> Leer libros o comics</label>
                <label><input type="radio" name="answer" class="answer4"> Jugar juegos de mesa</label>
            </div>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <!-- Otras preguntas para quienes no han jugado videojuegos (añade más según necesites) -->

        <!-- Preguntas para quienes han jugado videojuegos -->
        <div class="question hidden" id="played_questions">
            <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
            <div class="answers">
                <label><input type="radio" name="answer" class="answer1"> Drama</label>
                <label><input type="radio" name="answer" class="answer2"> Acción</label>
                <label><input type="radio" name="answer" class="answer3"> Historia</label>
                <label><input type="radio" name="answer" class="answer4"> Online</label>
            </div>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

    </div>

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
