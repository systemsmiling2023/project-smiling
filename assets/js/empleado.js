$(() => {
    $('#btn_guardar').on('click', function () {
        guardarEmpleado();
    });

    $('#btnAddEmpleado').on('click', function () {
        $('#personaId').empty();
        nombreEmpleado();
        $('#cargoId').empty();
        nombreCargo();
        $('#empleadoId ').val('');
        $('#empleadoModalLabel').html('Nuevo Empleado');
        $('#empleadoModal').modal('show');
        $('#fechaIngreso').focus();

    });

    mostrarEmpleado();

});


// GUARDAR EMPLEADO
function guardarEmpleado() {
    if (($('#fechaIngreso').val() == "") || ($('#personaId').val() == "") || ($('#cargoId').val() == "") || ($('#estado').val() == "")) {
        console.log('#fechaIngreso');
        Swal.fire({
            title: 'Todos los datos son requeridos',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el empleadoId  viene vacío es porque es agregar
        if ($('#empleadoId').val() == "") {
            url = "almacenarEmpleado";
            data = {
                personaId: $('#personaId').val(),
                cargoId: $('#cargoId').val(),
                fechaIngreso: $('#fechaIngreso').val(),
                estado: $('#estado').val(),
            };
        } else {
            $('#error_fechaIngreso').empty();
            url = "actualizarEmpleado";
            data = {
                id: $('#empleadoId').val(),
                personaId: $('#personaId').val(),
                cargoId: $('#cargoId').val(),
                fechaIngreso: $('#fechaIngreso').val(),
                estado: $('#estado').val(),
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#empleadoModal').modal('hide');
                $('#empleadoModal').find('input').val('');
                mostrarEmpleado();
            }
        });
    }
}

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarEmpleado() {
    $('#bodyEmpleados').empty();
    $.ajax({
        type: "GET",
        url: "buscarJoin",
        success: function (response) {

            $.each(response.fechaIngreso, function (key, value) {
                let estadoEmpleado = '';
                if (value['estado'] == 1) {
                    estadoEmpleado = 'ACTIVO';
                } else {
                    estadoEmpleado = 'INACTIVO';
                }
                let fecha = value['fechaIngreso'];
                let date = fecha.replace(/[-]/g, '/');
                let jsDate = new Date(date).toLocaleDateString();
                let nombrePersona = value['nombres'] + " " + value['primerApellido'];
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td value="${value['personaId']}" id="test"><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['nombres']}&nbsp; ${value['primerApellido']}</td>
                        <td>&nbsp; &nbsp; ${jsDate} </td>
                        <td value="${value['cargoId']}">&nbsp; &nbsp; ${value['cargo']} </td>
                        <td>&nbsp; &nbsp; ${(estadoEmpleado)} </td>
                        <td class="text-center">
                            <button onclick="actualizarEmpleado(${value['empleadoId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <!--<button onclick="eliminarEmpleado(${value['empleadoId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>-->
                            <button onclick="empleadoProfesion(${value['empleadoId']}, '${(nombrePersona)}')" class="btn btn-outline-secondary btn-sm" title="Profesión"><i class="fas fa-user-tie"></i></button>
                            <button onclick="empleadoSucursal(${value['empleadoId']}, '${(nombrePersona)}')" class="btn btn-outline-secondary btn-sm" title="Sucursal"><i class="fas fa-store"></i></button>
                        </td>
                    </tr>`;
                $('#bodyEmpleados').append(contenido);
            });
        }
    });
}

function actualizarEmpleado(id) {
    nombreEmpleado();
    nombreCargo();
    $.ajax({
        url: "obtenerEmpleadoId",
        data: { id: id },
        type: "POST",
        success: function (response) {

            $('#empleadoModalLabel').html('Editar Empleado');
            $('#empleadoId').val(id);
            $('#personaId').val(response.fechaIngreso.personaId);
            $('#cargoId').val(response.fechaIngreso.cargoId);
            $('#fechaIngreso').val(response.fechaIngreso.fechaIngreso);
            $('#estado').val(response.fechaIngreso.estado);
            $('#empleadoModal').modal('show');
        }
    });
}

function eliminarEmpleado(id) {
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
                url: "eliminarEmpleado",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarEmpleado();
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

function nombreEmpleado() {
    //$('#personaId').empty();
    $.ajax({
        type: "GET",
        url: "mostrarNombreEmpleado",
        success: function (response) {

            $.each(response.personaId, function (key, value) {
                if (key == 0) {
                    let op = '<option value="0">Seleccione empleado...</option>';
                    $('#personaId').append(op);
                }
                let selectEmpleado = `<option value="${value['personaId']}">${value['nombres']} &nbsp; ${value['primerApellido']} &nbsp; ${value['segundoApellido']} &nbsp;</option>`
                $('#personaId').append(selectEmpleado);
            });
        }
    });
}

function nombreCargo() {
    //$('#cargoId').empty();
    $.ajax({
        type: "GET",
        url: "mostrarNombreCargo",
        success: function (response) {

            $.each(response.cargoId, function (key, value) {
                if (key == 0) {
                    let op = '<option value="0" >Seleccione un cargo...</option>';
                    $('#cargoId').append(op);
                }
                let selectCargo = `<option value="${value['cargoId']}">&nbsp; ${value['cargo']}</option>`
                $('#cargoId').append(selectCargo);
            });
        }
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCIONALIDAD PARA PROFESION

function mostrarProfesion(empleadoId) {
    $('#bodyEmpleadoProfesion').html('');
    $.ajax({
        type: "POST",
        data: { id: empleadoId },
        url: "buscarProfesion",
        success: function (response) {
            let contenido = "";
            $.each(response.empProfId, function (key, value) {
                contenido += /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>empleadoProfesion
                        <td value="${value['empleadoId']}">&nbsp; &nbsp; ${value['nombres']}&nbsp; ${value['primerApellido']} </td>
                        <td value="${value['profesionId']}">&nbsp; &nbsp; ${value['profesion']} </td>
                        <td class="text-center">
                            <button onclick="eliminarProfesion(${value['empProfId']}, ${empleadoId})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
            });
            $('#bodyEmpleadoProfesion').html(contenido);
        }
    });
}

function profesion() {

    $('#profesionId').html('');
    $.ajax({
        type: "GET",
        url: "mostrarProfesion",
        success: function (response) {

            let op = '<option value="0" >Seleccione una profesión...</option>';
            $.each(response.profesionId, function (key, value) {
                op += `<option value="${value['profesionId']}">&nbsp; ${value['profesion']}</option>`
            });
            $('#profesionId').html(op);
        }
    });
}

function guardarEmpleadoProfesion(empleadoId) {

    $('#empProfId').val('');


    if ($('#profesionId').val() == "") {
        error_profesionId = 'Por favor seleccione una profesión!';
        $('#error_profesionId').text(error_profesionId);
    } else {

        url = "almacenarEmpleadoProfesion";

        data = {
            empleadoId: empleadoId,
            profesionId: $('#profesionId').val()
        };

        $.ajax({
            url: url,
            data: data,
            dataType: 'json',
            type: "POST",
            success: function (response) {

                console.log(response);

                if (response.ERROR) {
                    Swal.fire(
                        'ATENCIÓN',
                        response.dato,
                        'warning'
                    );
                } else {
                    $('#empleadoProfesionModal').modal('hide');
                    $('#empleadoProfesionModal').find('input').val('');
                    mostrarProfesion(empleadoId);
                }
            }
        });
    }
}

function eliminarProfesion(id, empleadoId) {

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
                url: "eliminarEmpleadoProfesion",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarProfesion(empleadoId);
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

function actualizarProfesion(id) {
    profesion();
    $.ajax({
        url: "obtenerEmpleadoProfesionId",
        data: { id: id },
        type: "POST",
        success: function (response) {

            $('#empleadoProfesionModalLabel').html('Editar Profesión');
            $('#empProfId').val(id);
            $('#empleadoId').val(response.profesionId.empleadoId);
            $('#profesionId').val(response.profesionId.profesionId);
            $('#empleadoProfesion').focus();
            $('#empleadoModal').modal('show');
        }
    });
}

function empleadoProfesion(id, nombrePersona) {

    $('#txtEmpleadoId').val(id);

    $('#nombreEmpleado').empty();
    $('#empProfId').val(id);
    var empleado = `<h5>&nbsp;&nbsp;${nombrePersona}</h5>`;
    $('#profesionModal').modal('show');
    $('#profesionModalLabel').html(`Empleado | Profesión: ${nombrePersona}`);
    $('#nombreEmpleado').append(empleado);
    mostrarProfesion(id);

    // $('#btn_guardarProfesion').on('click', function () {
    //     guardarEmpleadoProfesion(id);
    // });

    // $('#btnAddEmpleadoProfesion').on('click', function () {
    //     profesion();
    //     $('#empProfId ').val('');
    //     $('#empleadoProfesionModalLabel').html('Nueva Profesión');
    //     $('#empleadoProfesionModal').modal('show');
    //     $('#profesionId').focus();
    // });

    // profesion();
}

$('#btn_guardarProfesion').on('click', function () {
    let id = $('#txtEmpleadoId').val();
    guardarEmpleadoProfesion(id);
});

$('#btnAddEmpleadoProfesion').on('click', function () {
    profesion();
    $('#empProfId ').val('');
    $('#empleadoProfesionModalLabel').html('Añadir Nueva Profesión');
    $('#empleadoProfesionModal').modal('show');
    $('#profesionId').focus();
});

////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCIONALIDAD PARA SUCURSAL

$('#btn_guardarSuc').on('click', function () {
    let id = $('#txtEmpleadoId').val();
    guardarEmpleadoSucursal(id);
});

$('#btnAddEmpleadoSucursal').on('click', function () {
    $('#empSucId').val('');
    $('#empSucModalLabel').html('Nueva Sucursal');
    $('#empSucModal').modal();
    $('#sucursalId').focus();
    sucursal();

});

function empleadoSucursal(id, nombrePersona) {

    $('#txtEmpleadoId').val(id);

    $('#nombreEmpleadoSuc').empty();
    $('#empleadoId-sucursal').val(id);
    var empleado = `<h5>&nbsp;&nbsp;${nombrePersona}</h5>`;
    $('#sucursalModal').modal('show');
    $('#sucursalModalLabel').html(`Empleado | Sucursal: ${nombrePersona}`);
    $('#nombreEmpleadoSuc').append(empleado);
    mostrarSucursal(id);



    //sucursal();
}


function guardarEmpleadoSucursal(empleadoId) {

    if ($('#sucursalId').val() == "") {
        error_sucursalId = 'Por favor seleccione sucursal';
        $('#error_sucursalId').text(error_sucursalId);
    } else {

        url = "almacenarEmpleadoSucursal";
        data = {
            empleadoId: empleadoId,
            sucursalId: $('#sucursalId').val(),
            esEncargado: $('#esEncargado').val()
        };

        $.ajax({
            url: url,
            data: data,
            dataType: 'json',
            type: "POST",
            success: function (response) {

                if (response.ERROR) {
                    Swal.fire(
                        'ATENCIÓN',
                        response.dato,
                        'warning'
                    );

                } else {
                    mostrarSucursal(empleadoId);
                    $('#empSucModal').modal('hide');
                    $('#empSucModal').find('input').val('');
                }
            }
        });
    }
}

function mostrarSucursal(empleadoId) {
    $('#bodyEmpleadoSucursal').empty();
    $.ajax({
        type: "POST",
        data: { id: empleadoId },
        url: "buscarSucursal",
        success: function (response) {
            $.each(response.sucursalId, function (key, value) {

                let esEncargado = '';
                if (value['esEncargado'] == 1) {
                    esEncargado = 'Sí';
                } else {
                    esEncargado = 'No';
                }
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td value="${value['empleadoId']}">&nbsp; &nbsp; ${value['nombres']}&nbsp; ${value['primerApellido']} </td>
                        <td value="${value['sucursalId']}">&nbsp; &nbsp; ${value['referencia']} </td>
                        <td value="${value['esEncargado']}">&nbsp; &nbsp; ${(esEncargado)} </td>
                        <td class="text-center">
                            <button onclick="eliminarSucursal(${value['empSucId']}, ${empleadoId})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
                $('#bodyEmpleadoSucursal').append(contenido);

            });
        }
    });
}

function sucursal() {

    $('#sucursalId').empty();
    $('#sucursalId').html('');
    $.ajax({
        type: "GET",
        url: "mostrarSucursal",
        success: function (response) {

            let op = '<option value="0" >Seleccione una sucursal...</option>';
            $.each(response.sucursalId, function (key, value) {
                op += `<option value="${value['sucursalId']}">&nbsp; ${value['referencia']}</option>`
            });

            $('#sucursalId').html(op);
        }
    });
}

function eliminarSucursal(id, empleadoId) {
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
                url: "eliminarEmpleadoSucursal",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarSucursal(empleadoId);
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

function actualizarSucursal(id) {
    nombreEmpleado();
    sucursal();
    $.ajax({
        url: "obtenerEmpleadoSucursalId",
        data: { id: id },
        type: "POST",
        success: function (response) {

            $('#empSucModalLabel').html('Editar Sucursal');
            $('#empSucId').val(id);
            $('#empleadoId').val(response.empleadoSucursal.empleadoId);
            $('#sucursalId').val(response.empleadoSucursal.sucursalId);
            $('#esEncargado').val(response.empleadoSucursal.esEncargado);
            $('#empSucModal').modal('show');
        }
    });
}



