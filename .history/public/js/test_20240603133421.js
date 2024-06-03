document.addEventListener('DOMContentLoaded', () => {
    let currentQuestionIndex = 0;
    let currentCategory = null;
    let answersCount = [0, 0, 0, 0]; // Contador para cada tipo de respuesta

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
        document.querySelector(`.${currentCategory}`).classList.remove('hidden');
        showQuestion(0, currentCategory);
    };

    window.showNextQuestion = (category) => {
        const questions = document.querySelectorAll(`.${category} .question`);
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            showQuestion(currentQuestionIndex, category);
        } else {
            submitTest();
        }
    };

    window.showPreviousQuestion = (category) => {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            showQuestion(currentQuestionIndex, category);
        }
    };

    document.getElementById('submit-test').addEventListener('click', () => {
        const maxCount = Math.max(...answersCount);
        const mostSelected = answersCount.indexOf(maxCount) + 1;
        const userId = document.querySelector('input[name="id"]').value;

        fetch(`/submit-test/${userId}`, {
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
        })
        .catch(error => console.error('Error:', error));
    });
});
