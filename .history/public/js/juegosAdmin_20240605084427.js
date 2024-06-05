// juegosAdmin.js

function generarFormulario() {
    // Obtener el contenedor donde se insertará el formulario
    const container = document.getElementById('gameFormContainer');

    // Crear el formulario y sus elementos
    const form = document.createElement('form');
    form.setAttribute('id', 'gameForm');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', '/bienvenida/juegosAdminJuego');
    form.setAttribute('enctype', 'multipart/form-data');

    const csrfToken = document.createElement('input');
    csrfToken.setAttribute('type', 'hidden');
    csrfToken.setAttribute('name', '_token');
    csrfToken.setAttribute('value', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    const nombreInput = document.createElement('input');
    nombreInput.setAttribute('type', 'text');
    nombreInput.setAttribute('name', 'nombre');
    nombreInput.setAttribute('placeholder', 'Nombre del juego');

    const descripcionInput = document.createElement('textarea');
    descripcionInput.setAttribute('name', 'descripcion');
    descripcionInput.setAttribute('placeholder', 'Descripción del juego');

    const imagenInput = document.createElement('input');
    imagenInput.setAttribute('type', 'file');
    imagenInput.setAttribute('name', 'imagen');
    imagenInput.setAttribute('accept', 'image/*');

    const submitButton = document.createElement('input');
    submitButton.setAttribute('type', 'submit');
    submitButton.setAttribute('value', 'Guardar Juego');

    // Agregar los elementos al formulario
    form.appendChild(csrfToken);
    form.appendChild(nombreInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(descripcionInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(imagenInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(submitButton);

    // Limpiar el contenedor antes de agregar el formulario (en caso de que ya haya otro)
    container.innerHTML = '';

    // Agregar el formulario al contenedor
    container.appendChild(form);
}

// Asociar la función `generarFormulario` al evento click del botón
document.getElementById('addGameButton').addEventListener('click', generarFormulario);
