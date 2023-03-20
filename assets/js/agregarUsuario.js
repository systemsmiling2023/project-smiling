$('#btnAgregarUsuario').on('click', () => {
    let usuario = $('#usuario').val();
    let clave = $('#clave').val();

    if (usuario == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor ingrese usuario',
            showConfirmButton: false,
            timer: 1500
        });
    } else if (clave == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Por favor ingrese contraseña',
            showConfirmButton: false,
            timer: 1500
        });
    } else {

        $.ajax({
            url: 'addUser',
            data: { usuario: usuario, clave: clave },
            dataType: 'json',
            type: 'POST',
            success: response => {
                console.log(response);
            }
        });
    }

});