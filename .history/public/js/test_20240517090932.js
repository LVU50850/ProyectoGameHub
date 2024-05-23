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
    console.log(answerName+ "+1");
    answerCounts[answerName]++;

    // Recomendar juegos basados en las respuesta
}

// Asociar función a eventos de cambio en las respuestas
function alClickar(){
    console.log("hola");
    const answers = document.querySelectorAll('input[type="radio"]');
    answers.forEach(answer => {
        if(answer.checked)
            handleAnswerSelection(answer.getAttribute('class'));
            console.log(answer.getAttribute('class'));
    });
    showGames();

}

function showGames(){
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

    const userId = window.location.pathname.split('/').pop();

    const userId = window.location.pathname.split('/').pop();

    // Suponiendo que tienes el cálculo de juegos recomendados en JavaScript
    let recommendedGames = "Tu lógica de juegos aquí";

    // Obtener el token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/subir-juegos/${userId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ juegos: recommendedGames })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
        // Puedes manejar la respuesta aquí, mostrar un mensaje, etc.
    })
    .catch(error => {
        console.error('Error al enviar los juegos recomendados:', error);
    });
}

