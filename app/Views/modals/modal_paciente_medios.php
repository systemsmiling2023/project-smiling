<!-- Modal Paciente Medios -->
<div class="modal fade" id="pacienteMediosModal" tabindex="-1" role="dialog" aria-labelledby="pacienteMediosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="pacienteMediosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="pacienteId-medios" name="pacienteId-medios" value="0">
                    <input type="hidden" id="accionMedios" name="accionMedios" value="agregar">
                    <div id="frmPacienteMedios">
                        <div class="row mb-4">
                            <div class="col-6">
                            <label>Medios</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                <input type="hidden" id="pacMedId" name="pacMedId" value="agregar">
                                <select class="form-control" id="medioId" name="medioId" >
                                </select>
                                </div>
                            </div>
                            <div class="col-6">
                            <label>Fecha Registro</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" >
                                    <span id="error_Medios" class="text-warning col-md-12"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3 offset-6">
                                <button type="button" class="btn btn-primary btn-block" id="btn_guardar_medios">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary btn-block" onclick="mostrarOcultarFormulario('frmPacienteMedios', 'divBtnFrmPacienteMedios', 'ocultar');">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <div id="divBtnFrmPacienteMedios" class="row mb-4">
                        <div class="col-3 offset-9">
                            <button type="button" class="btn btn-primary btn-block" onclick="mostrarOcultarFormulario('frmPacienteMedios', 'divBtnFrmPacienteMedios', 'mostrar');"><i class="fas fa-plus"></i> Agregar Medios</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tblPacienteMedios" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Medios</th>
                                        <th>Fecha Registro</th>
                                        <th class="text-center" width="14%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyPacienteMedios">

                                </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
</script>