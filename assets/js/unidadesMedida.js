$(() => {
    $('#btn_guardar').on('click', function () {
        guardarUnidadMedida();
    });

    $('#btnAddUnidadesMedida').on('click', function () {
        $('#error_unidadMedida').hide();
        reiniciarFormulario();
        $('#unidaMedidaId').val('');
        $('#unidadMedidaModalLabel').html('Nueva Unidad de Medida');
        $('#unidadMedidaModal').modal('show');

    });

    mostrarUnidadesMedida();

});


function guardarUnidadMedida() {
    $('#error_unidadMedida').show();
    if ($('#unidadMedida').val() == "") {
        error_unidadMedida = 'Por favor introduce una unidad de medida';
        $('#error_unidadMedida').text(error_unidadMedida);
    } else if ($('#abreviatura').val() == "") {
            error_unidadMedida = 'Por favor introduce una abreviatura a la unidad de medida';
            $('#error_unidadMedida').text(error_unidadMedida);
    } else if (isNaN($('#unidadMedida').val()) && isNaN($("#abreviatura").val())) {

        if ($('#unidaMedidaId').val() == "") {
            url = "almacenarUnidadesMedidas";
            data = { unidadMedida: $('#unidadMedida').val(),
                     abreviatura: $('#abreviatura').val(),
                     sistemaMedida:  $('#tipoMedida').val()       
            };
        } else {
            url = "actualizarUnidadesMedidas";
            data = {
                id: $('#unidaMedidaId').val(),
                unidadMedida: $('#unidadMedida').val(),
                abreviatura: $('#abreviatura').val(),
                sistemaMedida:  $('#tipoMedida').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            dataType: 'json',
            type: "POST",
            success: function (response) {
                if (response.ERROR) {
                    Swal.fire('ATENCIÓN', response.dato, 'warning');
                } else {
                    $('#unidadMedidaModal').modal('hide');
                    mostrarUnidadesMedida();
                }
            }
        });

    } else {
        error_unidadMedida = 'No se aceptan numeros';
        $('#error_unidadMedida').text(error_unidadMedida);
    }
}

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarUnidadesMedida() {
    $('#bodyUnidadesMedida').empty();
    $.ajax({
        type: "GET",
        url: "mostrarUnidades",
        success: function (response) {
            $.each(response.unidadMedida, function (key, value) {
                let medidaInter = '';
                if (value['medidaInter'] == 1) {
                    medidaInter = 'Medida Internacional';
                } else {
                    medidaInter = 'Conversión personalizada';
                }
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-weight"></i>&nbsp; &nbsp; ${value['unidad'].toUpperCase()} </td>
                        <td>&nbsp; &nbsp; (${(value['abreviatura'].toUpperCase())})</td>
                        <td>&nbsp; &nbsp; ${medidaInter.toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarUMedida(${value['unidadId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarUMedida(${value['unidadId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyUnidadesMedida').append(contenido);
            });
        }
    });
}

function actualizarUMedida(id) {
    $('#error_unidadMedida').hide();
    $.ajax({
        url: "obtenerUnidadesMedida",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#unidadMedidaModalLabel').html('Editar Unidad de Medida');
            $('#unidadMedidaModal').modal('show');
            $('#unidaMedidaId').val(id);
            $('#unidadMedida').val(response.unidadMedida.unidad);
            $('#abreviatura').val(response.unidadMedida.abreviatura);
            $('#tipoMedida').val(response.unidadMedida.medidaInter);
        }
    });
}

function eliminarUMedida(id) {
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
                url: "eliminarUnidadMedida",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarUnidadesMedida();
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
    $('#frmUnidadMedida').trigger('reset');
    $('#unidadMedida').focus();
};