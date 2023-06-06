$(() => {
    $('#btnAddPaciente').on('click', function(){
        $('#pacienteId').val('');
        $('#pacienteModalLabel').html('Nuevo Paciente');
        $('#pacienteModal').modal('show');
        $('#frmAgregarPaciente').trigger('reset');
        $('#error_paciente').hide();
        $('#divEstado').val(''); 
    });

    
});