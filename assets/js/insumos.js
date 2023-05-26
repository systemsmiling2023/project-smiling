$(() => {

    $('#btn_guardar').on('click', function () {
        guardarInsumos();
    });

    $('#btnAddInsumos').on('click', function () {
        $('#error_insumos').hide();
        $('#frmInsumos').trigger('reset');
        cargarUnidades();
        $('#insumosId').val('');
        $('#insumosModalLabel').html('Nuevo Insumo');
        $('#insumosModal').modal('show');
        

    });

    mostrarInsumos();
    cargarCategoria();
});

function mostrarInsumos() {
    $('#bodycontrolInsumos').empty();
    $.ajax({
        type: "GET",
        url: "mostrarInsumos",
        success: function (response) {
            $.each(response.insumos, function (key, value) {
                let f= formatoFecha(value['fechaUltCompra']);
                let totalCantidadAct = value.totalCantidadAct !== null ? value.totalCantidadAct : "N/A";
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-first-aid"></i>&nbsp; &nbsp; ${value['insumo'].toUpperCase()} </td>
                        <td>&nbsp; &nbsp; ${(value['categoria'].toUpperCase())}</td>
                        <td>&nbsp; &nbsp; ${(f)}</td>
                        <td>&nbsp; &nbsp; $${(value['costoUltCompra'].toUpperCase())}</td>
                        <td>&nbsp; &nbsp; ${(totalCantidadAct.toUpperCase())}</td>
                        <td>&nbsp; &nbsp; ${(value['unidad'].toUpperCase())}</td>
                        <td class="text-center">
                            <button onclick="actualizarInsumo(${value['insumoId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarInsumo(${value['insumoId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodycontrolInsumos').append(contenido);
            });
        }
    });
}

function guardarInsumos() {
    $('#error_insumos').show();
    if ($("#insumo").val() == "") {
        error_insumo = 'Por favor ingrese un insumo';
        $('#error_insumos').text(error_insumo);
    }else if($("#categoriaId").val() == 0){
        error_insumo = 'Por favor seleccione una categoria';
        $('#error_insumos').text(error_insumo);
    }else if($("#unidadId").val() == 0){
        error_insumo = 'Por favor seleccione una unidad de medida para el insumo.';
        $('#error_insumos').text(error_insumo);
    }else if($("#fechaUlCompra").val() == ""){
        error_insumo = 'Por favor ingrese fecha de ultima compra del insumo ';
        $('#error_insumos').text(error_insumo);
    }else if($("#costoUltCompra").val() == ""){
        error_insumo = 'Por favor ingrese un ultimo costo.';
        $('#error_insumos').text(error_insumo);
    }else if($("#cantMax").val() == ""){
        error_insumo = 'Por favor ingrese una cantidad maxima.';
        $('#error_insumos').text(error_insumo);
    }else if($("#cantMin").val() == ""){
        error_insumo = 'Por favor ingrese una cantidad minima.';
        $('#error_insumos').text(error_insumo);
    }else if (!$.isNumeric($('#insumo').val())) {
        if ($('#insumosId').val() == "") {
            url = "almacenarInsumos";
            data = {
                    insumo: $('#insumo').val(),
                    categoria: $('#categoriaId').val(),
                    unidadMedida: $('#unidadId').val(),
                    fechaUltCompra: $('#fechaUlCompra').val(),
                    costoUlCompra: $('#costoUltCompra').val(),
                    cantMax: $('#cantMax').val(),
                    cantMin: $('#cantMin').val()
            };
        } else {
            url = "actualizarInsumos";
            data = {
                id: $('#insumosId').val(),
                insumo: $('#insumo').val(),
                categoria: $('#categoriaId').val(),
                unidadMedida: $('#unidadId').val(),
                fechaUltCompra: $('#fechaUlCompra').val(),
                costoUlCompra: $('#costoUltCompra').val(),
                cantMax: $('#cantMax').val(),
                cantMin: $('#cantMin').val()
            };
        }
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                if (response.ERROR) {
                    Swal.fire('ATENCIÓN', response.data, 'warning');
                } else {   
                $('#insumosModal').modal('hide');
                mostrarInsumos()
                }
            }
        });

    } else {
        error_insumo = 'Por favor no ingrese números';
        $('#error_insumos').text(error_insumo);
    }
};

function actualizarInsumo(id) {
    $('#error_insumos').hide();
    cargarUnidades();
    $.ajax({
        url: "obtenerInsumo",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#insumosModalLabel').html('Editar Unidad de Medida');
            $('#insumosModal').modal('show');
            $('#insumosId').val(id);
            $('#insumo').val(response.insumos.insumo);
            $('#categoriaId').val(response.insumos.categoriaId);
            $('#fechaUlCompra').val(response.insumos.fechaUltCompra);
            $('#costoUltCompra').val(response.insumos.costoUltCompra);
            $('#cantMax').val(response.insumos.cantidadMax);
            $('#cantMin').val(response.insumos.cantidadMin);
            $('#unidadId').val(response.insumos.unidadId);
        }
    });
}


function eliminarInsumo(id) {
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
                url: "eliminarInsumo",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    if (response.ERROR) {
                        Swal.fire('ATENCIÓN', response.dato, 'warning');
                    } else {
                        mostrarInsumos();
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


function formatoFecha(fecha){
    let date = fecha.replace(/[-]/g, '/');
    let jsDate = new Date(date).toLocaleDateString();
    return jsDate;

}

function cargarCategoria() {
    $('#categoriaId').empty();
    $.ajax({
        url: 'mostraCategoria',
        type: 'GET',
        success: function (data) {
            $.each(data.categorias, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#categoriaId').append(op);
                } else {
                }
                let option = `<option value="${value['categoriaId']}" > ${value['categoria']}</option>`;
                $('#categoriaId').append(option);
            });
        }
    });
};

function cargarUnidades() {
    $('#unidadId').empty();
    $.ajax({
        url: 'mostraUnidades',
        type: 'GET',
        success: function (data) {
            $.each(data.unidades, function (index,value)  {
                if(index == 0){
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#unidadId').append(op);
                }else {
                }
                let option = `<option value="${value['unidadId']}" > ${value['unidad'].toUpperCase()}</option>`;
                $('#unidadId').append(option);
            });
        }
    });
}

function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
     event.returnValue = false;
   }

function validarFloat(event) {
    const input = event.target;
    const valor = input.value;
    const valorLimpio = valor.replace(/[^0-9.]/g, '');
    input.value = valorLimpio;
  }


