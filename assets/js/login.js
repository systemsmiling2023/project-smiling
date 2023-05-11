$(() => {

    // FUNCION PARA BOTON DE ENTRAR
    $('#btnEntrar').on('click', e => {
        e.preventDefault();
        let usuario = $('#usuario').val();
        let clave = $('#clave').val();

        if (usuario == "") {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Por favor ingrese usuario',
                showConfirmButton: false,
                timer: 2500,
                background: '#17202A',
                color: 'white'
            });
        } else if (clave == "") {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Por favor ingrese contraseña',
                showConfirmButton: false,
                timer: 2500,
                background: '#17202A',
                color: 'white'
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
                            position: 'center',
                            icon: 'error',
                            title: '¡ATENCIÓN!',
                            html: response.dato,
                            showConfirmButton: true,
                            background: '#17202A',
                            color: 'white'
                        });
                    } else {
                        $(location).attr('href', 'home');
                    }

                    //console.log(response);
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

