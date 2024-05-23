const answerCounts = {
    answer1: 0,
    answer2: 0,
    answer3: 0,
    answer4: 0
};

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

function registerAnswer(answer) {
    // Incrementar el contador de la respuesta seleccionada
    answerCounts[answer]++;
}

// Función para obtener el paquete de juegos recomendado
function getRecommendedPackage() {
    // Determinar la respuesta con más selecciones
    let mostSelectedAnswer = '';
    let maxSelections = 0;

    for (const answer in answerCounts) {
        if (answerCounts[answer] > maxSelections) {
            mostSelectedAnswer = answer;
            maxSelections = answerCounts[answer];
        }
    }

    // Asignar el paquete recomendado basado en la respuesta más seleccionada
    let recommendedPackage = '';

    switch (mostSelectedAnswer) {
        case 'answer1':
            recommendedPackage = 'Pack 1: Detroit Become Human, Heavy Rain y Beyond: Two Souls';
            break;
        case 'answer2':
            recommendedPackage = 'Pack 2: Uncharted 4, Tomb Raider y God Of War';
            break;
        case 'answer3':
            recommendedPackage = 'Pack 3: GTA 5, Red Dead Redemption 2 y Mafia 2';
            break;
        case 'answer4':
            recommendedPackage = 'Pack 4: Counter Strike, Valorant, Fortnite';
            break;
        default:
            recommendedPackage = 'No se puede recomendar un paquete en este momento';
    }

    return recommendedPackage;
}

// Ejemplo de uso: registrar la respuesta seleccionada por el usuario
registerAnswer('answer1'); // Por ejemplo, aquí registrarías la selección de respuesta
