$(() => {
    $('#btn_guardar').on('click', function () {
        guardarInteres();
    });

    $('#btnAddInteres').on('click', function () {
        reiniciarFormulario();
        $('#interesId').val('');
        $('#interesModalLabel').html('Nuevo Interes o Gusto');
        $('#interesModal').modal('show');
        $('#txtIntereses').focus();

    });

    mostrarIntereses();

});


// GUARDAR INTERES
function guardarInteres() {
    if ($('#txtIntereses').val() == "") {
        error_interes = 'Por favor introduce un interés o gusto';
        $('#error_interes').text(error_interes);
    } else {

        // Si el interesId viene vacío es porque es agregar
        if ($('#interesId').val() == "") {
            url = "almacenarInteres";
            data = { nombreInteres: $('#txtIntereses').val() };
        } else {
            url = "actualizarInteres";
            data = {
                id: $('#interesId').val(),
                nombreInteres: $('#txtIntereses').val()
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
                    $('#interesModal').modal('hide');
                    $('#interesModal').find('input').val('');
                    mostrarIntereses();
                }
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarIntereses() {
    $('#bodyIntereses').empty();
    $.ajax({
        type: "GET",
        url: "buscarInteres",
        success: function (response) {
            // console.log(response);

            $.each(response.intereses, function (key, value) {

                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-heart"></i> &nbsp; &nbsp; ${value['nombreInteres'].toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarInteres(${value['interesId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarInteres(${value['interesId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyIntereses').append(contenido);
            });
        }
    });
}

function actualizarInteres(id) {
    $.ajax({
        url: "obtenerInteresId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#interesModalLabel').html('Editar Interes');
            $('#interesId').val(id);
            $('#txtIntereses').val(response.nombreInteres.nombreInteres);
            $('#txtIntereses').focus();
            $('#interesModal').modal('show');
        }
    });
}


function eliminarInteres(id) {
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
                url: "eliminarInteres",
                data: { id: id },
                type: "POST",
                success: function (response) {

                    if (response.ERROR) {
                        Swal.fire('ATENCIÓN', response.dato, 'warning');
                    } else {
                        mostrarIntereses();
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
    $('#frmIntereses').trigger('reset');
    $('#txtIntereses').focus();
};

