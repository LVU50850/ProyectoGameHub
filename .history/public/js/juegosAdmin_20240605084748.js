function generarFormulario() {
    const container = document.getElementById('gameFormContainer');
    const form = document.createElement('form');
    form.setAttribute('id', 'gameForm');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', '/bienvenida/juegosAdminJuego');
    form.setAttribute('enctype', 'multipart/form-data');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const csrfInput = document.createElement('input');
    csrfInput.setAttribute('type', 'hidden');
    csrfInput.setAttribute('name', '_token');
    csrfInput.setAttribute('value', csrfToken);

    const nombreInput = document.createElement('input');
    nombreInput.setAttribute('type', 'text');
    nombreInput.setAttribute('name', 'nombre');
    nombreInput.setAttribute('placeholder', 'Nombre del juego');
    nombreInput.required = true;

    const descripcionInput = document.createElement('textarea');
    descripcionInput.setAttribute('name', 'descripcion');
    descripcionInput.setAttribute('placeholder', 'Descripcion del juego');
    descripcionInput.required = true;

    const imagenInput = document.createElement('input');
    imagenInput.setAttribute('type', 'file');
    imagenInput.setAttribute('name', 'imagen');
    imagenInput.setAttribute('accept', 'image/*');
    imagenInput.required = true;

    const submitButton = document.createElement('input');
    submitButton.setAttribute('type', 'submit');
    submitButton.setAttribute('value', 'Añadir Juego');

    form.appendChild(csrfInput);
    form.appendChild(nombreInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(descripcionInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(imagenInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(submitButton);

    container.innerHTML = '';
    container.appendChild(form);
}

document.getElementById('addGameButton').addEventListener('click', generarFormulario);
