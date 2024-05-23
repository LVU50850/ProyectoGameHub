let answerCounts = {
    respuesta1: 0,
    respuesta2: 0,
    respuesta3: 0,
    respuesta4: 0
};

function showNextQuestion() {
    const hasPlayedRadio = document.querySelector('input[name="has_played"]:checked');

    if (!hasPlayedRadio) {
        alert('Por favor, selecciona una opción para continuar.');
        return;
    }

    const hasPlayed = hasPlayedRadio.value;

    // Ocultar pregunta actual
    document.querySelector('.question').classList.add('hidden');

    if (hasPlayed === 'si') {
        // Mostrar preguntas para usuarios que han jugado videojuegos
        document.querySelector('.played-questions').classList.remove('hidden');
    } else {
        // Mostrar preguntas para usuarios que no han jugado videojuegos
        document.querySelector('.not-played-questions').classList.remove('hidden');
    }
}

function showPreviousQuestion() {
    const currentQuestion = document.querySelector('.question:not(.hidden)');
    currentQuestion.classList.add('hidden');

    const previousQuestion = currentQuestion.previousElementSibling;
    previousQuestion.classList.remove('hidden');
}

// Manejar las respuestas y recomendar juegos
function handleAnswerSelection(answerName) {
    answerCounts[answerName]++;

    // Recomendar juegos basados en las respuestas
    let recommendedGames;

    if (answerCounts.respuesta1 > answerCounts.respuesta2) {
        recommendedGames = "Detroit Become Human, Heavy Rain y Beyond: Two Souls";
    } else if (answerCounts.respuesta2 > answerCounts.respuesta3) {
        recommendedGames = "Uncharted 4, Tomb Raider y God Of War";
    } else if (answerCounts.respuesta3 > answerCounts.respuesta4) {
        recommendedGames = "GTA 5, Red Dead Redemption 2 y Mafia 2";
    } else {
        recommendedGames = "Counter Strike, Valorant, Fortnite";
    }

    // Mostrar juegos recomendados
    console.log("Juegos recomendados:", recommendedGames);
}

// Asociar función a eventos de cambio en las respuestas
function alClickar(){
    console.log("hola");
    const answers = document.querySelectorAll('input[type="radio"]');
    answers.forEach(answer => {
        if(answer)
            handleAnswerSelection(answer.getAttribute('class'));
            console.log(answer.getAttribute('class'));
    });
}

