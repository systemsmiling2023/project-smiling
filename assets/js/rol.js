$(() => {
    $('#btn_guardar').on('click', function () {
        guardarRol();
    });

    $('#btnAddRol').on('click', function () {
        reiniciarFormulario();
        $('#rolId').val('');
        $('#rolModalLabel').html('Nuevo Rol');
        $('#rolModal').modal('show');
        $('#rol').focus();

    });

    mostrarRol();

});


// GUARDAR TIPO DE DOCUMENTO
function guardarRol() {
    if ($('#rol').val() == "") {
        error_rol = 'Por favor introduce un rol';
        $('#error_rol').text(error_rol);
    } else {

        // Si el rolId viene vacío es porque es agregar
        if ($('#rolId').val() == "") {
            url = "almacenarRol";
            data = {
                rol: $('#rol').val(),
                descripcion: $('#descripcion').val(),
                estado: $('#estado').val()
            };
        } else {
            url = "actualizarRol";
            data = {
                id: $('#rolId').val(),
                rol: $('#rol').val(),
                descripcion: $('#descripcion').val(),
                estado: $('#estado').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#rolModal').modal('hide');
                $('#rolModal').find('input').val('');
                mostrarRol();
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarRol() {
    $('#bodyRoles').empty();
    $.ajax({
        type: "GET",
        url: "buscarRol",
        success: function (response) {
            // console.log(response);

            $.each(response.rol, function (key, value) {
                if (value['estado'] == 1) { estado = "ACTIVO" } else { estado = "INACTIVO" };
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-user-tag"></i> &nbsp; &nbsp; ${value['rol'].toUpperCase()} </td>
                        <td> &nbsp; &nbsp; ${value['descripcion']} </td>
                        <td> &nbsp; &nbsp; ${estado} </td>
                        <td class="text-center">
                            <button onclick="actualizarRol(${value['rolId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarRol(${value['rolId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyRoles').append(contenido);
            });
        }
    });
}

function actualizarRol(id) {
    $.ajax({
        url: "obtenerRolId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#rolModalLabel').html('Editar Rol de Usuario');
            $('#rolId').val(id);
            $('#rol').val(response.rol.rol);
            $('#descripcion').val(response.rol.descripcion);
            $('#rol').focus();
            $('#rolModal').modal('show');
        }
    });
}


function eliminarRol(id) {
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
                url: "eliminarRol",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarRol();
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
    $('#frmRoles').trigger('reset');
    $('#rol').focus();
};


