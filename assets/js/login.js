$(() => {

    // FUNCION PARA BOTON DE ENTRAR
    $('#btnEntrar').on('click', e => {
        e.preventDefault();
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
                url: 'validarLogin',
                data: { usuario: usuario, clave: clave },
                dataType: 'json',
                type: 'POST',
                beforeSend: () => {
                    console.log();
                },
                success: response => {
                    if (response.ERROR) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: response.dato,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        $(location).attr('href', 'home');
                    }
                }
            });
        }

    });
});

$('#usuario').focus(function () {
    $('#labelUsuario').css('color', '#343a40');
});

$('#usuario').focusout(function () {
    $('#labelUsuario').css('color', '#616A6B');
});

$('#clave').focus(function () {
    $('#labelClave').css('color', '#343a40');
});

$('#clave').focusout(function () {
    $('#labelClave').css('color', '#616A6B');
});

