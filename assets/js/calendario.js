
var Calendar = FullCalendar.Calendar;
var calendarElemento = document.getElementById('calendar');
var eventos = [];

renderizarCalendario();

$('#btn_guardar').on('click', evt => {
    evt.preventDefault();

    // Validando los campos obligatorios
    if ($('#sucursalAgenda').val() == "") {
        mostrarAlertaRequire('error_sucursalAgenda', 'Por favor seleccione la sucursal');

    } else if ($('#estadoAgenda').val() == "") {
        mostrarAlertaRequire('error_estadoAgenda', 'Por favor seleccione el estado de la cita');

    } else if ($('#fechaAgenda').val() == "") {
        mostrarAlertaRequire('error_fechaAgenda', 'Por favor seleccione la fecha de la cita');

    } else if ($('#horarioAgenda').val() == "") {
        mostrarAlertaRequire('error_horarioAgenda', 'Por favor seleccione la hora de la cita');
    } else {
        guardarCita();
    }
});





function renderizarCalendario() {
    $.ajax({
        url: 'agenda',
        data: {},
        type: 'get',
        success: response => {
            eventos = response;

            var calendar = new Calendar(calendarElemento, {
                events: eventos,
                height: 550,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                locale: 'es',
                dateClick: info => {
                    abrirModalAgendar(info)
                }
            });

            calendar.render();
        }
    });
}

function abrirModalAgendar(info) {
    cargarSucursales();
    cargarHorarios(info.dateStr);
    reiniciarFormulario();
    // $('#profesionId').val('');
    $('#agendarModalLabel').html('Agendando Nueva Cita');
    $('#agendarModal').modal('show');
    $('#fechaAgenda').val(info.dateStr);
}

function reiniciarFormulario() {
    $('#frmAgendar').trigger('reset');
    $('#fechaAgenda').focus();
};

function cargarSucursales() {
    $('#sucursalAgenda').empty();
    $.ajax({
        url: 'sucursales',
        type: 'get',
        success: response => {
            response.forEach(element => {
                let option = `<option value="${element['sucursalId']}" > ${element['referencia'].toUpperCase()}</option>`;
                $('#sucursalAgenda').append(option);
            });
        }
    });
}

function cargarHorarios(fecha) {
    $('#horarioAgenda').empty();
    $.ajax({
        url: 'horaDisponible',
        data: { fecha: fecha },
        type: 'post',
        success: response => {
            response.forEach(element => {
                let option = `<option value="${element['horarioId']}" > ${element['horaInicio']}</option>`;
                $('#horarioAgenda').append(option);
            });
        }
    });
}

function guardarCita() {
    let sucursalId = $('#sucursalAgenda').val();
    let estadoAgenda = $('#estadoAgenda').val();
    let fechaAgenda = $('#fechaAgenda').val();
    let horarioAgenda = $('#horarioAgenda').val();
    let comentarioAgenda = $('#comentarioAgenda').val();

    let data = { sucursalId, estadoAgenda, fechaAgenda, horarioAgenda, comentarioAgenda };

    // Guardar la información
    $.ajax({
        url: 'agendar',
        data: { citaAgenda: data },
        type: 'POST',
        success: response => {
            reiniciarFormulario();
            $('#agendarModal').modal('hide');
            renderizarCalendario();
        }
    });
}

function mostrarAlertaRequire(elemento, texto) {
    item = '#' + elemento;
    $(item).html(texto);
    setTimeout(() => {
        $(item).html('');
    }, 3500);
}

