// test.js

let answerCounts = {
    respuesta1: 0,
    respuesta2: 0,
    respuesta3: 0,
    respuesta4: 0
};

document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.question');
    const initialNextButton = document.querySelector('.question .next-button');
    const playedQuestionsContainer = document.querySelector('.played-questions');
    const notPlayedQuestionsContainer = document.querySelector('.not-played-questions');
    let currentQuestionIndex = 0;

    function showNextQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        const selectedAnswer = currentQuestion.querySelector('input[type="radio"]:checked');

        if (!selectedAnswer) {
            alert('Por favor, selecciona una opción para continuar.');
            return;
        }

        const nextQuestion = currentQuestion.nextElementSibling;

        if (nextQuestion && !nextQuestion.classList.contains('question')) {
            // Handle logic for the first question's answer (has_played)
            const hasPlayed = selectedAnswer.value;

            if (hasPlayed === 'si') {
                // Mostrar preguntas para usuarios que han jugado videojuegos
                playedQuestionsContainer.classList.remove('hidden');
                playedQuestionsContainer.querySelector('.question').classList.add('active');
            } else {
                // Mostrar preguntas para usuarios que no han jugado videojuegos
                notPlayedQuestionsContainer.classList.remove('hidden');
                notPlayedQuestionsContainer.querySelector('.question').classList.add('active');
            }
        } else if (nextQuestion) {
            // Continue to next question within the same section
            currentQuestion.classList.remove('active');
            currentQuestion.classList.add('hidden');
            nextQuestion.classList.remove('hidden');
            nextQuestion.classList.add('active');
            currentQuestionIndex++;
        }
    }

    initialNextButton.addEventListener('click', showNextQuestion);

    playedQuestionsContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('next-button')) {
            const currentQuestion = playedQuestionsContainer.querySelector('.question.active');
            const selectedAnswer = currentQuestion.querySelector('input[type="radio"]:checked');

            if (!selectedAnswer) {
                alert('Por favor, selecciona una opción para continuar.');
                return;
            }

            const nextQuestion = currentQuestion.nextElementSibling;

            if (nextQuestion) {
                currentQuestion.classList.remove('active');
                currentQuestion.classList.add('hidden');
                nextQuestion.classList.remove('hidden');
                nextQuestion.classList.add('active');
            }
        }
    });

    notPlayedQuestionsContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('next-button')) {
            const currentQuestion = notPlayedQuestionsContainer.querySelector('.question.active');
            const selectedAnswer = currentQuestion.querySelector('input[type="radio"]:checked');

            if (!selectedAnswer) {
                alert('Por favor, selecciona una opción para continuar.');
                return;
            }

            const nextQuestion = currentQuestion.nextElementSibling;

            if (nextQuestion) {
                currentQuestion.classList.remove('active');
                currentQuestion.classList.add('hidden');
                nextQuestion.classList.remove('hidden');
                nextQuestion.classList.add('active');
            }
        }
    });
});


function showPreviousQuestion() {
    const currentQuestion = document.querySelector('.question.active');
    const previousQuestion = currentQuestion.previousElementSibling;

    if (previousQuestion) {
        currentQuestion.classList.remove('active');
        currentQuestion.classList.add('hidden');
        previousQuestion.classList.remove('hidden');
        previousQuestion.classList.add('active');
    }
}

function handleAnswerSelection(answerName) {
    answerCounts[answerName]++;
}

function alClickar() {
    const answers = document.querySelectorAll('input[type="radio"]');
    answers.forEach(answer => {
        if (answer.checked)
            handleAnswerSelection(answer.getAttribute('class'));
    });
    showGames();
}

function showGames() {
    let recommendedGames;

    if (answerCounts.respuesta1 > answerCounts.respuesta2) {
        recommendedGames = "Detroit Become Human, Heavy Rain y Beyond: Two Souls";
    } else if (answerCounts.respuesta2 > answerCounts.respuesta3) {
        recommendedGames = "Uncharted 4, Tomb Raider y God Of War";
    } else if (answerCounts.respuesta3 > answerCounts.respuesta4) {
        recommendedGames = "GTA 5, Red Dead Redemption 2 y Mafia 2";
    } else {
        recommendedGames = "Counter Strike, Valorant, Fortnite";
    }

    const userId = window.location.pathname.split('/').pop();

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/subirJuegos/${userId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ juegos: recommendedGames })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
    })
    .catch(error => {
        console.error('Error al enviar los juegos recomendados:', error);
    });
}
