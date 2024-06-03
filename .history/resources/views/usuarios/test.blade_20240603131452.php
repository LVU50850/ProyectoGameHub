<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Test de Gustos</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a class = "enlace" href = "/bienvenida"><div class="logo">GameHub</div></a>
    </header>
    <div class="quiz-container">
        <h1>Test de Gustos</h1>
        <div class = "questions-wrapper">
         <!-- Primera pregunta: ¿Alguna vez has jugado algún videojuego? -->
         <div class="question active">
            <p class="question-text">¿Alguna vez has jugado algún videojuego?</p>
            <div class="answers">
                <label><input type="radio" name="has_played" value="si"> Sí</label><br>
                <label><input type="radio" name="has_played" value="no"> No</label><br>
            </div>
            <button onclick = "handleFirstQuestion()">Continuar</button>
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
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>

            <div class="question">
                <p class="question-text">¿Qué tipo de entretenimiento prefieres en tu tiempo libre?</p>
                <div class="answers">
                    <label><input type="radio" name="answer2" class = "respuesta1"> Ver películas o series</label><br>
                    <label><input type="radio" name="answer2" class = "respuesta2"> Practicar deportes o actividades físicas</label><br>
                    <label><input type="radio" name="answer2" class = "respuesta3"> Leer libros o comics</label><br>
                    <label><input type="radio" name="answer2" class = "respuesta4"> Jugar juegos de mesa</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Cuantas horas dedicas al día al ordenador?</p>
                <div class="answers">
                    <label><input type="radio" name="answer6" class = "respuesta1"> Menos de 1 hora</label><br>
                    <label><input type="radio" name="answer6" class = "respuesta2"> 1-3 Horas</label><br>
                    <label><input type="radio" name="answer6" class = "respuesta3"> 3-5 Horas </label><br>
                    <label><input type="radio" name="answer6" class = "respuesta4"> Más de 5 horas</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué tipo de historias prefieres en los libros o películas?</p>
                <div class="answers">
                    <label><input type="radio" name="answer11" class = "respuesta1"> Historias emocionales y profundas</label><br>
                    <label><input type="radio" name="answer11" class = "respuesta2"> Aventuras llenas de acción y emoción</label><br>
                    <label><input type="radio" name="answer11" class = "respuesta3"> Mundos imaginarios y fantásticos </label><br>
                    <label><input type="radio" name="answer11" class = "respuesta4"> Relatos divertidos y ligeros</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué tipo de historias prefieres en los libros o películas?</p>
                <div class="answers">
                    <label><input type="radio" name="answer12" class = "respuesta1"> Historias emocionales y profundas</label><br>
                    <label><input type="radio" name="answer12" class = "respuesta2"> Aventuras llenas de acción y emoción</label><br>
                    <label><input type="radio" name="answer12" class = "respuesta3"> Mundos imaginarios y fantásticos </label><br>
                    <label><input type="radio" name="answer12" class = "respuesta4"> Relatos divertidos y ligeros</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué tipo de arte visual te atrae más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer13" class = "respuesta1"> Arte realista y detallado</label><br>
                    <label><input type="radio" name="answer13" class = "respuesta2"> Arte dinámico y colorido</label><br>
                    <label><input type="radio" name="answer13" class = "respuesta3"> Arte fantástico e imaginativo </label><br>
                    <label><input type="radio" name="answer13" class = "respuesta4"> Arte humorístico y caricaturesco</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Cómo te gustaría que fuera una experiencia de entretenimiento nueva?</p>
                <div class="answers">
                    <label><input type="radio" name="answer14" class = "respuesta1"> Relajante y contemplativa</label><br>
                    <label><input type="radio" name="answer14" class = "respuesta2"> Emocionante y desafiante</label><br>
                    <label><input type="radio" name="answer14" class = "respuesta3"> Interactiva y explorativa </label><br>
                    <label><input type="radio" name="answer14" class = "respuesta4"> Social y colaborativa</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué prefieres en términos de desafío en una actividad?</p>
                <div class="answers">
                    <label><input type="radio" name="answer14" class = "respuesta1"> Desafíos mentales y estratégicos</label><br>
                    <label><input type="radio" name="answer14" class = "respuesta2"> Desafíos físicos y de coordinación</label><br>
                    <label><input type="radio" name="answer14" class = "respuesta3"> Desafíos de exploración y descubrimiento </label><br>
                    <label><input type="radio" name="answer14" class = "respuesta4"> Desafíos sociales y de cooperación</label><br>
                </div>
                <button onclick="showNextQuestion('not-played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('not-played-questions')">Anterior</button>
            </div>


        </div>

        <!-- Sección para preguntas de usuarios que han jugado videojuegos -->
        <div class="played-questions hidden">
            <div class="question">
                <p class="question-text">¿Qué tipo de juegos te gustan más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer3" class = "respuesta1"> Drama</label><br>
                    <label><input type="radio" name="answer3" class = "respuesta2"> Acción</label><br>
                    <label><input type="radio" name="answer3" class = "respuesta3"> Historia</label><br>
                    <label><input type="radio" name="answer3" class = "respuesta4"> Online</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>

            <div class="question">
                <p class="question-text">¿Cuántos videojuegos has jugado?</p>
                <div class="answers">
                    <label><input type="radio" name="answer4" class = "respuesta1"> Menos de 10</label><br>
                    <label><input type="radio" name="answer4" class = "respuesta2"> 10-20</label><br>
                    <label><input type="radio" name="answer4" class = "respuesta3"> 20-50</label><br>
                    <label><input type="radio" name="answer4" class = "respuesta4"> Más de 50</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>

            <div class="question">
                <p class="question-text">¿Cuál de estos te gusta más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer5" class = "respuesta1"> Kratos</label><br>
                    <label><input type="radio" name="answer5" class = "respuesta2"> Mario</label><br>
                    <label><input type="radio" name="answer5" class = "respuesta3"> Sonic</label><br>
                    <label><input type="radio" name="answer5" class = "respuesta4"> Capitán Price</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué plataforma de juego usas más?</p>
                <div class="answers">
                    <label><input type="radio" name="answer7" class = "respuesta1"> Playstation</label><br>
                    <label><input type="radio" name="answer7" class = "respuesta2"> Xbox</label><br>
                    <label><input type="radio" name="answer7" class = "respuesta3"> Nintendo Switch</label><br>
                    <label><input type="radio" name="answer7" class = "respuesta4"> PC</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué tipo de narrativa prefieres en los videojuegos?</p>
                <div class="answers">
                    <label><input type="radio" name="answer8" class = "respuesta1"> Lineal y guiada</label><br>
                    <label><input type="radio" name="answer8" class = "respuesta2"> Mundo abierto con múltiples finales</label><br>
                    <label><input type="radio" name="answer8" class = "respuesta3"> Basada en elecciones del jugador</label><br>
                    <label><input type="radio" name="answer8" class = "respuesta4"> Sin narrativa específica, solo gameplay</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué prefieres en un videojuego?</p>
                <div class="answers">
                    <label><input type="radio" name="answer9" class = "respuesta1"> Gráficos impresionantes</label><br>
                    <label><input type="radio" name="answer9" class = "respuesta2"> Jugabilidad adictiva</label><br>
                    <label><input type="radio" name="answer9" class = "respuesta3"> Historia profunda</label><br>
                    <label><input type="radio" name="answer9" class = "respuesta4"> Multijugador en línea</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>
            <div class="question">
                <p class="question-text">¿Qué tipo de contenido adicional prefieres en los juegos?</p>
                <div class="answers">
                    <label><input type="radio" name="answer10" class = "respuesta1"> DLCs(contenido descargable)</label><br>
                    <label><input type="radio" name="answer10" class = "respuesta2"> Expansiones grandes</label><br>
                    <label><input type="radio" name="answer10" class = "respuesta3"> Actualizaciones gratuitas</label><br>
                    <label><input type="radio" name="answer10" class = "respuesta4"> Mods creados por la comunidad</label><br>
                </div>
                <button onclick="showNextQuestion('played-questions')">Siguiente</button>
                <button onclick="showPreviousQuestion('played-questions')">Anterior</button>
            </div>
            <div class = "question">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button id="submit-test" type="button">Enviar Test</button>
            </div>
        </div>

</div>
    </div>

    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
