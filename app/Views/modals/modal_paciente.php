<!-- Modal Pacientes-->
<div class="modal fade" id="pacienteModal" tabindex="-1" role="dialog" aria-labelledby="pacienteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="pacienteModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarPaciente">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Paciente</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="personaId" id="personaId"
                                    style="text-transform:uppercase">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Código</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="pacienteId" name="pacienteId" readonly>
                                <input type="text" class="form-control" id="codPaciente" name="codPaciente"
                                    style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Estado</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-toggle-on"></i>
                                    </div>
                                </div>
                                <select name="estado" id="estado" class="form-control" style="text-transform:uppercase">
                                    <option value="1">ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="error_paciente" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>