<!-- Modal -->
<div class="modal fade" id="agendarModal" tabindex="-1" role="dialog" aria-labelledby="agendarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="agendarModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgendar">

                    <!-- Primera fila -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Sucursal</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-clinic-medical"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="profesionId" name="profesionId" readonly>
                                <select class="form-control" id="sucursalAgenda" name="sucursalAgenda"></select>
                                <span id="error_sucursalAgenda" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Estado</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="estadoAgenda" value="A" name="estadoAgenda">
                                <input type="text" class="form-control" value="AGENDADA" disabled>
                                <span id="error_estadoAgenda" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda fila -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Fecha</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="date" class="form-control" id="fechaAgenda" name="fechaAgenda">
                                <span id="error_fechaAgenda" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Horario Disponible</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <select class="form-control" id="horarioAgenda" name="horarioAgenda"></select>
                                <span id="error_horarioAgenda" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Tercera fila -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Comentarios</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-comment-alt"></i>
                                    </div>
                                </div>
                                <textarea class="form-control" id="comentarioAgenda" name="comentarioAgenda" cols="30" rows="4" placeholder="¿Algo que deseas que sepamos para tu consulta? 🤓"></textarea>
                                <span id="error_sucursalAgenda" class="text-warning col-md-12"></span>
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