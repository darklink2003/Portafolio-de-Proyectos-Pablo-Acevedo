// script.js

// 1. Validación de Formularios
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            // Verificar campos vacíos
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault(); // Evitar el envío del formulario si hay errores
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el formulario',
                    text: 'Por favor, completa todos los campos obligatorios.',
                });
            }
        });
    });
});

// 2. Confirmación antes de eliminar un contacto
document.addEventListener('click', (e) => {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Detener el comportamiento predeterminado del enlace

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir al usuario al enlace de eliminación
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
});

// 3. Mensajes de éxito o error tras una acción
function showMessage(message, type = 'success') {
    Swal.fire({
        icon: type,
        title: type === 'success' ? 'Éxito' : 'Error',
        text: message,
    });
}

// Ejemplo: Mostrar un mensaje cuando se agrega un contacto
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    if (success === 'true') {
        showMessage('Contacto agregado correctamente.', 'success');
    } else if (success === 'false') {
        showMessage('Error al agregar el contacto.', 'error');
    }
});