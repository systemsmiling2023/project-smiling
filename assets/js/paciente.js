$(() => {
    $('#btn_guardar').on('click', function () {
        guardarPaciente();
    });

    $('#btnAddPaciente').on('click', function(){
        $('#pacienteId').empty();
        selectPaciente();
        //selectMedio();
        //selectInteres();
        //selectPatologia();
        $('#pacienteModalLabel').html('Nuevo Paciente');
        $('#pacienteModal').modal('show');
        $('#frmAgregarPaciente').trigger('reset');
        $('#error_paciente').hide();
        $('#divEstado').val(''); 
    });
    
    mostrarPaciente();
    
});

// GUARDAR PACIENTE
function guardarPaciente() {
    if (($('#personaId').val() == "") || ($('#estado').val() == "")) {
        Swal.fire({
            title: 'Todos los datos son requeridos',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el pacienteId  viene vacío es porque es agregar
        if ($('#pacienteId').val() == "") {
            url = "almacenarPaciente";
            data = {
                personaId: $('#personaId').val(),
                estado: $('#estado').val(),
            };
            
        } else {
            $('#error_paciente').empty();
            url = "actualizarPaciente";
            data = {
                id: $('#pacienteId').val(),
                personaId: $('#personaId').val(),
                codPaciente: $('#codPaciente').val(),
                estado: $('#estado').val(),
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#pacienteModal').modal('hide');
                $('#pacienteModal').find('input').val('');
                mostrarPaciente();
            }
        });
    }
}

function mostrarPaciente() {
    $('#bodyPaciente').empty();
    $.ajax({
        type: "GET",
        url: "mostrarPacientes",
        success: function (response) {
            //console.log(response);
            $.each(response.pacienteId, function (index, value) {
                let estadoPaciente = '';
                if (value['estado'] == 1) {
                    estadoPaciente = 'ACTIVO';
                } else {
                    estadoPaciente = 'INACTIVO';
                }
                let paciente = value['nombres'] + ' ' + value['primerApellido'];
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(index + 1)}</td>
                        <td><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['codPaciente']} </td>
                        <td value="${value['personaId']}">&nbsp; &nbsp; ${paciente} </td>
                        <td>&nbsp; &nbsp; ${estadoPaciente} </td>
                        <td class="text-center">
                            <button id="btnActualizar" onclick="actualizarPaciente(${value['pacienteId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarPaciente(${value['pacienteId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                            <button onclick="pacMedios(${value['pacienteId']}, '${paciente}')" class="btn btn-outline-info btn-sm" title="Medios"><i class="fas fa-globe"></i></button>
                            <button onclick="pacInteres(${value['pacienteId']}, '${paciente}')" class="btn btn-outline-info btn-sm" title="Interes"><i class="fas fa-heart"></i></button>
                        </td>
                    </tr>`;

                $('#bodyPaciente').append(contenido);
            });
        }
    });
};

function actualizarPaciente(id) {
    selectPaciente();
    $.ajax({
        url: "obtenerPacienteId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#pacienteModalLabel').html('Editar Paciente');
            $('#pacienteId').val(response.pacienteId.pacienteId);
            $('#personaId').val(response.pacienteId.personaId);
            $('#codPaciente').val(response.pacienteId.codPaciente);
            $('#estado').val(response.pacienteId.estado);
            $('#pacienteModal').modal('show'); 
        }
    });
}

function eliminarPaciente(id) {
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
                url: "eliminarPaciente",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarPaciente();
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

function selectPaciente() {
    //$('#personaId').empty();
    $.ajax({
        url: "nombrePaciente",
        type: "GET",
        success: function (response) {

            $.each(response.personaId, function (index, value) {
                let paciente = value['nombres'] + ' ' + value['primerApellido'];
                if (index == 0) {
                    let op = '<option value="0">Seleccione...</option>';
                    $('#personaId').append(op);
                } 
                let selectPaciente = `<option value="${value['personaId']}">${paciente.toUpperCase()} &nbsp;</option>`
                $('#personaId').append(selectPaciente);   
            });
        }
    });
}


/////////////////// FUNCIONALIDAD DE MEDIOS///////////////////
function pacMedios(pacienteId, paciente) {
    //console.log(pacienteId);
    $("#pacienteId-medios").val(pacienteId);
    $('#pacienteMediosModal').modal('show');
    $('#pacienteMediosModalLabel').html(`Medios - Paciente: ${paciente}`);
    $('#frmPacienteMedios').hide();
    mostrarOcultarFormulario('frmPacienteMedios', 'divBtnFrmPacienteMedios', 'ocultar');
    mostrarMedios(pacienteId);

    $('#btn_guardar_medios').off('click').on('click', function () {
        guardarPacienteMedios(pacienteId);
    });
    
    selectMedio();
}

function guardarPacienteMedios(pacienteId) {

    if ($('#medioId').val() == "" || $('#fechaRegistro').val() == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor seleccione un medio',
            showConfirmButton: false,
            timer: 3500
        });
    } else {
        let url = "";
        if ($('#accionMedios').val() == "actualizar") {
            url = "actualizarPacMedios";
            data = {
                pacMedId: $('#pacMedId').val(),
                medioId: $('#medioId').val(),
                fechaRegistro: $('#fechaRegistro').val()
            };

        } else {
            url = "agregarPacMedios";
            data = {
                medioId: $('#medioId').val(),
                fechaRegistro: $('#fechaRegistro').val(),
                pacienteId: pacienteId
            };
        }
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                if (response.ERROR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.data,
                        showConfirmButton: false,
                        timer: 3500
                    });
                } else {
                    mostrarOcultarFormulario('frmPacienteMedios', 'divBtnFrmPacienteMedios', 'ocultar');
                    $('#frmPacienteMedios').trigger('reset');
                    mostrarMedios(pacienteId);
                }
            }
        });
    }
}

function selectMedio() {
    $('#medioId').empty();
    $.ajax({
        url: "nombreMedios",
        type: "GET",
        success: function (response) {
            $.each(response.medioId, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0">Seleccione...</option>';
                    $('#medioId').append(op);
                } 
                let selectMedio = `<option value="${value['medioId']}">${value['medio'].toUpperCase()} &nbsp;</option>`
                $('#medioId').append(selectMedio);
            });
        }
    });
}

function mostrarMedios(pacienteId) {
    $('#bodyPacienteMedios').html('');
    $.ajax({
        type: "POST",
        data: { id: pacienteId },
        url: "mostrarPacMedios",
        success: function (response) {
            let contenido = '';
            $.each(response.pacMedId, function (key, value) {
                let date = value['fechaRegistro'];
                let fechaRegistro = new Date(date).toLocaleDateString();
                contenido += `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td value="${value['medioId']}"><i class="fas fa-id-card"></i> &nbsp; &nbsp; ${value['medio'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${fechaRegistro} </td>
                            <td>
                                <button type="button" onclick="actualizarPacMedios(${value['pacMedId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" onclick="eliminarPacMedios(${value['pacMedId']}, ${value['pacienteId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            });
            $('#bodyPacienteMedios').html(contenido);
            //console.log(pacienteId);
        }
    });
}

function actualizarPacMedios(id) {
    $('#accionMedios').val('actualizar');
    mostrarOcultarFormulario('frmPacienteMedios', 'divBtnFrmPacienteMedios', 'mostrar');
    $.ajax({
        url: "obtenerPacMediosId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#pacienteId').val(response.pacMedId.pacienteId);
            $('#medioId').val(response.pacMedId.medioId);
            $('#fechaRegistro').val(response.pacMedId.fechaRegistro);
        }
    });
}

function eliminarPacMedios(id, pacienteId) {
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
                url: "eliminarPacMedios",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                    mostrarMedios(pacienteId);
                }
            });
        } else {
            Swal.fire(
                'Aviso',
                'Parece que algo salió mal',
                'warning'
            );
        }
    });
};

