$(() => {
    $('#btn_guardar').on('click', function () {
        guardarConversion();
    });

    $('#btnAddConversion').on('click', function () {
        $('#unidadId').empty();
        nombreUnidad();
        $('#insumoId').empty();
        nombreInsumo();
        $('#uniDetId').val('');
        $('#presentacion').val('');
        $('#factorConversion').val('');
        $('#conversionModalLabel').html('Nueva Conversion');
        $('#conversionModal').modal('show');
        

    });

    mostrarConversion();

});


// GUARDAR CONVERSION
function guardarConversion() {
    if (($('#unidadId').val() == "") || ($('#presentacion').val() == "") || ($('#factorConversion').val() == "") || ($('#insumoId').val() == "")) {
        console.log('#unidadId');
        Swal.fire({
            title: 'Todos los datos son requeridos',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el uniDetId está vacío es agregar
        if ($('#uniDetId').val() == "") {
            url = "almacenarConversion";
            data = {
                unidadId: $('#unidadId').val(),
                presentacion: $('#presentacion').val(),
                factorConversion: $('#factorConversion').val(),
                insumoId: $('#insumoId').val()
            };
        } else {
            $('#error_uniDetId').empty();
            url = "actualizarConversion";
            data = {
                id: $('#uniDetId').val(),
                unidadId: $('#unidadId').val(),
                presentacion: $('#presentacion').val(),
                factorConversion: $('#factorConversion').val(),
                insumoId: $('#insumoId').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#conversionModal').modal('hide');
                $('#conversionModal').find('input').val('');
                mostrarConversion();
            }
        });
    }
}

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarConversion() {
    $('#bodyConversiones').empty();
    $.ajax({
        type: "GET",
        url: "buscarConversion",
        success: function (response) {

            $.each(response.uniDetId, function (key, value) {
                
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td value="${value['unidadId']}" id="test"><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['unidad']}</td>
                        <td>&nbsp; &nbsp; ${value['presentacion']} </td>
                        <td>&nbsp; &nbsp; ${value['factorConversion']} </td>
                        <td value="${value['insumoId']}" id="test"><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['insumo']}</td>
                        <td class="text-center">
                            <button onclick="actualizarConversion(${value['uniDetId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarConvers(${value['uniDetId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
                $('#bodyConversiones').append(contenido);
            });
        }
    });
}

function actualizarConversion(id) {
    nombreUnidad();
    
    $.ajax({
        url: "obtenerConversionId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            console.log(response);
            $('#conversionModalLabel').html('Editar Conversion');
            $('#uniDetId').val(id);
            $('#unidadId').val(response.uniDetId.unidadId);
            $('#presentacion').val(response.uniDetId.presentacion);
            $('#factorConversion').val(response.uniDetId.factorConversion);
            $('#insumoId').val(response.uniDetId.insumoId);
            $('#conversionModal').modal('show');
        }
    });
}

function eliminarConvers(id) {
    console.log(id);
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
                url: "eliminarConversion",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarConversion();
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

function nombreUnidad() {
    $('#unidadId').empty();
    $.ajax({
        type: "GET",
        url: "NombreUnidad",
        success: function (response) {

            $.each(response.unidadId, function (key, value) {
                if (key == 0) {
                    let op = '<option value="0">Seleccione Unidad...</option>';
                    $('#unidadId').append(op);
                }
                let selectUnidad = `<option value="${value['unidadId']}">${value['unidad']} &nbsp; </option>`
                $('#unidadId').append(selectUnidad);
            });
        }
    });
}

function nombreInsumo() {
    $('#insumoId').empty();
    $.ajax({
        type: "GET",
        url: "NombreInsumo",
        success: function (response) {

            $.each(response.insumoId, function (key, value) {
                if (key == 0) {
                    let op = '<option value="0">Seleccione Insumo...</option>';
                    $('#insumoId').append(op);
                }
                let selectInsumo = `<option value="${value['insumoId']}">${value['insumo']} &nbsp; </option>`
                $('#insumoId').append(selectInsumo);
            });
        }
    });
}

