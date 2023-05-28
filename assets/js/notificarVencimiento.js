$(()=>{
    caducos();
});

function caducos() {
    // Obtener fecha actual
    var fechaActual = new Date().toLocaleDateString();
    
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
                let comDetId = value['comDetId'];
                let notifAlertas = value['notifAlertas'];
                
                // Verificar si la fecha de caducidad es menor o igual a la fecha actual
                if (fechaCaducidad <= fechaActual && notifAlertas < 4) {
                    // Notificar sobre la caducidad del insumo
                    var mensaje = 'El insumo ' + insumo + ' caducó' + ' el ' + jsDate;
                    //console.log(mensaje);
                    mostrarNotificacion(mensaje, comDetId, notifAlertas);
                } else {
                    var elementoNotificacion = $('<a>', {
                        class: 'dropdown-item',
                        href: 'insumosVencidos'  
                    });
    
                    // Agregar el contenido de la notificación
                    elementoNotificacion.html('<i class="fas fa-exclamation-circle mr-2"></i>' + insumo + ' caducó ' + ' el  ' + jsDate);
    
                    // Agregar la notificación al dropdown
                    $('#notificaciones-lista').append(elementoNotificacion);
    
                    notificacionContador++;
                    $('#notificacion-contador').text(notificacionContador);
                }
            });
        }
    });
}

// Función para mostrar notificación
function mostrarNotificacion(mensaje, comDetId, notifAlertas) {
    Swal.fire({
        title: 'Caducidad de insumo',
        text: mensaje,
        icon: 'warning',
        confirmButtonText: '<i class="fas fa-check"></i> Entendido',
        confirmButtonColor: '#3085d6',
        showCancelButton: true, 
        cancelButtonText: 'Ver insumos caducados',
        cancelButtonColor: '#d33', 
    }).then((result) => {
        if (result.isConfirmed) {
            // Acción cuando se hace clic en el botón "Entendido"
            incrementarContador(comDetId, notifAlertas); // Incrementar contador
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Acción cuando se hace clic en el botón "Ver insumos caducados"
            window.location.href = `insumosVencidos`; 
            //incrementarContador(comDetId, notifAlertas); // Incrementar contador
        }
    });
}

// Función para incrementar el contador
function incrementarContador(id, notifAlertas) {
    $.ajax({
        type: "POST",
        data: {
            id: id,
            notifAlertas:notifAlertas
        },
        url: "incrementarContadorAlertas", 
        success: function (response) {
            console.log('Contador incrementado');
        }
    });
}


