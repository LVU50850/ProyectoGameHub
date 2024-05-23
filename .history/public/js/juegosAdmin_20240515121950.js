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
    imagenInput.setAttribute('type', 'text');
    imagenInput.setAttribute('name', 'imagen');
    imagenInput.setAttribute('placeholder', 'URL de la imagen');

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
    // Aquí puedes implementar la lógica para enviar los datos del juego al servidor (por ejemplo, mediante AJAX)
    const nombre = document.querySelector('input[name="nombre"]').value;
    const imagen = document.querySelector('input[name="imagen"]').value;

    // Ejemplo de cómo mostrar los datos en la consola
    console.log('Nombre del juego:', nombre);
    console.log('URL de la imagen:', imagen);

}

// Asociar la función `generarFormulario` al evento click del botón
document.getElementById('addGameButton').addEventListener('click', generarFormulario);
