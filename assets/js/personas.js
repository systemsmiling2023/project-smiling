$(() => {
    $('#btn_guardar').on('click', function () {
        guardarPersona();
    });

    $('#btnAddPersonas').on('click', function () {
        $('#personasId').val('');
        $('#personasModalLabel').html('Nueva Persona');
        $('#personasModal').modal('show');
        $('#frmAgregarPersonas').trigger('reset');
        $('#error_personas').hide();
        $('#divEstado').hide();
        cargarMunicipio();

    });

    mostrarPersonas();

});


function mostrarPersonas() {
    $('#bodyPersonas').html('');
    $.ajax({
        type: "GET",
        url: "mostrarPersonas",
        success: function (response) {
            let contenido = '';
            $.each(response.personas, function (key, value) {
                let personaEstado = '';
                if (value['estado'] == 1) {
                    personaEstado = 'ACTIVO';
                } else {
                    personaEstado = 'INACTIVO';
                }
                let fecha = value['fechaNacimiento'];
                let date = fecha.replace(/[-]/g, '/');
                let fechaNac = new Date(date).toLocaleDateString();
                contenido += /*html*/ `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['nombres'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${value['primerApellido'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${fechaNac.toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${value['nombreMunicipio'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${personaEstado.toUpperCase()} </td>
                            <td>
                                <button type="button" onclick="actualizarPersonas(${value['personaId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                <!-- <button type="button" onclick="eliminarPersonas(${value['personaId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button> --> 
                                <button type="button" onclick="personaDocumentosModal(${value['personaId']}, '${value['nombres'].toUpperCase()} ${value['primerApellido'].toUpperCase()}')"class="btn btn-outline-primary btn-sm" title="info"><i class="fas fa-id-card"></i></button>
                                <button type="button" onclick="personaContactosModal(${value['personaId']}, '${value['nombres'].toUpperCase()} ${value['primerApellido'].toUpperCase()}')"class="btn btn-outline-primary btn-sm" title="info"><i class="fas fa-address-book"></i></button></button>
                            </td>
                        </tr>`;
            });
            $('#bodyPersonas').html(contenido);
        }
    });
};

function actualizarPersonas(id) {
    $('#divEstado').show();
    cargarMunicipio();
    $.ajax({
        url: "obtenerPersonasId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#personasModalLabel').html('Editar datos de la persona');
            $('#personasId').val(id);
            $('#nombres').val(response.personas.nombres);
            $('#apellidoUno').val(response.personas.primerApellido);
            $('#apellidoDos').val(response.personas.segundoApellido)
            $('#apellidoTres').val(response.personas.tercerApellido);
            $('#detalleDire').val(response.personas.detalleDireccion);
            $('#fechaNac').val(response.personas.fechaNacimiento);
            $('#sexoPersona').val(response.personas.sexo);
            $('#municipios').val(response.personas.municipioId);
            $('#tipoPersona').val(response.personas.tipoPersona);
            $('#estadoPersona').val(response.personas.estado);
            $('#personasModal').modal('show');
        }
    });
};

function guardarPersona() {
    validarDatos()
    if ($('#personasId').val() == "") {
        url = "almacenarPersonas";
        data = {
            nombres: $('#nombres').val(),
            apeUno: $('#apellidoUno').val(),
            apeDos: $('#apellidoDos').val(),
            apeTres: $('#apellidoTres').val(),
            detalle: $('#detalleDire').val(),
            fecha: $('#fechaNac').val(),
            sexo: $('#sexoPersona').val(),
            municipio: $('#municipios').val(),
            tipopersona: $('#tipoPersona').val(),
            estadopersona: $('#estadoPersona').val(),
            dui: $('#dui').val()
        };
    } else {
        url = "actualizarPersona";
        data = {
            id: $('#personasId').val(),
            nombres: $('#nombres').val(),
            apeUno: $('#apellidoUno').val(),
            apeDos: $('#apellidoDos').val(),
            apeTres: $('#apellidoTres').val(),
            detalle: $('#detalleDire').val(),
            fecha: $('#fechaNac').val(),
            sexo: $('#sexoPersona').val(),
            municipio: $('#municipios').val(),
            tipopersona: $('#tipoPersona').val(),
            estadopersona: $('#estadoPersona').val()
        }
        Swal.fire(
            '¡Hecho!',
            'Elemento  con éxito',
            'success'
        );
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
                $('#personasModal').modal('hide');
                $('#personasModal').find('input').val('');
                mostrarPersonas();
            }

        }
    });

};

