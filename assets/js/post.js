$(document).ready(function () {
    // Carga los posts al cargar la página
    cargarPosts();

    // Filtra los posts según el nombre cuando se escribe en el campo de búsqueda
    $('#searchInput').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        var found = false;
        $('.post').each(function () {
            var postName = $(this).find('td:first').text().toLowerCase();
            if (postName.includes(searchText)) {
                $(this).show();
                found = true;
            } else {
                $(this).hide();
            }
        });

        // Si no se encontraron resultados, mostrar mensaje
        if (!found) {
            $('#noResults').show();
        } else {
            $('#noResults').hide();
        }
    });
});


// Función para cargar y filtrar los posts
function cargarPosts() {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#lista-posts').empty();
            var found = false;

            // Recorre los datos y agrega cada post al contenedor
            $.each(data, function (index, post) {

                var contador = index + 1;

                $('#lista-posts').append('<tr class="post">' +
                    '<td>' + contador + '</td>' +
                    '<td>' + post.nombre + '</td>' +
                    '<td>' + post.autor + '</td>' +
                    '<td>' + post.message + '</td>' +
                    '</tr>');

                found = true; // Se encontraron resultados
            });

            // Si no se encontraron resultados, mostrar mensaje
            if (!found) {
                $('#noResults').show();
            } else {
                $('#noResults').hide();
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los posts:', error);
        }
    });
}

// Evento clic del botón "Guardar"
$(document).on('click', '.btn-guardar-bookmark', function () {
    // Obtener el idPost del botón clickeado
    var idPost = $(this).data('id');

    // Mostrar el mensaje de confirmación
    if (confirm('¿Desea guardar el "Bookmark"?')) {
        // Llamar a la función para guardar el "Bookmark" y pasar el idPost como parámetro
        guardarBookmark(idPost);
    }
});

// Función para guardar el "Bookmark"
function guardarBookmark(idPost) {

    $('#alertContainer').empty(); // Limpiar todos los mensajes anteriores

    // Realizar la petición AJAX al controlador para guardar el "Bookmark"
    $.ajax({
        url: url_guardar,
        type: 'POST',
        dataType: 'json',
        data: { id_post: idPost }, // Enviar el idPost al controlador
        success: function (response) {
            // Manejar la respuesta del controlador
            if (response.status === 200) {

                showAlert('success', response.msg, document.getElementById('alertContainer'));

                // Volver a cargar los posts actualizados
                cargarPosts();

            } else {
                // Mostrar mensaje de error si hay algún problema
                showAlert('warning', response.msg, document.getElementById('alertContainer'));

            }
        },
        error: function (xhr, status, error) {
            // Manejar los errores de la petición AJAX
            console.error('Error al guardar el "Bookmark":', error);
            showAlert('danger', 'Ha ocurrido un error al guardar el "Bookmark". Por favor, inténtelo de nuevo.', document.getElementById('alertContainer'));

        }
    });
}


