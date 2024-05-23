function showNextQuestion() {
    const currentQuestion = document.querySelector('.question:not(.shown)');

    if (currentQuestion) {
        currentQuestion.classList.remove('hidden');
        currentQuestion.classList.add('shown');
    }
}
