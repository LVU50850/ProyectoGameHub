function showNextQuestion() {
    const questions = document.querySelectorAll('.question');
    const currentQuestion = document.querySelector('.question:not(.shown)');

    if (currentQuestion) {
        currentQuestion.classList.add('shown');
    }
}
