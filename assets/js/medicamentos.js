$(() => {
    $('#btn_guardar').on('click', function () {
        guardarMedicamento();
    });

    $('#btnAddMedicamento').on('click', function () {
        $('#medicamentoId').val('');
        $('#medicamentoModalLabel').html('Nuevo Medicamento');
        $('#medicamentoModal').modal('show');
        //$('#error_medicamento').hide();
        $('#medicamento').focus();

    });

    mostrarMedicamentos();

});

// GUARDAR EMPLEADO
function guardarMedicamento() {
    if (($('#medicamento').val() == "")) {
        //console.log($('#medicamento').val());
        Swal.fire({
            title: 'Escriba Nombre Medicamento',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el medicamentoId está vacío es agregar
        if ($('#medicamentoId').val() == "") {
            url = "almacenarMedicamento";
            data = { medicamento: $('#medicamento').val() };
        } else {
            $('#error_medicamentoId').empty();
            url = "actualizarMedicamento";
            data = {
                id: $('#medicamentoId').val(),
                medicamento: $('#medicamento').val()
            };
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#medicamentoModal').modal('hide');
                $('#medicamentoModal').find('input').val('');
                mostrarMedicamentos();
            }
        });
    }
}

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarMedicamentos() {
    $('#bodyMedicamentos').empty();
    $.ajax({
        type: "GET",
        url: "buscarMedicamento",
        success: function (response) {

            $.each(response.medicamentoId, function (key, value) {
                
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['medicamento']}</td>
                        <td class="text-center">
                            <button onclick="actualizarMedicamento(${key})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarMedicamento(${key})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
                $('#bodyMedicamentos').append(contenido);
            });
        }
    });
}

function actualizarMedicamento(id) {
    $.ajax({
        url: "obtenerMedicamentoId",
        data: { id: id },
        type: "POST",
        success: function (response) {

            $('#medicamentoModalLabel').html('Editar Medicamento');
            $('#medicamentoId').val(id);
            $('#medicamento').val(response.medicamentoId.medicamentoId);
            $('#proveedorModal').modal('show');
        }
    });
}

function eliminarMedicamento(id) {
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
                url: "eliminarMedicamento",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarMedicamentos();
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


