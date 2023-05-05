$(() => {
    $('#btn_guardar').on('click', function () {
        guardarUsuarios();
    });

    $('#btnAddUsuarios').on('click', function () {
        $('#frmAgregarUsuario').trigger('reset');
        cargarNombres();
        $('#divPersona').show();
        $('#usuarioId').val('');
        $('#usuariosModalLabel').html('Nuevo Usuario');
        $('#error_mediosConocer').hide();
        $('#error_usuarios').hide();
        $("#divClave").show();
        $("divEditarClave").hide();
        $("#divEditarClaveInputs").toggle(false);
        $("#divEditarClave").toggle(false);
        $("#mostrarContraseña").show();
        $('input[type=checkbox]').prop('checked',false);
        $('#txtClave').attr('type', 'password');
    });

    $('#mostrar_contrasena').click(function () {
        if ($('#mostrar_contrasena').is(':checked')) {
          $('#txtClave').attr('type', 'text');
        } else {
          $('#txtClave').attr('type', 'password');
        }
      });

    $("#flgPasswordSi").on('click', function (e) {
        $("#flgPass").val(1);
        $("#divEditarClaveInputs").toggle(true);
    });

    $("#flgPasswordNo").on('click', function (e) {
        $("#flgPass").val(0);
        $("#divEditarClaveInputs").toggle(false);
    });

    mostrarUsuario();
    cargarRoles();


});

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarUsuario() {
    $('#bodyUsuarios').empty();
    $.ajax({
        type: "GET",
        url: "mostrarUsuarios",
        success: function (response) {
            $.each(response.usuarios, function (key, value) {
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['usuario'].toUpperCase()} </td>
                        <td>&nbsp; &nbsp; ${value['nombres'].toUpperCase() +' '+ value['primerApellido'].toUpperCase() +' '+value['segundoApellido'].toUpperCase()} </td>
                        <td>&nbsp; &nbsp; ${value['rol'].toUpperCase()} </td>
                        <td class="text-center">
                            <button id="btnActualizar" onclick="actualizarUsuario(${value['usuarioId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarUsuario(${value['usuarioId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyUsuarios').append(contenido);
            });
        }
    });
};

function guardarUsuarios() {
    if ($('#usuarioId').val() == "") {
        validarDatos()
        url = "almacenarUsuarios";
        data = {
                persona: $('#txtNombrePersona').val(),
                rol: $('#txtRol').val(),
                usuario: $('#txtUsuario').val(),
                clave: $('#txtClave').val()
        };
    } else {
        url = "actualizarUsuario";
        data = {
            id: $('#usuarioId').val(),
            rol:  $('#txtRol').val(),
            usuario: $('#txtUsuario').val(),
            clave: $('#txtNuevaClave').val(),
            persona: $('#txtNombrePersona').val()
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
                    timer: 1500
                });
            } else {   
            $('#usuariosModal').modal('hide');
            mostrarUsuario();
            }
        }
    });

};

function actualizarUsuario(id) { 
    $('input[type=checkbox]').prop('checked',false);
    $("#divPersona").hide();
    $("#divEditarClave").show();
    $("#divClave").hide();
    $("#divEditarClaveInputs").toggle(false);
    $("#mostrarContraseña").hide();
    
    $.ajax({
        url: "obtenerUsuarioId",
        data: { id: id },
        type: "POST",
        success:  function (response) {  
            $('#usuariosModalLabel').html('Editar Usuario');
            $('#usuarioId').val(id); 
            $('#txtRol').val(response.personas.rolId);
            $('#txtUsuario').val(response.personas.usuario);
            $('#txtNombrePersona').val(response.personas.personaId);
            $('#usuariosModal').modal('show');
        }
    });
    
};

function eliminarUsuario(id) {
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
                url: "eliminarUsuario",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarUsuario();
                    Swal.fire(
                        '¡Hecho!',
                        'Elemento eliminado con éxito',
                        'success'
                    );
                }
            });
        }
    });
};

function cargarNombres() {
    $('#txtNombrePersona').empty();
    $.ajax({
        url: 'mostrarPersona',
        type: 'GET',
        success: function (data) {
            if(data.personas.length === 0){
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Ya no se tienen mas personas para crear usuarios',
                    showConfirmButton: false,
                    timer: 1700
                });
                $('#usuariosModal').modal('hide');
            }else {
                $('#usuariosModal').modal('show');
                $.each(data.personas, function (index,value)  {
                    if(index == 0){
                        let op = '<option value="0" >Seleccione...</option>';
                        $('#txtNombrePersona').append(op);
                    }else {
                    }
                    let option = `<option value="${value['personaId']}" >${value['nombres'].toUpperCase() +' '+ value['primerApellido'].toUpperCase() + ' '+ value['segundoApellido'].toUpperCase()}</option>`;
                    $('#txtNombrePersona').append(option);
                });
            }
        }
    });
};

function cargarRoles() {
    $('#txtRol').empty();
    $.ajax({
        url: 'mostrarRol',
        type: 'GET',
        success: function (data) {
            $.each(data.roles, function (index,value)  {
                if(index == 0){
                    let op = '<option value="0" >Seleccione...</option>';
                    $('#txtRol').append(op);
                }else {
                }
                let option = `<option value="${value['rolId']}" > ${value['rol'].toUpperCase()}</option>`;
                $('#txtRol').append(option);
            });
        }
    });
};

function validarDatos(){
    $('#error_usuarios').show();
    if ($("#txtNombrePersona").val() == 0) {
        error_usuario = 'Por favor seleccione una persona';
        $('#error_usuarios').text(error_usuario);
    }else if($("#txtRol").val() == 0){
        error_usuario = 'Por favor seleccione un rol';
        $('#error_usuarios').text(error_usuario);
    }else if($("#txtUsuario").val() == ""){
        error_usuario = 'Por favor digite su usuario.';
        $('#error_usuarios').text(error_usuario);
    }else if($("#txtClave").val() == ""){
        error_usuario = 'Por favor digite su clave ';
        $('#error_usuarios').text(error_usuario);
    }else if (isNaN($('#txtUsuario').val())){ 

    }else{
        error_usuario = 'Por favor no ingrese numeros';
        $('#error_usuarios').text(error_usuario); 
    }
};

function generarNombreUsuario(num) {
    let nombrePersona = $("#txtNombrePersona option:selected").text().split(" ");
    let correlativoUsuario = "";
    if(num > 0) {
        correlativoUsuario = num;
    } else {
    }
    $.ajax({
        url: "verificarNombreUsuario",
        data: { usuario: nombrePersona[0].substring(0,1) + nombrePersona[1] + correlativoUsuario},
        type: "POST",
        success: function (response) {
            if(response.data == 'Agregar') {
                $("#txtUsuario").val(nombrePersona[0].substring(0,1) + nombrePersona[1] + correlativoUsuario);
                $("#txtClave").val($("#txtUsuario").val());
            } else {
                generarNombreUsuario(num+1);
            }
        }
    });
};
