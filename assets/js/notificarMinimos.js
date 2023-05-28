$(document).ready(function() {
    // Obtener las notificaciones mediante AJAX
    $.ajax({
        url: 'obtenerNotificaciones',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var notificaciones = response;
            var notificacionContador = 0;

            // Recorrer las notificaciones y generar los elementos en el dropdown
            $.each(notificaciones, function(index, notificacion) {
                // Crear el elemento de notificación
                var elementoNotificacion = $('<a>', {
                    class: 'dropdown-item',
                    href: '#'  //esta referencia se puede sustituir por la ruta ya sea de existencias o compras
                });

                // Agregar el contenido de la notificación
                elementoNotificacion.html('<i class="fas fa-exclamation-circle mr-2"></i>' + notificacion.insumo + ' necesita reabastecimiento.');

                // Agregar la notificación al dropdown
                $('#notificaciones-lista').append(elementoNotificacion);

                notificacionContador++;
            });

            // Actualizar el contador de notificaciones
            $('#notificacion-contador').text(notificacionContador);
        }
    });
});