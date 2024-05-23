// Función para mostrar la siguiente pregunta y registrar la respuesta seleccionada
function showNextQuestion() {
    // Obtener la pregunta actual visible
    const currentQuestion = document.querySelector('.question:not(.hidden)');

    // Ocultar la pregunta actual
    currentQuestion.classList.add('hidden');

    // Mostrar la siguiente pregunta según la respuesta seleccionada
    const selectedAnswer = currentQuestion.querySelector('input[name="has_played"]:checked');

    if (selectedAnswer) {
        const answerValue = selectedAnswer.value;

        if (answerValue === 'si') {
            // Mostrar preguntas para quienes han jugado videojuegos
            const playedQuestions = document.getElementById('played_questions');
            playedQuestions.classList.remove('hidden');
        } else if (answerValue === 'no') {
            // Mostrar preguntas para quienes no han jugado videojuegos
            const notPlayedQuestions = document.getElementById('not_played_questions');
            notPlayedQuestions.classList.remove('hidden');
        }
        else{

        }
    }

    // Registrar la respuesta seleccionada (si hay una respuesta seleccionada)
    if (selectedAnswer) {
        const answerClass = selectedAnswer.className; // Clase de la respuesta seleccionada
        registerAnswer(answerClass); // Llamar a la función para registrar la respuesta
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

// Objeto para contar la cantidad de selecciones por respuesta
const answerCounts = {
    answer1: 0,
    answer2: 0,
    answer3: 0,
    answer4: 0
};

// Función para registrar la respuesta seleccionada por el usuario
function registerAnswer(answerClass) {
    // Incrementar el contador de la respuesta seleccionada
    if (answerCounts.hasOwnProperty(answerClass)) {
        answerCounts[answerClass]++;
    }

    // Si hemos alcanzado la última pregunta, mostrar la recomendación final
    if (answerClass === 'answer4') {
        getRecommendedPackage();
    }
}

// Función para obtener el paquete de juegos recomendado basado en las respuestas
function getRecommendedPackage() {
    // Determinar la respuesta con más selecciones
    let mostSelectedAnswer = '';
    let maxSelections = 0;

    for (const answer in answerCounts) {
        if (answerCounts[answer] > maxSelections) {
            mostSelectedAnswer = answer;
            maxSelections = answerCounts[answer];
        }
    }

    // Asignar el paquete recomendado basado en la respuesta más seleccionada
    let recommendedPackage = '';

    switch (mostSelectedAnswer) {
        case 'answer1':
            recommendedPackage = 'Pack 1: Detroit Become Human, Heavy Rain y Beyond: Two Souls';
            break;
        case 'answer2':
            recommendedPackage = 'Pack 2: Uncharted 4, Tomb Raider y God Of War';
            break;
        case 'answer3':
            recommendedPackage = 'Pack 3: GTA 5, Red Dead Redemption 2 y Mafia 2';
            break;
        case 'answer4':
            recommendedPackage = 'Pack 4: Counter Strike, Valorant, Fortnite';
            break;
        default:
            recommendedPackage = 'No se puede recomendar un paquete en este momento';
    }

    // Mostrar la recomendación al usuario (puedes adaptar esto según tus necesidades)
    console.log('Paquete Recomendado:', recommendedPackage);
}

// Ejecutar la función de inicialización al cargar la página
window.onload = function() {
    // Mostrar la primera pregunta
    const firstQuestion = document.querySelector('.question');
    firstQuestion.classList.remove('hidden');
};
