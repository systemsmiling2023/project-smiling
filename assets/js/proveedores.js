$(() => {
    $('#btn_guardar').on('click', function () {
        guardarProveedor();
    });

    $('#btnAddProveedor').on('click', function () {
        nombreProveedor();
        $('#personaId').empty();
        $('#proveedorId').val('');
        $('#razonSocial').val('');
        $('#proveedorModalLabel').html('Nuevo Proveedor');
        $('#proveedorModal').modal('show');
        

    });

    mostrarProveedor();

});


// GUARDAR EMPLEADO
function guardarProveedor() {
    if (($('#personaId').val() == "") || ($('#razonSocial').val() == "")) {
        console.log('#personaId');
        Swal.fire({
            title: 'Todos los datos son requeridos',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el proveedorId está vacío es agregar
        if ($('#proveedorId').val() == "") {
            url = "almacenarProveedor";
            data = {
                personaId: $('#personaId').val(),
                razonSocial: $('#razonSocial').val()
            };
        } else {
            $('#error_proveedorId').empty();
            url = "actualizarProveedor";
            data = {
                id: $('#proveedorId').val(),
                personaId: $('#personaId').val(),
                razonSocial: $('#razonSocial').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#proveedorModal').modal('hide');
                $('#proveedorModal').find('input').val('');
                mostrarProveedor();
            }
        });
    }
}

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarProveedor() {
    $('#bodyProveedores').empty();
    $.ajax({
        type: "GET",
        url: "buscarProveedor",
        success: function (response) {

            $.each(response.proveedorId, function (key, value) {
                let nombrePersona = value['nombres'] + " " + value['primerApellido'];
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td value="${value['personaId']}" id="test"><i class="fas fa-user"></i> &nbsp; &nbsp; ${nombrePersona}</td>
                        <td>&nbsp; &nbsp; ${value['razonSocial']} </td>
                        <td class="text-center">
                            <button onclick="actualizarProveedor(${value['proveedorId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarProveedor(${value['proveedorId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
                $('#bodyProveedores').append(contenido);
            });
        }
    });
}

function actualizarProveedor(id) {
    nombreProveedor();
    $.ajax({
        url: "obtenerProveedorId",
        data: { id: id },
        type: "POST",
        success: function (response) {

            $('#proveedorModalLabel').html('Editar Proveedor');
            $('#proveedorId').val(id);
            $('#personaId').val(response.proveedorId.personaId);
            $('#razonSocial').val(response.proveedorId.razonSocial);
            $('#proveedorModal').modal('show');
        }
    });
}

function eliminarProveedor(id) {
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
                url: "eliminarProveedor",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarProveedor();
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

function nombreProveedor() {
    $('#personaId').empty();
    $.ajax({
        type: "GET",
        url: "NombreProveedor",
        success: function (response) {

            $.each(response.personaId, function (key, value) {
                if (key == 0) {
                    let op = '<option value="0">Seleccione proveedor...</option>';
                    $('#personaId').append(op);
                }
                let selectProveedor = `<option value="${value['personaId']}">${value['nombres']} &nbsp; ${value['primerApellido']} &nbsp; ${value['segundoApellido']} &nbsp;</option>`
                $('#personaId').append(selectProveedor);
            });
        }
    });
}

