<!-- Modal Paciente Intereses -->
<div class="modal fade" id="pacienteInteresModal" tabindex="-1" role="dialog"
    aria-labelledby="pacienteInteresModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="pacienteInteresModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="pacienteId-interes" name="pacienteId-interes" value="0">
                    <input type="hidden" id="accionInteres" name="accionInteres" value="agregar">
                    <div class="collapse" id="collapseExample">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label>Intereses</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" id="interesPacienteId" name="interesPacienteId"
                                        value="agregar">
                                    <select class="form-control" id="interesId" name="interesId">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3 offset-6">
                                <button type="button" class="btn btn-primary btn-block"
                                    id="btn_guardar_interes">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary btn-block"
                                data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <div id="divBtnFrmPacienteInteres" class="row mb-4">
                        <div class="col-3 offset-9">
                            <button type="button" class="btn btn-primary btn-block"
                            data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i
                                    class="fas fa-plus"></i> Agregar Intereses</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tblPacienteInteres" class="table table-striped table-bordered table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No.</th>
                                    <th>Interés</th>
                                    <th class="text-center" width="14%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyPacienteInteres">

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