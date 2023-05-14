$(()=>{
    //Mostrando mes actual por defecto, luego el usuario puede seleccionar el mes que desee
    const mesActual = new Date().getMonth() + 1; 
    $('#mes').val(mesActual);
    
    $('#mes').on('change', function () {
        let mes = $(this).val();
        mostrarCumples(mes);
    })
});

function mostrarCumples(mes) {
    $('#bodyCumpleanero').html('');
    $.ajax({
        type: "POST",
        data: { m: mes },
        url: "mostrarCumples",
        success: function (response) {
            //console.log(response);
            let contenido = '';
            $.each(response.cumpleanero, function (key, value) {
                let fecha = value['fechaNacimiento'];
                let date = fecha.replace(/[-]/g, '/');
                let fechaNac = new Date(date).toLocaleDateString();
                let edad = calcularEdad(date);
                contenido += /*html*/ `<tr>
                            <td class="text-center">${(key + 1)}</td>
                            <td><i class="fas fa-user"></i> &nbsp; &nbsp; ${value['nombres'].toUpperCase()} &nbsp;${value['primerApellido'].toUpperCase()} </td>
                            <td>&nbsp; &nbsp; ${fechaNac} </td>
                            <td>&nbsp; &nbsp; ${edad} </td>
                            <td>&nbsp; &nbsp; ${value['categoria'].toUpperCase()}</td>
                            <td class="text-center">
                                <button onclick="" class="btn btn-primary">Enviar email</i></button>
                            </td>
                        </tr>`;
            });
            $('#bodyCumpleanero').html(contenido);
        }
    });
};

function calcularEdad(fechaNacimiento) {
    const hoy = new Date();
    const cumpleanos = new Date(fechaNacimiento);
    let edad = hoy.getFullYear() - cumpleanos.getFullYear();
    const mes = hoy.getMonth() - cumpleanos.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < cumpleanos.getDate())) {
      edad--;
    }
    return edad;
}

