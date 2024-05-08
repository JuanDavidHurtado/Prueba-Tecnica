
$(document).ready(function () {
    $('#iniciarUser').submit(function (event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente
        $('#alertContainer').empty(); // Limpiar todos los mensajes anteriores

        // Mostrar el spinner mientras se procesa la solicitud
        $('#loading').css('display', 'block');

        const formData = $(this).serializeArray(); // Recolecta los datos del formulario como un array de objetos

        // Definir el tiempo mínimo de visualización del spinner
        const tiempoMinimoVisualizacion = 2000;

        // Validar que todos los campos estén llenos
        let isValid = true;
        let errorShown = false;

        formData.forEach(function (field) {
            if (!field.value.trim()) {
                isValid = false;
                if (!errorShown) {
                    showAlert('warning', 'Todos los campos son obligatorios.', document.getElementById('alertContainer'));
                    errorShown = true;
                }
            }
        });

        if (!isValid) {
            // Detener el envío del formulario si algún campo está vacío
            $('#loading').css('display', 'none');
            return;
        }

        setTimeout(function () {
            // Realiza una solicitud AJAX al controlador CLogin y metodo login
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(), // Envía los datos serializados nuevamente
                success: function (response) {
                    if (response.status === 200) {
                        // Redirecciona al dashboard si el inicio de sesión es exitoso
                        window.location.href = response.ruta;
                    } else {
                        // Ocultar el spinner después de recibir la respuesta
                        $('#loading').css('display', 'none');
                        showAlert('danger', response.msg, document.getElementById('alertContainer'));
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja los errores, como problemas de red o del servidor
                    // Ocultar el spinner después de recibir la respuesta
                    $('#loading').css('display', 'none');
                    console.error('Error:', error);
                    showAlert('danger', 'Error del servidor. Inténtalo nuevamente.', document.getElementById('alertContainer'));
                }
            });
        }.bind(this), tiempoMinimoVisualizacion);
    });
});

