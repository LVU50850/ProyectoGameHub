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
    <p class="question-text">¿Cuál es tu tipo de película favorita?</p>
    <div class="answers">
        <li class="answer1">Drama</li>
        <li class="answer2">Acción</li>
        <li class = "answer3">Historia</li>
        <label><input type = "radio" name = "answer" class = "answer4">Competitivas</label>

</div>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>
    <div class="question hidden" id="not_played_questions">
    <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
    <ul class="answers">
        <li class="answer1">Ver películas o series</li>
        <li class="answer2">Practicar deportes o actividades físicas</li>
        <li class = "answer3">Leer libros o comics</li>
        <li class = "answer4">Jugar juegos de mesa</li>

    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>
    <div class="question hidden" id="not_played_questions">
    <p class="question-text">¿Qué tipo de aventuras te llaman más la atención?</p>
    <ul class="answers">
        <li class="answer1">Historias emocionantes y dramáticas</li>
        <li class="answer2">Practicar deportes o actividades físicas</li>
        <li class = "answer3">Descubrimiento de nuevas culturas y lugares</li>
        <li class = "answer4">Retos físicos y deportivos</li>

    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>

    </div>
    <div class="question hidden" id="not_played_questions">
    <p class="question-text">¿Qué te gusta hacer en reuniones sociales?</p>
    <ul class="answers">
        <li class="answer1">Conversar y debatir sobre temas interesantes</li>
        <li class="answer2">Resolver enigmas y acertijos</li>
        <li class = "answer3">Bailar o disfrutar de la música</li>
        <li class = "answer4">Participar en juegos o deportes grupales</li>

    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>

    <div class="question hidden" id="played_questions">
    <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
    <ul class="answers">
        <li class="answer1">Drama</li>
        <li class="answer2">Acción</li>
        <li class = "answer3">Historia</li>
        <li class = "answer4">Online</li>
    </ul>
    <button onclick="showNextQuestion()">Continuar</button>
    </div>


    </div> <!-- Los ul hay que cambiarlos por inputs de tipo radio para que funcione. -->

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
