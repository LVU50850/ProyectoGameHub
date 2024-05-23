let currentQuestionIndex = 1;

function showNextQuestion(response) {
    // Ocultar pregunta actual
    document.getElementById(`question${currentQuestionIndex}`).classList.add('hidden');

    // Mostrar siguiente pregunta según la respuesta
    if (currentQuestionIndex === 1) {
        if (response === 'si') {
            currentQuestionIndex = 2; // Mostrar preguntas para quienes han jugado videojuegos
        } else if (response === 'no') {
            currentQuestionIndex = 4; // Mostrar preguntas para quienes no han jugado videojuegos
        }
    } else {
        currentQuestionIndex++; // Mostrar la siguiente pregunta
    }

    // Mostrar la siguiente pregunta
    document.getElementById(`question${currentQuestionIndex}`).classList.remove('hidden');
}

function showPreviousQuestion() {
    if (currentQuestionIndex > 1) {
        // Ocultar pregunta actual
        document.getElementById(`question${currentQuestionIndex}`).classList.add('hidden');

        // Mostrar pregunta anterior
        currentQuestionIndex--;
        document.getElementById(`question${currentQuestionIndex}`).classList.remove('hidden');
    }
}
