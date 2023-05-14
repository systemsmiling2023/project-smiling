<!-- Modal Empleado Profesión -->
<div class="modal fade" id="empleadoProfesionModal" tabindex="-1" role="dialog" aria-labelledby="empleadoProfesionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="empleadoProfesionModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmEmpleadoProfesion">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Empleado</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="hidden" id="empProfId" name="empProfId" readonly>
                                <div name="empleadoId" id="empleadoId" style="text-transform:uppercase">
                                    <p id="nombreEmpleado" style="text-transform:uppercase"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Profesión</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="profesionId" id="profesionId" style="text-transform:uppercase">
                                </select>
                                <span id="error_profesionId" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardarProfesion">Guardar</button>
            </div>
        </div>
    </div>
</div>