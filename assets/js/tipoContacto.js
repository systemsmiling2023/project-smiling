$(() => {
    $('#btn_guardar').on('click', function () {
        guardarTipocont();
    });

    $('#btnAddTipoCont').on('click', function () {
        reiniciarFormulario();
        $('#tipoContactoId').val('');
        $('#tipocontModalLabel').html('Nuevo Tipo Contacto');
        $('#tipocontModal').modal('show');
        $('#tipoContacto').focus();

    });

    mostrarTipocont();

});


// GUARDAR TIPO DE CONTACTO
function guardarTipocont() {
    if ($('#tipoContacto').val() == "") {
        error_tipoContacto = 'Por favor introduzca un nombre';
        $('#error_tipoContacto').text(error_tipoContacto);
    } else {

        // Si el tipoContactoId viene vacío es porque es agregar
        if ($('#tipoContactoId').val() == "") {
            url = "create";
            data = { tipoContacto: $('#tipoContacto').val() };
        } else {
            url = "update";
            data = {
                id: $('#tipoContactoId').val(),
                tipoContacto: $('#tipoContacto').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#tipocontModal').modal('hide');
                $('#tipocontModal').find('input').val('');
                mostrarTipocont();
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarTipocont() {
    $('#bodyTipoContacto').empty();
    $.ajax({
        type: "GET",
        url: "lookup",
        success: function (response) {
            // console.log(response);

            $.each(response.tipoContacto, function (key, value) {

                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-comments"></i> &nbsp; &nbsp; ${value['tipoContacto'].toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarTipocont(${value['tipoContId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarTipocont(${value['tipoContId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyTipoContacto').append(contenido);
            });
        }
    });
}

function actualizarTipocont(id) {
    $.ajax({
        url: "getId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#tipocontModalLabel').html('Editar Tipo Contacto');
            $('#tipoContactoId').val(id);
            $('#tipoContacto').val(response.tipoContacto.tipoContacto);
            $('#tipoContacto').focus();
            $('#tipocontModal').modal('show');
        }
    });
}


function eliminarTipocont(id) {
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
                url: "delete",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarTipocont();
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                }
            });
        }
    });
}

function reiniciarFormulario() {
    $('#frmTipoContacto').trigger('reset');
    $('#tipoContacto').focus();
};
