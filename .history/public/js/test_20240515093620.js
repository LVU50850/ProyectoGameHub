// Función para mostrar la siguiente pregunta y gestionar la visibilidad de las secciones
function showNextQuestion() {
    // Obtener la pregunta actual visible
    const currentQuestion = document.querySelector('.question:not(.hidden)');

    // Ocultar la pregunta actual
    currentQuestion.classList.add('hidden');

    // Obtener la respuesta seleccionada
    const selectedAnswer = document.querySelector('input[name="has_played"]:checked');

    if (selectedAnswer) {
        const answerValue = selectedAnswer.value;

        // Mostrar la sección de preguntas correspondiente según la respuesta seleccionada
        if (answerValue === 'si') {
            const playedQuestionsSection = document.querySelector('.played-questions');
            playedQuestionsSection.classList.remove('hidden');
        } else if (answerValue === 'no') {
            const notPlayedQuestionsSection = document.querySelector('.not-played-questions');
            notPlayedQuestionsSection.classList.remove('hidden');
        }
    }
}

// Función para mostrar la pregunta anterior y gestionar la visibilidad de las secciones
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


