document.addEventListener('DOMContentLoaded', () => {
    let currentQuestionIndex = 0;
    let currentCategory = null;

    function showNextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
            questions[currentQuestionIndex].classList.remove('active');
            currentQuestionIndex++;
            questions[currentQuestionIndex].classList.add('active');
        }
    }



    window.handleFirstQuestion = () => {
        const hasPlayed = document.querySelector('input[name="has_played"]:checked').value;
        if (hasPlayed === 'si') {
            currentCategory = 'played-questions';
        } else {
            currentCategory = 'not-played-questions';
        }
        document.querySelector('.question.active').classList.remove('active');
        document.querySelector(`.${currentCategory}`).classList.remove('hidden');
        showQuestion(0, currentCategory);
    };

    window.showNextQuestion = (category) => {
        const questions = document.querySelectorAll(`.${category} .question`);
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            showQuestion(currentQuestionIndex, category);
        }
    };

    window.showPreviousQuestion = (category) => {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            showQuestion(currentQuestionIndex, category);
        }
    };
});
