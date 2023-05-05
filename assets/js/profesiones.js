$(() => {
    $('#btn_guardar').on('click', function () {
        guardarProfesion();
    });

    $('#btnAddProfesion').on('click', function () {
        reiniciarFormulario();
        $('#profesionId').val('');
        $('#profesionesModalLabel').html('Nueva Profesión');
        $('#profesionesModal').modal('show');
        $('#txtProfesion').focus();

    });

    mostrarProfesiones();

});


// GUARDAR PROFESION
function guardarProfesion() {
    if ($('#txtProfesion').val() == "") {
        error_profesion = 'Por favor introduce una profesión';
        $('#error_profesion').text(error_profesion);
    } else {

        // Si el profesionId viene vacío es porque es agregar
        if ($('#profesionId').val() == "") {
            url = "almacenarProfesion";
            data = { profesion: $('#txtProfesion').val() };
        } else {
            url = "actualizarProfesion";
            data = {
                id: $('#profesionId').val(),
                profesion: $('#txtProfesion').val()
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
                    $('#profesionesModal').modal('hide');
                    $('#profesionesModal').find('input').val('');
                    mostrarProfesiones();
                }
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarProfesiones() {
    $('#bodyProfesiones').empty();
    $.ajax({
        type: "GET",
        url: "buscarProfesion",
        success: function (response) {

            $.each(response.profesiones, function (key, value) {

                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-tools"></i> &nbsp; &nbsp; ${value['profesion'].toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarProfesion(${value['profesionId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarProfesion(${value['profesionId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyProfesiones').append(contenido);
            });
        }
    });
}

function actualizarProfesion(id) {
    $.ajax({
        url: "obtenerProfesionId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#profesionesModalLabel').html('Editar Profesión');
            $('#profesionId').val(id);
            $('#txtProfesion').val(response.profesion.profesion);
            $('#txtProfesion').focus();
            $('#profesionesModal').modal('show');
        }
    });
}


function eliminarProfesion(id) {
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
                url: "eliminarProfesion",
                data: { id: id },
                dataType: 'json',
                type: "POST",
                success: function (response) {
                    if (response.ERROR) {
                        Swal.fire('ATENCIÓN', response.dato, 'warning');
                    } else {
                        mostrarProfesiones();
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
    $('#frmProfesiones').trigger('reset');
    $('#txtProfesion').focus();
};

