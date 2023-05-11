<!-- Modal Empleado-->
<div class="modal fade" id="empleadoModal" tabindex="-1" role="dialog" aria-labelledby="empleadoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="empleadoModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Empleado</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="empleadoId" name="empleadoId" readonly>
                                <select class="form-control" name="personaId" id="personaId" style="text-transform:uppercase">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Cargo</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="cargoId" id="cargoId" style="text-transform:uppercase">
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
                        <div class="col-sm-12">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>