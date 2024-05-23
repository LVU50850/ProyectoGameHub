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

        <div class="question">
    <p class="question-text">¿Alguna vez has jugado algún videojuego?</p>
    <div class="answers">
        <label><input type="radio" name="has_played" value="si"> Sí</label>
        <label><input type="radio" name="has_played" value="no"> No</label>
    </div>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>
    <div class="question hidden" id="not_played_questions">
    <p class="question-text">¿Cuál es tu deporte favorito?</p>
    <ul class="answers">
        <li class="answer">Fútbol</li>
        <li class="answer">Baloncesto</li>
        <!-- Otras respuestas aquí -->
    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>
    <div class="question hidden" id="played_questions">
    <p class="question-text">¿Cuál es tu deporte favorito?</p>
    <ul class="answers">
        <li class="answer">Fútbol</li>
        <li class="answer">Baloncesto</li>
        <!-- Otras respuestas aquí -->
    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>


    </div>

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
