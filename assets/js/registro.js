
cargarMunicipios();
// $('#regMunicipio').select2();

$('#regDUI').mask('99999999-9');
$('#regTelefono').mask('9999-9999');

$('#terminosCondiciones').on('click', (event) => {
    event.preventDefault();
    $('#checkTerminosCondiciones').attr('checked', false);

    text = '<p style="text-align:justify"> Clínica Dental Smiling comprende que estos datos proporcionados por usted son delicados y sensibles y se compromete a mantenerlos bajo resguardo solo para uso dentro de los procesos de la institución. No se proporcionará esta información a nadie externo sin el consentimiento del individuo, por lo tanto, asume que son datos verdaderos y propios del solicitante. <br><br> Al aceptar los términos y condiciones esta información proporcionada será verificada y posteriormente se enviará un correo electrónico a la dirección proporcionada para culminar el proceso de asignarle un usuario. Con este usuario, usted podrá ingresar al sistema y podrá agendar citas en línea, consultar otros datos con referente a su salud bucal. </p>';

    Swal.fire({
        title: 'TÉRMINOS & CONDICIONES',
        html: text,
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Acepto',
        background: '#17202A',
        color: 'white'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#checkTerminosCondiciones').attr('checked', true);
        }
    });
});


// Evento al darle click a Enviar
$('#btnEnviarReg').on('click', function (e) {

    // Eliminando el comportamiento por defecto
    e.preventDefault();

    let terminosCondiciones = $('#checkTerminosCondiciones')[0].checked;

    // Validando que haya aceptado términos y condiciones
    if (terminosCondiciones) {
        // Verificando recibir todos los campos
        if ($('#regNombres').val() == "") {
            $('#regNombres').focus();
            $('#error_regNombres').html('Por favor ingrese sus nombres');
            setTimeout(function () { $('#error_regNombres').html(''); }, 3000);

        } else if (!ValidateNameLast($('#regNombres').val())) {
            $('#regNombres').focus();
            $('#error_regNombres').html('Por favor ingrese sus nombres completos y válidos');
            setTimeout(function () { $('#error_regNombres').html(''); }, 3000);

        } else if ($('#regApellido1').val() == "") {
            $('#regApellido1').focus();
            $('#error_regApellido1').html('Por favor ingrese su primer apellido');
            setTimeout(function () { $('#error_regApellido1').html(''); }, 3000);

        } else if ($('#regApellido2').val() == "") {
            $('#regApellido2').focus();
            $('#error_regApellido2').html('Por favor ingrese su segundo apellido');
            setTimeout(function () { $('#error_regApellido2').html(''); }, 3000);

        } else if ($('#regFechaNac').val() == "") {
            $('#regFechaNac').focus();
            $('#error_regFechaNac').html('Por favor ingrese su fecha de nacimiento');
            setTimeout(function () { $('#error_regFechaNac').html(''); }, 3000);

        } else if ($('#regDUI').val() == "") {
            $('#regDUI').focus();
            $('#error_regDUI').html('Por favor ingrese su número de DUI');
            setTimeout(function () { $('#error_regDUI').html(''); }, 3000);

        } else if ($('#regEmail').val() == "") {
            $('#regEmail').focus();
            $('#error_regEmail').html('Por favor ingrese su correo electrónico');
            setTimeout(function () { $('#error_regEmail').html(''); }, 3000);

        } else if (!ValidateEmail($('#regEmail').val())) {
            $('#regEmail').focus();
            $('#error_regEmail').html('Por favor ingrese correo electrónico válido (Gmail, Yahoo, Hotmail)');
            setTimeout(function () { $('#error_regEmail').html(''); }, 3000);

        } else if ($('#regTelefono').val() == "") {
            $('#regTelefono').focus();
            $('#error_regTelefono').html('Por favor ingrese su número telefónico');
            setTimeout(function () { $('#error_regTelefono').html(''); }, 3000);

        } else if ($('#regMunicipio').val() == "") {
            $('#regMunicipio').focus();
            $('#error_regMunicipio').html('Por favor ingrese su municipio de residencia');
            setTimeout(function () { $('#error_regMunicipio').html(''); }, 3000);

        } else if ($('#regDireccion').val() == "") {
            $('#regDireccion').focus();
            $('#error_regDireccion').html('Por favor ingrese su dirección específica de residencia');
            setTimeout(function () { $('#error_regDireccion').html(''); }, 3000);

        } else if (!$("input[name='regSexo']").is(":checked")) {
            $('#error_regSexo').html('Por favor ingrese su sexo');
            setTimeout(function () { $('#error_regSexo').html(''); }, 3000);

        } else {

            // SI VIENEN TODOS LOS DATOS, CONSULTAR SI ACEPTA ENVIAR LA INFORMACIÓN
            Swal.fire({
                title: '¿Desea enviar su información?',
                text: "Al enviar la información, el administrador del sistema le proporcionará un usuario para que pueda acceder al sistema. Una vez la información esté validada y tenga usuario podrá agendar citas.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#616A6B',
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar',
                background: '#17202A',
                color: 'white'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    //     '¡Enviado!',
                    //     'Su información ha sido enviada',
                    //     'success'
                    // )

                    $.ajax({
                        url: 'guardarPersona',
                        data: {
                            regNombres: $('#regNombres').val(),
                            regApellido1: $('#regApellido1').val(),
                            regApellido2: $('#regApellido2').val(),
                            regApellido3: $('#regApellido3').val(),
                            regFechaNac: $('#regFechaNac').val(),
                            regDUI: $('#regDUI').val(),
                            regEmail: $('#regEmail').val(),
                            regTelefono: $('#regTelefono').val(),
                            regMunicipio: $('#regMunicipio').val(),
                            regDireccion: $('#regDireccion').val(),
                            regSexo: $("input[name='regSexo']").val()
                        },
                        dataType: 'json',
                        type: 'post',
                        success: response => {
                            if (response.ERROR) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: response.dato,
                                    background: '#17202A',
                                    color: 'white'
                                });
                            } else {
                                $('#frmDatosReg').trigger("reset");
                                Swal.fire({
                                    icon: 'success',
                                    title: 'EXCELENTE',
                                    text: response.dato,
                                    background: '#17202A',
                                    color: 'white'
                                });
                            }
                        }
                    });
                }
            });
        }
    } else {
        Swal.fire({
            title: 'ATENCIÓN!',
            text: "Para continuar con el proceso, por favor acepte los términos y condiciones",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            background: '#17202A',
            color: 'white'
        });
    }
});




// Función para validar formato de correo
function ValidateEmail(input) {

    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let admitidos = ['gmail.com', 'yahoo.com', 'outlook.com'];

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

// Función para validar nombres y apellidos
function ValidateNameLast(input) {
    posicion = input.search(' ');
    if (posicion < 0) {
        return false;

    } else {
        splitInput = input.split(' ');
        if (splitInput[0].length < 3 || splitInput[1].length < 3) {
            return false;
        } else {
            return true;
        }
    }
}

// Función para cargar los municipios
function cargarMunicipios() {
    $('#regMunicipio').empty();

    $.ajax({
        url: 'traerMunicipios',
        type: 'GET',
        success: response => {

            let option = /* html */ `<option value="" class="select">--SELECCIONE MUNICIPIO--</option>`;

            response.municipios.forEach(municipio => {
                option += /* html */ `<option value="${municipio.id}" class="select" >${municipio.nombre}</option>`;
            });

            $('#regMunicipio').html(option);

        }
    });
}

