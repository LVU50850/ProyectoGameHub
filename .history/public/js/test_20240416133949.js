// Función para mostrar la siguiente pregunta y registrar la respuesta seleccionada
function showNextQuestion() {
    // Obtener la pregunta actual visible
    const currentQuestion = document.querySelector('.question:not(.hidden)');

    // Ocultar la pregunta actual
    currentQuestion.classList.add('hidden');

    // Mostrar la siguiente pregunta
    const nextQuestion = currentQuestion.nextElementSibling;
    if (nextQuestion) {
        nextQuestion.classList.remove('hidden');
    }

    // Registrar la respuesta seleccionada (si hay una respuesta seleccionada)
    const selectedAnswer = currentQuestion.querySelector('input[type="radio"]:checked');
    if (selectedAnswer) {
        const answerClass = selectedAnswer.parentNode.className; // Clase de la respuesta seleccionada
        registerAnswer(answerClass); // Llamar a la función para registrar la respuesta
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
    // Ocultar todas las preguntas excepto la primera
    const questions = document.querySelectorAll('.question');
    questions.forEach((question, index) => {
        if (index > 0) {
            question.classList.add('hidden');
        }
    });
};
