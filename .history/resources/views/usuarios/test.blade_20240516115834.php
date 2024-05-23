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
        <!-- Sección para preguntas de usuarios que no han jugado videojuegos -->
        <div class="not-played-questions hidden">
            <div class="question">
                <p class="question-text">¿Cuál es tu tipo de película favorita?</p>
                <div class="answers">
                    <label><input type="radio" name="answer1" class = "respuesta1"> Drama</label><br>
                    <label><input type="radio" name="answer1" class = "respuesta2"> Acción</label><br>
                    <label><input type="radio" name="answer1" class = "respuesta3"> Historia</label><br>
                    <label><input type="radio" name="answer1" class = "respuesta4"> Competitivas</label><br>
                </div>
            </div>

            <div class="question">
                <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
                <div class="answers">
                    <label><input type="radio" name="answer2" class = "respuesta1"> Ver películas o series</label><br>
                    <label><input type="radio" name="answer2"> Practicar deportes o actividades físicas</label><br>
                    <label><input type="radio" name="answer2"> Leer libros o comics</label><br>
                    <label><input type="radio" name="answer2"> Jugar juegos de mesa</label><br>
                </div>
            </div>
        </div>

        <!-- Sección para preguntas de usuarios que han jugado videojuegos -->
        <div class="played-questions hidden">
            <div class="question">
                <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer3" class = "respuesta1"> Drama</label><br>
                    <label><input type="radio" name="answer3"> Acción</label><br>
                    <label><input type="radio" name="answer3"> Historia</label><br>
                    <label><input type="radio" name="answer3"> Online</label><br>
                </div>
            </div>

            <div class="question">
                <p class="question-text">¿Cuántos videojuegos has jugado?</p>
                <div class="answers">
                    <label><input type="radio" name="answer4" class = "respuesta1"> Menos de 10</label><br>
                    <label><input type="radio" name="answer4"> 10-20</label><br>
                    <label><input type="radio" name="answer4"> 20-50</label><br>
                    <label><input type="radio" name="answer4"> Más de 50</label><br>
                </div>
            </div>

            <div class="question">
                <p class="question-text">¿Cuál de estos te gusta más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer5" class = "respuesta1"> Kratos</label><br>
                    <label><input type="radio" name="answer5"> Mario</label><br>
                    <label><input type="radio" name="answer5"> Sonic</label><br>
                    <label><input type="radio" name="answer5"> Capitán Price</label><br>
                </div>
            </div>
            <div class = "question">
                <button type = "button">Siguiente</button>
                <button type = "button">Anterior</button>
            </div>
        </div>


    </div>

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
