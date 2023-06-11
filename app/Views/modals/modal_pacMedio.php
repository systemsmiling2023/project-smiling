<!-- Modal Paciente Medios-->
<div class="modal fade" id="pacMediosModal" tabindex="-1" role="dialog" aria-labelledby="pacMediosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="pacMediosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarMedios">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Medios</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="pacMedId" name="pacMedId" readonly>
                                <input type="hidden" id="pacMediosId" name="pacMediosId" readonly>
                                <select class="form-control" name="medioId" id="medioId" style="text-transform:uppercase">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Fecha de Ingreso</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" style="text-transform:uppercase">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>