$(()=>{
    sucursal();
    $('#mes').on('change', function () {
        let mes = $(this).val();
        $('#sucursalId').on('change', function() {
            let sucursalId = $(this).val();
            if (mes && sucursalId) {
                mostrarCumples(sucursalId, mes);
            }
        });
    });
});

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

function mostrarCumples(sucursalId, mes) {
    $('#bodyCumpleanero').html('');
    $.ajax({
        type: "POST",
        data: { 
            id: sucursalId,
            m: mes
        },
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