function mostrarOcultarFormulario(frm, divBtn, mostrarOcultar) {
    if (mostrarOcultar == "mostrar") {
        $(`#${frm}`).show();
        $(`#${divBtn}`).hide();
    } else {
        // Ocultar
        $('#frmPacienteMedios').trigger('reset');
        $(`#${frm}`).hide();
        $(`#${divBtn}`).show();
        //$("#accionMedios").val('agregar');
    }
}

/////////////////// FUNCIONALIDAD DE INTERESES///////////////////
function pacInteres(pacienteId, paciente) {
    //$('#collapseExample').show();
    $('#btn_guardar_interes').hide();
    $("#pacienteId-interes").val(pacienteId);
    $('#pacienteInteresModal').modal('show');
    $('#pacienteInteresModalLabel').html(`Intereses - Paciente: ${paciente}`);
    
    mostrarIntereses(pacienteId);
    Plus();

    $('#btn_guardar_interes').on('click', function () {
        guardarPacienteIntereses(pacienteId);
        $('#collapseExample').hide();
    })
   
    selectInteres();
}

function Plus() {
    $('#plus').on('click', function () {
        
        if ($(this).hasClass('btn-primary')) {
            $('#btn_guardar_interes').show();
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-secondary');
            $(this).text('Cancelar');
            
        } else {
            $(this).removeClass('btn-secondary');
            $(this).addClass('btn-primary');
            $(this).text(' Agregar Intereses');
            $('#btn_guardar_interes').hide();
        }
    });
}


