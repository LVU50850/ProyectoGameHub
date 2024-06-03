// test.js

let currentQuestionIndex = 0;
const questions = document.querySelectorAll('.question');
const submitButton = document.getElementById('submit-test');

// Mostrar la siguiente pregunta
function showNextQuestion() {
    if (currentQuestionIndex < questions.length - 1) {
        questions[currentQuestionIndex].classList.remove('active');
        currentQuestionIndex++;
        questions[currentQuestionIndex].classList.add('active');
    }
}

// Mostrar la pregunta anterior
function showPreviousQuestion() {
    if (currentQuestionIndex > 0) {
        questions[currentQuestionIndex].classList.remove('active');
        currentQuestionIndex--;
        questions[currentQuestionIndex].classList.add('active');
    }
}

// Añadir event listeners a los botones de siguiente y anterior
document.querySelectorAll('.next-button').forEach(button => {
    button.addEventListener('click', showNextQuestion);
});

document.querySelectorAll('.prev-button').forEach(button => {
    button.addEventListener('click', showPreviousQuestion);
});

// Recopilar las respuestas del usuario y enviarlas al servidor
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

// Mostrar la primera pregunta
questions[currentQuestionIndex].classList.add('active');