function cargarMunicipio() {
    $('#municipios').empty();
    $.ajax({
        url: 'mostraMunicipios',
        type: 'GET',
        success: function (data) {
            $.each(data.municipios, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#municipios').append(op);
                } else {
                }
                let option = `<option value="${(index + 1)}" > ${value['nombreMunicipio']}</option>`;
                $('#municipios').append(option);
            });
        }
    });
};

function eliminarPersonas(id) {
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
                url: "eliminarPersonas",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarPersonas();
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
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

function formatoFecha(fecha) {
    var day = fecha.getDate();
    var month = fecha.getMonth() + 1;
    var year = fecha.getFullYear();
    return (`${year}-${month}-${day}`);
};

function validarDatos() {
    $('#error_personas').show();
    if ($("#nombres").val() == " " || $("#apellidoUno").val() == " ") {
        error_personas = 'Por favor ingrese nombres y primer apellido';
        $('#error_personas').text(error_personas);
    } else if ($("#detalleDire").val() == "" || $("#apellidoDos").val() == "") {
        error_personas = 'Por favor ingrese su apellido y dirección ';
        $('#error_personas').text(error_personas);
    } else if ($("#municipios").val() == "" || $("#fechaNac").val() == "") {
        error_personas = 'Por favor ingrese municipio.';
        $('#error_personas').text(error_personas);
    } else if ($("#sexoPersona").val() == "") {
        error_personas = 'Por favor ingrese su sexo';
        $('#error_personas').text(error_personas);
    } else if (isNaN($('#nombres').val()) || isNaN($("#apellidoUno").val())) {
        if (isNaN($('#apellidoTres').val()) || isNaN($("#apellidoDos").val())) {

        } else {
            error_personas = 'Por favor no ingrese numeros';
            $('#error_personas').text(error_personas);
        }
    } else {
        error_personas = 'Por favor no ingrese numeros';
        $('#error_personas').text(error_personas);
    }
};

// FUNCIONALIDAD PARA CONTACTOS

function personaContactosModal(personaId, nombrePersona) {
    $("#personaId-Contactos").val(personaId);
    $('#personaContactosModal').modal('show');
    $('#personaContactosModalLabel').html(`Contactos - Persona: ${nombrePersona}`);
    $('#frmPersonaContactos').hide();

    mostrarOcultarFormulario('frmPersonaContactos', 'divBtnFrmPersonaContactos', 'ocultar');
    mostrarContacto(personaId);

    $('#btn_guardar_Contactos').on('click', function () {
        guardarPersonaContactos(personaId);

    });

    cargarTipoContacto();

}


function mostrarContacto(personaId) {
    $('#bodyPersonaContactos').html('');
    $.ajax({
        type: "POST",
        data: { id: personaId },
        url: "mostrarContactos",
        success: function (response) {
            let contenido = '';
            $.each(response.contact, function (key, value) {
                let principalContacto = '';
                if (value['principal'] == 1) {
                    principalContacto = 'SI';
                } else {
                    principalContacto = 'NO';
                }
                contenido += `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td><i class="fas fa-address-book"></i> &nbsp; &nbsp; ${value['tipoContacto'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${value['contacto']} </td>
                            <td>&nbsp; &nbsp; ${principalContacto} </td>
                            <td>
                                <button type="button" onclick="actualizarContacto(${value['contactoId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" onclick="eliminarCont(${value['contactoId']}, ${personaId})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            });
            $('#bodyPersonaContactos').html(contenido);
        }
    });
}

function cargarTipoContacto() {
    $('#tipoContId').empty();
    $.ajax({
        url: 'mostrarTipoCont',
        type: 'GET',
        success: function (data) {
            $.each(data.tipoContactos, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#tipoContId').append(op);
                } else {
                }
                let option = `<option value="${(index + 1)}" > ${value['tipoContacto']}</option>`;
                $('#tipoContId').append(option);
            });
        }
    });
};


function guardarPersonaContactos(personaId) {

    if ($('#valorContacto').val() == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor ingrese un contacto',
            showConfirmButton: false,
            timer: 3500
        });

    } else if (!ValidateEmail($('#valorContacto').val()) && $('#tipoContId').val() == '1') {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor ingrese un correo válido',
            showConfirmButton: false,
            timer: 3500
        });
    } else {
        let url = "";
        if ($('#accionContactos').val() == "actualizar") {
            url = "actualizarTipoContacto";
            data = {
                contactoId: $('#contId').val(),
                tipoContacto: $('#tipoContId').val(),
                contacto: $('#valorContacto').val(),
                principal: $('#contprincipal').val()
            };

        } else {
            url = "agregarTipoContacto";
            data = {
                tipoContacto: $('#tipoContId').val(),
                contacto: $('#valorContacto').val(),
                principal: $('#contprincipal').val(),
                personaId: personaId
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
                    mostrarContacto(personaId);
                } else {
                    mostrarOcultarFormulario('frmPersonaContactos', 'divBtnFrmPersonaContactos', 'ocultar');
                    $('#frmPersonaContactos').trigger('reset');
                    mostrarContacto(personaId);
                }

            }
        });

    }

}

function eliminarCont(id, personaId) {
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
                url: "eliminarContacto",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                    mostrarContacto(personaId);
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

function actualizarContacto(id) {
    $('#accionContactos').val('actualizar');
    mostrarOcultarFormulario('frmPersonaContactos', 'divBtnFrmPersonaContactos', 'mostrar');
    $.ajax({
        url: "obtenerContactoId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#contId').val(response.contactos.contactoId)
            $('#tipoContId').val(response.contactos.tipoContId)
            $('#valorContacto').val(response.contactos.contacto);
            $('#contprincipal').val(response.contactos.principal);
        }
    });
}


// FUNCIONALIDAD PARA DOCUMENTOS 

function guardarPersonaDocumento(personaId) {

    if ($('#valorDocumento').val() == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor ingrese un documento',
            showConfirmButton: false,
            timer: 3500
        });
    } else {
        let url = "";
        if ($('#accionDocumentos').val() == "actualizar") {
            url = "actualizarTipoDoc";
            data = {
                documentoId: $('#docId').val(),
                tipoDocumento: $('#tipoDocId').val(),
                documento: $('#valorDocumento').val()
            };

        } else {
            url = "agregarTipoDoc";
            data = {
                tipoDocumento: $('#tipoDocId').val(),
                documento: $('#valorDocumento').val(),
                personaId: personaId
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
                    mostrarOcultarFormulario('frmPersonaDocumentos', 'divBtnFrmPersonaDocumentos', 'ocultar');
                    $('#frmPersonaDocumentos').trigger('reset');
                    mostrarDoc(personaId);
                }

            }
        });

    }


}

function personaDocumentosModal(personaId, nombrePersona) {
    $("#personaId-documentos").val(personaId);
    $('#personaDocumentosModal').modal('show');
    $('#personaDocumentosModalLabel').html(`Documentos - Persona: ${nombrePersona}`);
    $('#frmPersonaDocumentos').hide();
    mostrarOcultarFormulario('frmPersonaDocumentos', 'divBtnFrmPersonaDocumentos', 'ocultar');
    mostrarDoc(personaId);

    $('#btn_guardar_documentos').on('click', function () {

        guardarPersonaDocumento(personaId);

    });
    cargarTipoDocumento();
}


function mostrarDoc(personaId) {
    $('#bodyPersonaDocumentos').html('');
    $.ajax({
        type: "POST",
        data: { id: personaId },
        url: "mostrarDocumento",
        success: function (response) {
            let contenido = '';
            $.each(response.documet, function (key, value) {
                contenido += `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td><i class="fas fa-id-card"></i> &nbsp; &nbsp; ${value['tipoDocumento'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${value['documento'].toUpperCase()} </td>
                            <td>
                                <button type="button" onclick="actualizarDoc(${value['documentoId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" onclick="eliminarDoc(${value['documentoId']}, ${personaId})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            });
            $('#bodyPersonaDocumentos').html(contenido);
        }
    });
}

function cargarTipoDocumento() {
    $('#tipoDocId').empty();
    $.ajax({
        url: 'mostrarTipoDoc',
        type: 'GET',
        success: function (data) {
            $.each(data.tipoDocumentos, function (index, value) {
                if (index == 0) {
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#tipoDocId').append(op);
                } else {
                }
                let option = `<option value="${(index + 1)}" > ${value['tipoDocumento']}</option>`;
                $('#tipoDocId').append(option);
            });
        }
    });
};


function mostrarOcultarFormulario(frm, divBtn, mostrarOcultar) {
    if (mostrarOcultar == "mostrar") {
        $(`#${frm}`).show();
        $(`#${divBtn}`).hide();
    } else {
        // Ocultar
        $('#frmPersonaContactos').trigger('reset');
        $('#frmPersonaDocumentos').trigger('reset');
        $('#valorContacto').val('');
        $('#valorDocumento').val('');
        $(`#${frm}`).hide();
        $(`#${divBtn}`).show();
        $("#accionDocumentos").val('agregar');
    }
}

function eliminarDoc(id, personaId) {
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
                url: "eliminarDoc",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                    mostrarDoc(personaId);
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

function actualizarDoc(id) {
    $('#accionDocumentos').val('actualizar');
    mostrarOcultarFormulario('frmPersonaDocumentos', 'divBtnFrmPersonaDocumentos', 'mostrar');
    $.ajax({
        url: "obtenerDocumentoId",
        data: { id: id },
        type: "POST",
        success: function (response) {
            $('#docId').val(response.documentos.documentoId);
            $('#tipoDocId').val(response.documentos.tipoDocId);
            aplicarMascaraDocumento();
            $('#valorDocumento').val(response.documentos.documento);
        }
    });
}

function aplicarMascaraContactos() {
    $("#valorContacto").val('');
    if ($("#tipoContId").val() == "2") { // NUM MOVIL
        $("#valorContacto").mask("9999-9999");
    } else {

    }
}

// Función para validar formato de correo
function ValidateEmail(input) {

    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let admitidos = ['gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com'];

    if (input.match(validRegex)) {
        splitInput = input.split('@');

        if (admitidos.includes(splitInput[1])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function aplicarMascaraDocumento() {
    $("#valorDocumento").val('');
    if ($("#tipoDocId").val() == "1") { // DUI
        $("#valorDocumento").mask("99999999-9");
    } else if ($("#tipoDocId").val() == "2") { // NIT
        $("#valorDocumento").mask("9999-999999-999-9");
    } else if ($("#tipoDocId").val() == "3") { // PASAPORTE
        $("#valorDocumento").mask("999999999");
    } else if ($("#tipoDocId").val() == "4") { // LICENCIA
        $("#valorDocumento").mask("9999-999999-999-9");
    } else if ($("#tipoDocId").val() == "5") { // CARNET RES.
        $("#valorDocumento").mask("9999999");
    } else { // No aplica mascara
        $("#valorDocumento").unmask();
    }
}