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
                <label><input type="radio" name="has_played" value="si"> Sí</label><br>
                <label><input type="radio" name="has_played" value="no"> No</label><br>
            </div>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <!-- Preguntas para quienes no han jugado videojuegos -->
        <div class="question hidden" id="not_played_questions">
            <p class="question-text">¿Cuál es tu tipo de película favorita?</p>
            <div class="answers">
                <label><input type="radio" name="answer1" class="answer1"> Drama</label><br>
                <label><input type="radio" name="answer1" class="answer2"> Acción</label><br>
                <label><input type="radio" name="answer1" class="answer3"> Historia</label><br>
                <label><input type="radio" name="answer1" class="answer4"> Competitivas</label><br>
            </div>
            <button onclick="showPreviousQuestion()">Anterior</button>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <div class="question hidden" id="not_played_questions">
            <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
            <div class="answers">
                <label><input type="radio" name="answer2" class="answer1"> Ver películas o series</label><br>
                <label><input type="radio" name="answer2" class="answer2"> Practicar deportes o actividades físicas
                </label><br>
                <label><input type="radio" name="answer2" class="answer3"> Leer libros o comics</label><br>
                <label><input type="radio" name="answer2" class="answer4"> Jugar juegos de mesa</label><br>
            </div>
            <button onclick="showPreviousQuestion()">Anterior</button>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

        <!-- Preguntas para quienes han jugado videojuegos -->
        <div class="question hidden" id="played_questions">
            <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
            <div class="answers">
                <label><input type="radio" name="answer3" class="answer1"> Drama</label><br>
                <label><input type="radio" name="answer3" class="answer2"> Acción</label><br>
                <label><input type="radio" name="answer3" class="answer3"> Historia</label><br>
                <label><input type="radio" name="answer3" class="answer4"> Online</label><br>
            </div>
            <button onclick="showPreviousQuestion()">Anterior</button>
            <button onclick="showNextQuestion()">Continuar</button>
        </div>

    </div>

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
