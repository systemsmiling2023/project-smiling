$(() => {
    $('#btn_guardar').on('click', function () {
        guardarMediosConocer();
    });

    $('#btnAddMedioConocer').on('click', function () {
        reiniciarFormulario();
        $('#mediosConocerId').val('');
        $('#mediosConocerModalLabel').html('Nuevo Medio de Información');
        $('#mediosConocerModal').modal('show');
        $('#error_mediosConocer').hide();
        $('#conocer').focus();

    });

    mostrarMediosConocer();

});


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarMediosConocer() {
    $('#bodyMediosConocer').empty();
    $.ajax({
        type: "GET",
        url: "buscarMedio",
        success: function (response) {

            $.each(response.medioConocer, function (key, value) {
                let medioEstado = '';
                if (value['estado'] == 1) {
                    medioEstado = 'ACTIVO';
                } else {
                    medioEstado = 'INACTIVO';
                }
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-globe"></i> &nbsp; &nbsp; ${value['medio'].toUpperCase()} </td>
                        <td>&nbsp; &nbsp; ${medioEstado.toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarMediosConocer(${value['medioId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarMediosConocer(${value['medioId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyMediosConocer').append(contenido);
            });
        }
    });
};

// GUARDAR MEDIOS CONOCER
function guardarMediosConocer() {
    if ($('#conocer').val() == "") {
        error_mediosConocer = 'Por favor introduce un medio de información';
        $('#error_mediosConocer').show();
        $('#error_mediosConocer').text(error_mediosConocer);
    } else if (isNaN($('#nombres').val())) {

        // Si el tipoDocumentoId viene vacío es porque es agregar
        if ($('#mediosConocerId').val() == "") {
            url = "almacenarConocer";
            data = {
                medioConocer: $('#conocer').val(),
                estadoConocer: $('#estadoMediosConocer').val()
            };
        } else {
            url = "actualizarMediosConocer";
            data = {
                id: $('#mediosConocerId').val(),
                medioConocer: $('#conocer').val(),
                estadoConocer: $('#estadoMediosConocer').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                if (response.ERROR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.data,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    $('#mediosConocerModal').modal('hide');
                    $('#mediosConocerModal').find('input').val('');
                    mostrarMediosConocer();
                }
            }
        });

    } else {
        error_mediosConocer = 'No se aceptan numeros';
        $('#error_mediosConocer').text(error_mediosConocer);
    }
};

function actualizarMediosConocer(id) {
    $.ajax({
        url: "obtenerIdConocer",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#mediosConocerModalLabel').html('Editar Medio de Información');
            $('#mediosConocerId').val(id);
            $('#conocer').val(response.medioConocer.medio);
            $('#estadoMediosConocer').val(response.medioConocer.estado);
            $('#mediosConocer').focus();
            $('#mediosConocerModal').modal('show');
        }
    });
};

function eliminarMediosConocer(id) {
    Swal.fire({
        title: '¿Está seguro?',
        text: "Esta acción no podrá revertirse",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#283747',
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "eliminarMediosConocer",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarMediosConocer();
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                }
            });
        }
    });
};

function reiniciarFormulario() {
    $('#frmAgregarMediosConocer').trigger('reset');
    $('#conocer').focus();
};

