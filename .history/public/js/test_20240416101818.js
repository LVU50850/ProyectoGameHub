function showNextQuestion() {
    const hasPlayed = document.querySelector('input[name="has_played"]:checked').value;

    // Mostrar preguntas correspondientes según la respuesta
    if (hasPlayed === 'si') {
        showQuestions('played_questions');
    } else {
        showQuestions('not_played_questions');
    }
}

function showQuestions(id) {
    const questions = document.querySelectorAll('.question');
    const currentQuestion = document.querySelector(`#${id}`);

    if (currentQuestion) {
        currentQuestion.classList.remove('hidden');
        currentQuestion.classList.add('shown');
    }

    // Ocultar pregunta actual
    questions.forEach(question => {
        if (question !== currentQuestion) {
            question.classList.add('hidden');
            question.classList.remove('shown');
        }
    });
}
