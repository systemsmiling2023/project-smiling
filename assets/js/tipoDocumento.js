$(() => {
    $('#btn_guardar').on('click', function () {
        guardarTipodoc();
    });

    $('#btnAddTipoDoc').on('click', function () {
        reiniciarFormulario();
        $('#tipoDocumentoId').val('');
        $('#tipodocModalLabel').html('Nuevo Tipo Documento');
        $('#tipodocModal').modal('show');
        $('#tipoDocumento').focus();

    });

    mostrarTipodoc();

});


// GUARDAR TIPO DE DOCUMENTO
function guardarTipodoc() {
    if ($('#tipoDocumento').val() == "") {
        error_tipoDocumento = 'Por favor introduce un nombre';
        $('#error_tipoDocumento').text(error_tipoDocumento);
    } else {

        // Si el tipoDocumentoId viene vacío es porque es agregar
        if ($('#tipoDocumentoId').val() == "") {
            url = "almacenar";
            data = { tipoDocumento: $('#tipoDocumento').val() };
        } else {
            url = "actualizar";
            data = {
                id: $('#tipoDocumentoId').val(),
                tipoDocumento: $('#tipoDocumento').val()
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
                    $('#tipodocModal').modal('hide');
                    $('#tipodocModal').find('input').val('');
                    mostrarTipodoc();
                }
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarTipodoc() {
    $('#bodyTipoDocumentos').empty();
    $.ajax({
        type: "GET",
        url: "buscar",
        success: function (response) {
            // console.log(response);

            $.each(response.tipoDocumento, function (key, value) {

                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-id-card"></i> &nbsp; &nbsp; ${value['tipoDocumento'].toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarTipodoc(${value['tipoDocId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarTipodoc(${value['tipoDocId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyTipoDocumentos').append(contenido);
            });
        }
    });
}

function actualizarTipodoc(id) {
    $.ajax({
        url: "obtenerId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#tipodocModalLabel').html('Editar Tipo Documento');
            $('#tipoDocumentoId').val(id);
            $('#tipoDocumento').val(response.tipoDocumento.tipoDocumento);
            $('#tipoDocumento').focus();
            $('#tipodocModal').modal('show');
        }
    });
}


function eliminarTipodoc(id) {
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
                url: "eliminar",
                data: { id: id },
                dataType: 'json',
                type: "POST",
                success: function (response) {
                    if (response.ERROR) {
                        Swal.fire('ATENCIÓN', response.dato, 'warning');
                    } else {
                        mostrarTipodoc();
                        Swal.fire(
                            '¡Hecho!',
                            'Elemento eliminado con éxito',
                            'success'
                        );
                    }
                }
            });
        }
    });
}

function reiniciarFormulario() {
    $('#frmTipoDocumentos').trigger('reset');
    $('#tipoDocumento').focus();
};

