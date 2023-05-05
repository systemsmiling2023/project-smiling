$(() => {
    $('#btn_guardar').on('click', function () {
        guardarCargo();
    });

    $('#btnAddCargo').on('click', function () {
        reiniciarFormulario();
        $('#cargoId').val('');
        $('#cargoModalLabel').html('Nuevo Tipo Cargo');
        $('#cargoModal').modal('show');
        $('#cargo').focus();

    });

    mostrarCargo();

});


// GUARDAR TIPO DE CONTACTO
function guardarCargo() {
    if ($('#cargo').val() == "") {
        error_cargo = 'Por favor introduzca un cargo';
        $('#error_cargo').text(error_cargo);
    } else {

        // Si el cargoId viene vacío es porque es agregar
        if ($('#cargoId').val() == "") {
            url = "almacenarCargo";
            data = { cargo: $('#cargo').val() };
        } else {
            url = "actualizarCargo";
            data = {
                id: $('#cargoId').val(),
                cargo: $('#cargo').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#cargoModal').modal('hide');
                $('#cargoModal').find('input').val('');
                mostrarCargo();
            }
        });
    }
}


// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarCargo() {
    $('#bodyCargo').empty();
    $.ajax({
        type: "GET",
        url: "buscarCargo",
        success: function (response) {
            // console.log(response);

            $.each(response.cargo, function (key, value) {

                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-user-md"></i> &nbsp; &nbsp; ${value['cargo'].toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarCargo(${value['cargoId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarCargo(${value['cargoId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyCargo').append(contenido);
            });
        }
    });
}

function actualizarCargo(id) {
    $.ajax({
        url: "getCargoId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#cargoModalLabel').html('Editar Tipo Cargo');
            $('#cargoId').val(id);
            $('#cargo').val(response.cargo.cargo);
            $('#cargo').focus();
            $('#cargoModal').modal('show');
        }
    });
}


function eliminarCargo(id) {
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
                url: "borrarCargo",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarCargo();
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
    $('#frmCargos').trigger('reset');
    $('#tipoContacto').focus();
};
