// juegosAdmin.js

function generarFormulario() {
    // Obtener el contenedor donde se insertará el formulario
    const container = document.getElementById('gameFormContainer');

    // Crear el formulario y sus elementos
    const form = document.createElement('form');
    form.setAttribute('id', 'gameForm');

    const nombreInput = document.createElement('input');
    nombreInput.setAttribute('type', 'text');
    nombreInput.setAttribute('name', 'nombre');
    nombreInput.setAttribute('placeholder', 'Nombre del juego');

    const imagenInput = document.createElement('input');
    imagenInput.setAttribute('type', 'file');
    imagenInput.setAttribute('name', 'imagen');
    imagenInput.setAttribute('accept', 'image/*'); // Aceptar solo archivos de imagen

    const submitButton = document.createElement('button');
    submitButton.setAttribute('type', 'button');
    submitButton.textContent = 'Guardar';
    submitButton.addEventListener('click', guardarJuego);

    // Agregar los elementos al formulario
    form.appendChild(nombreInput);
    form.appendChild(document.createElement('br')); // Salto de línea
    form.appendChild(imagenInput);
    form.appendChild(document.createElement('br')); // Salto de línea
    form.appendChild(submitButton);

    // Limpiar el contenedor antes de agregar el formulario (en caso de que ya haya otro)
    container.innerHTML = '';

    // Agregar el formulario al contenedor
    container.appendChild(form);
}



function guardarJuego() {
    // Obtener los datos del formulario
    const nombre = document.querySelector('input[name="nombre"]').value;
    const imagenFile = document.querySelector('input[name="imagen"]').files[0]; // Obtener el primer archivo seleccionado

    if (!nombre || !imagenFile) {
        alert('Por favor, completa todos los campos');
        return;
    }

    // Crear un objeto FormData para enviar los datos (incluyendo la imagen)
    const formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('imagen', imagenFile);

    // Ejemplo de cómo enviar los datos al servidor usando fetch y FormData
    fetch('/bievenida/juegosAdmin', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        // Puedes realizar otras acciones después de guardar el juego
    })
    .catch(error => {
        console.error('Error al guardar el juego:', error);
    });
}

// Asociar la función `generarFormulario` al evento click del botón
document.getElementById('addGameButton').addEventListener('click', generarFormulario);
