document.addEventListener('DOMContentLoaded', () => {
    let currentQuestionIndex = 0;
    let currentCategory = null;
    const submitButton = document.getElementById('submit-test');

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
    submitButton.addEventListener('click', () => {
        const answers = document.querySelectorAll('input[type="radio"]:checked');
        const answerCounts = [0, 0, 0, 0];

        answers.forEach(answer => {
            const value = parseInt(answer.classList[0].replace('respuesta', ''));
            answerCounts[value - 1]++;
        });

        const maxCount = Math.max(...answerCounts);
        const mostSelected = answerCounts.indexOf(maxCount) + 1;

        fetch('/submit-test', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ mostSelected })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Test enviado con éxito!');
            } else {
                alert('Hubo un error al enviar el test.');
            }
        });

});
