$(() => {
    $('#btn_guardar').on('click', function () {
        guardarFranjaHorario();
    });

    $('#btnAddFranjaHorario').on('click', function () {
        $('#franjaHorariosId').val('');
        $('#franjaHorarioModalLabel').html('Nueva Franja Horaria');
        $('#franjaHorarioModal').modal('show');
        $('#error_franjaHorarios').hide();
        cargarDiasA();
        cargarHorariosInicio();
        $('#txtHorarioB').val('');
    });

    $('#txtHorarioA').change(function () {
        let fechaInicio = new Date(`2023-01-01T${$("#txtHorarioA option:selected").text()}:00`);
        fechaInicio.setMinutes(fechaInicio.getMinutes() + 45);
        $("#txtHorarioB").val(`${fechaInicio.getHours()}:${fechaInicio.getMinutes()}`);
    });

    mostrarFranjaHorario();
});

// FUNCION PARA MOSTRAR LOS DATOS EN LA TABLA
function mostrarFranjaHorario() {
    $('#bodyFranjaHorario').empty();
    $.ajax({
        type: "GET",
        url: "buscarFranjaH",
        success: function (response) {
            $.each(response.franjaHorario, function (key, value) {
                let franjaEstado = '';
                if (value['estado'] == 1) {
                    franjaEstado = 'ACTIVO';

                } else {
                    franjaEstado = 'INACTIVO';
                }
                let dia = mostrardia(value['diaSemana']);
                let fecha = value['fechaRegistro'];
                let date = fecha.replace(/[-]/g, '/');
                let jsDate = new Date(date).toLocaleDateString();
                let contenido = /*html*/ `<tr>
                        <td class="text-center">${(key + 1)}</td>
                        <td><i class="fas fa-calendar-day"></i>&nbsp; &nbsp; ${dia.toUpperCase()} </td>
                        <td> &nbsp; &nbsp;${value['horaInicio'].toUpperCase()} </td>
                        <td> &nbsp; &nbsp; ${value['horaFinal'].toUpperCase()} </td>
                        <td> &nbsp; &nbsp; ${jsDate}</td>
                        <td>&nbsp; &nbsp; ${franjaEstado.toUpperCase()} </td>
                        <td class="text-center">
                            <button onclick="actualizarFranjaHorario(${value['horarioId']})" class="btn btn-outline-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button onclick="eliminarFranjaHorario(${value['horarioId']})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;

                $('#bodyFranjaHorario').append(contenido);
            });
        }
    });
};

// GUARDAR FRANJA HORARIO 
function guardarFranjaHorario() {
    $('#error_franjaHorarios').show();
    if ($("#txtDia").val() == null) {
        error_franjaHorario = 'Por favor introduce un dia de la semana';
        $('#error_franjaHorarios').text(error_franjaHorario);
    } else if ($('#txtHorarioB').val() == "") {
        error_franjaHorario = 'Por favor introduce una hora de finalización';
        $('#error_franjaHorarios').text(error_franjaHorario);

    } else {
        if ($('#franjaHorariosId').val() == "") {
            const hoy = new Date();
            day = formatoFecha(hoy);
            url = "almacenarFranja";
            data = {
                dia: $('#txtDia').val(),
                hIni: $('#txtHorarioA').val(),
                hFin: $('#txtHorarioB').val(),
                fecha: day,
                estadofranja: $('#estadoFranjaHorarios').val()
            };
        } else {
            url = "actualizarFranja";
            data = {
                id: $('#franjaHorariosId').val(),
                dia: $('#txtDia').val(),
                hIni: $('#txtHorarioA').val(),
                hFin: $('#txtHorarioB').val(),
                estadofranja: $('#estadoFranjaHorarios').val()
            }
        }

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (response) {
                $('#franjaHorarioModal').modal('hide');
                $('#franjaHorarioModal').find('input').val('');
                mostrarFranjaHorario();
            }
        });
    }

}

function eliminarFranjaHorario(id) {
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
                url: "eliminarFranja",
                data: { id: id },
                type: "POST",
                success: function (response) {
                    mostrarFranjaHorario();
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

function actualizarFranjaHorario(id) {
    $.ajax({
        url: "obtenerIdFranja",
        data: { id: id },
        type: "POST",
        success: function (response) {
            cargarDiasA();
            cargarHorariosInicio();
            $('#franjaHorarioModalLabel').html('Editar Medio de Información');
            $('#franjaHorariosId').val(id);
            $('#txtDia').val(response.franjaHorario.diaSemana);
            $('#txtHorarioA').val(response.franjaHorario.horaInicio.substring(0, 5));
            $('#txtHorarioB').val(response.franjaHorario.horaFinal.substring(0, 5));
            $('#estadoFranjaHorarios').val(response.franjaHorario.estado);
            $('#franjaHorarioModal').modal('show');
        }
    });
};

// FUNCIONES 
function mostrardia(diaSemana, x) {
    if (diaSemana == 1) {
        return x = 'Lunes';
    } else if (diaSemana == 2) {
        return x = 'Martes';
    } else if (diaSemana == 3) {
        return x = 'Miercoles';
    } else if (diaSemana == 4) {
        return x = 'Jueves';
    } else if (diaSemana == 5) {
        return x = 'Viernes';
    } else if (diaSemana == 6) {
        return x = 'Sabado';
    } else {
        return x = 'Domingo';
    }

};

function cargarDiasA() {
    $('#txtDia').empty();
    let dias = ['-- SELECCIONE UN DÍA --', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    dias.forEach((dia, index) => {
        let option = `<option value="${index}" ${(index == 0 ? 'selected disabled' : '')}>${dia}</option>`;
        $('#txtDia').append(option);
    });
};

function cargarHorariosInicio() {
    $('#txtHorarioA').empty();
    let horas = ['-- SELECCIONE UNA HORA--', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00',
        '16:00', '17:00'];
    horas.forEach((hora, index) => {
        let option = `<option value="${hora}" ${(index == 0 ? 'selected disabled' : '')}>${hora}</option>`;
        $('#txtHorarioA').append(option);
    });
};

function formatoFecha(fecha) {
    var day = fecha.getDate();
    var month = fecha.getMonth() + 1;
    var year = fecha.getFullYear();
    return (`${year}-${month}-${day}`);
}





