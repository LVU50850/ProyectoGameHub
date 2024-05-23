// Objeto para contar las selecciones de respuestas
const answerCounts = {
    answer1: 0,
    answer2: 0,
    answer3: 0,
    answer4: 0
};

// Función para mostrar la siguiente pregunta y gestionar las respuestas
function showNextQuestion() {
    // Obtener la pregunta actual visible
    const currentQuestion = document.querySelector('.question:not(.hidden)');

    // Ocultar la pregunta actual
    currentQuestion.classList.add('hidden');

    // Obtener la respuesta seleccionada
    const selectedAnswer = currentQuestion.querySelector('input[type="radio"]:checked');

    // Incrementar el contador de la respuesta seleccionada
    if (selectedAnswer) {
        const answerClass = selectedAnswer.name;
        if (answerCounts.hasOwnProperty(answerClass)) {
            answerCounts[answerClass]++;
        }
    }

    // Mostrar la siguiente pregunta o calcular los juegos recomendados
    const nextQuestion = currentQuestion.nextElementSibling;
    if (nextQuestion) {
        nextQuestion.classList.remove('hidden');
    } else {
        // Calcular juegos recomendados y guardar en la base de datos
        calculateAndSaveRecommendedGames();
    }
}

// Función para mostrar la pregunta anterior
function showPreviousQuestion() {
    // Obtener la pregunta actual visible
    const currentQuestion = document.querySelector('.question:not(.hidden)');

    // Ocultar la pregunta actual
    currentQuestion.classList.add('hidden');

    // Mostrar la pregunta anterior
    const previousQuestion = currentQuestion.previousElementSibling;
    if (previousQuestion) {
        previousQuestion.classList.remove('hidden');
    }
}

// Función para calcular los juegos recomendados y guardar en la base de datos
function calculateAndSaveRecommendedGames() {
    // Determinar la respuesta más seleccionada
    let mostSelectedAnswer = '';
    let maxSelections = 0;

    for (const answer in answerCounts) {
        if (answerCounts[answer] > maxSelections) {
            mostSelectedAnswer = answer;
            maxSelections = answerCounts[answer];
        }
    }

    // Definir los juegos recomendados según la respuesta más seleccionada
    let recommendedGames = '';

    switch (mostSelectedAnswer) {
        case 'answer1':
            recommendedGames = 'Detroit Become Human, Heavy Rain, Beyond: Two Souls';
            break;
        case 'answer2':
            recommendedGames = 'Uncharted 4, Tomb Raider, God Of War';
            break;
        case 'answer3':
            recommendedGames = 'GTA 5, Red Dead Redemption 2, Mafia 2';
            break;
        case 'answer4':
            recommendedGames = 'Counter Strike, Valorant, Fortnite';
            break;
        default:
            recommendedGames = 'No se puede recomendar ningún juego en este momento';
    }

    // Aquí puedes agregar el código para guardar `recommendedGames` en la base de datos del usuario
    // Por ejemplo, puedes realizar una solicitud AJAX para enviar estos datos al servidor
    // y actualizar el campo `juegosRecomendados` del usuario.

    // Ejemplo de solicitud AJAX (usando fetch API)
    const userId = 1; // Reemplazar con el ID del usuario
    const userData = { userId, recommendedGames };

    fetch('/guardarJuegosRecomendados', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
    })
    .then(response => {
        if (response.ok) {
            console.log('Juegos recomendados guardados correctamente.');
        } else {
            console.error('Error al guardar los juegos recomendados.');
        }
    })
    .catch(error => {
        console.error('Error de red:', error);
    });
}
