$(()=>{
    caducos();
});

function caducos() {
    // Obtener fecha actual
    var fechaActual = new Date().toLocaleDateString();
    console.log(fechaActual);
    // Obtener todos los insumos con fecha de caducidad
    $.ajax({
        type: "GET",
        url: "notificarCaducidad",
        success: function (response) {
            //console.log(response);
            // Iterar sobre los insumos
            $.each(response.insumo, function (key, value) {
                // Convertir fecha de caducidad a objeto Date
                let fecha = value['fechaCaducidad'];
                let date = fecha.replace(/[-]/g, '/');
                let jsDate = new Date(date).toLocaleDateString();
                var fechaCaducidad = new Date(jsDate).toLocaleDateString();
                let insumo = value['insumo'];
                //console.log(fechaCaducidad);
                // Verificar si la fecha de caducidad es menor o igual a la fecha actual
                if (fechaCaducidad <= fechaActual) {
                    // Notificar sobre la caducidad del insumo
                    
                    var mensaje = 'El insumo ' + insumo + ' ha caducado' + ' el pasado ' + jsDate;
                    //console.log(mensaje);
                    mostrarNotificacion(mensaje);
                }
            });
        }
    });
}

// Función para mostrar notificación
function mostrarNotificacion(mensaje) {
    Swal.fire({
        title: 'Caducidad de insumo',
        text: mensaje,
        icon: 'warning',
        confirmButtonText: '<i class="fas fa-check"></i> Entendido',
        confirmButtonColor: '#3085d6',
    });
}


