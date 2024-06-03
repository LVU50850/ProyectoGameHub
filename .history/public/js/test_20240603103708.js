document.addEventListener('DOMContentLoaded', () => {
    let currentQuestionIndex = 0;
    let currentCategory = null;

    function showQuestion(index, category) {
        const questions = document.querySelectorAll(`.${category} .question`);
        questions.forEach((question, i) => {
            question.classList.remove('active');
            if (i === index) {
                question.classList.add('active');
            }
        });
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
    let currentQuestionIndex = 0;
const questions = document.querySelectorAll('.question');
const submitButton = document.getElementById('submit-test');
    function showNextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
            questions[currentQuestionIndex].classList.remove('active');
            currentQuestionIndex++;
            questions[currentQuestionIndex].classList.add('active');
        }
    }

    function showPreviousQuestion() {
        if (currentQuestionIndex > 0) {
            questions[currentQuestionIndex].classList.remove('active');
            currentQuestionIndex--;
            questions[currentQuestionIndex].classList.add('active');
        }
    }
});