function guardarPacienteIntereses(pacienteId) {
    
    if (($('#interesId').val() == "")) {
        Swal.fire({
            title: 'Todos los datos son requeridos',
            text: "Vuelva a intentarlo!",
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        // Si el interesPacienteId  viene vacío es porque es agregar
        if ($('#interesPacienteId').val() == "") {
            url = "agregarPacInteres";
            data = {
                interesId: $('#interesId').val(),
                pacienteId: pacienteId,
            };
            console.log(data);
        } else {
            $('#error_paciente').empty();
            url = "actualizarPacInteres";
            data = {
                id: $('#interesPacienteId').val(),
                interesId: $('#interesId').val(),
            }
        }
        
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#pacienteInteresModal').modal('hide');
                $('#pacienteInteresModal').find('input').val('');
                mostrarIntereses(pacienteId);
            }
        });
    }
}

function selectInteres() {
    $('#interesId').html('');
    $.ajax({
        url: "nombreIntereses",
        type: "GET",
        success: function (response) {
            let op = '<option value="0">Seleccione...</option>';
            $('#interesId').val(op);
            $.each(response.interesId, function (index, value) {
                op += `<option value="${value['interesId']}">&nbsp;${value['nombreInteres'].toUpperCase()} </option>`;
                $('#interesId').html(op);
            });
        }
    });
}

function mostrarIntereses(pacienteId) {
    $('#bodyPacienteInteres').html('');
    $.ajax({
        type: "POST",
        data: { id: pacienteId },
        url: "mostrarPacInteres",
        success: function (response) {
            let contenido = '';
            $.each(response.interesPacienteId, function (key, value) {
                contenido += `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td value="${value['interesId']}"><i class="fas fa-id-card"></i> &nbsp; &nbsp; ${value['nombreInteres'].toUpperCase()} </td>
                            <td>
                                <button type="button" onclick="eliminarPacInteres(${value['interesPacienteId']}, ${value['pacienteId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            });
            $('#bodyPacienteInteres').html(contenido);
            //console.log(pacienteId);
        }
    });
}


function eliminarPacInteres(id, pacienteId) {
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
                url: "eliminarPacInteres",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                    mostrarIntereses(pacienteId);
                }
            });
        } else {
            Swal.fire(
                'Aviso',
                'Parece que algo salió mal',
                'warning'
            );
        }
    });
};

function selectPatologia() {
    $('#patologiaId').empty();
    $.ajax({
        url: "nombrePatologia",
        type: "GET",
        success: function (response) {

            $.each(response.patologiaId, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0">Seleccione...</option>';
                    $('#patologiaId').append(op);
                } else {

                }
                let selectPatologia = `<option value="${value['patologiaId']}">${value['patologia'].toUpperCase()} &nbsp;</option>`
                $('#patologiaId').append(selectPatologia);
            });
        }
    });
}


