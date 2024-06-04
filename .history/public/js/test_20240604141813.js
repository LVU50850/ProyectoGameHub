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

    function updateAnswerCount(selectedClass) {
        if (selectedClass.includes('respuesta1')) {
            answersCount[0]++;
        } else if (selectedClass.includes('respuesta2')) {
            answersCount[1]++;
        } else if (selectedClass.includes('respuesta3')) {
            answersCount[2]++;
        } else if (selectedClass.includes('respuesta4')) {
            answersCount[3]++;
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
            const selectedAnswer = document.querySelector(`.${category} .question.active input[type="radio"]:checked`);
            if (selectedAnswer) {
                updateAnswerCount(selectedAnswer.className);
            }

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

    const submitTest = (categoryClass) => {
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
                window.location.href = data.redirectUrl;
            } else {
                alert('Hubo un error al enviar el test.');
            }
        })
        .catch(error => console.error('Error:', error));
    };

    document.querySelectorAll('.submit-test-played').forEach(button => {
        button.addEventListener('click', () => submitTest('played-questions'));
    });

    document.querySelectorAll('.submit-test-not-played').forEach(button => {
        button.addEventListener('click', () => submitTest('not-played-questions'));
    });

});
