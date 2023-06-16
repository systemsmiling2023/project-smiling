<!-- Modal Paciente Patologías -->
<div class="modal fade" id="pacientePatologiaModal" tabindex="-1" role="dialog"
    aria-labelledby="pacientePatologiaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="pacientePatologiaModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="pacienteId-patologia" name="pacienteId-patologia" value="0">
                    <input type="hidden" id="accionPatologia" name="accionPatologia" value="agregar">
                    <div class="collapse" id="collapseExamplePatologia">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label>Patologías</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-disease"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" id="patologiaPacienteId" name="patologiaPacienteId">
                                    <select class="form-control" id="patologiaId" name="patologiaId">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="divBtnFrmPacientePatologia" class="row mb-4">
                        <div class="col-3 offset-6">
                            <button type="button" class="btn btn-primary btn-block"
                                id="btn_guardar_patologia">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button id="showHide" type="button" class="btn btn-primary btn-block" data-toggle="collapse"
                                data-target="#collapseExamplePatologia" aria-expanded="false" aria-controls="collapseExamplePatologia"><i
                                    class="fas fa-plus"></i> Agregar Patología</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tblPacientePatologia" class="table table-striped table-bordered table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No.</th>
                                    <th>Patología</th>
                                    <th class="text-center" width="14%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyPacientePatologia">

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