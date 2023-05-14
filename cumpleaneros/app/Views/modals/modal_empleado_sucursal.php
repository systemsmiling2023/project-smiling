<!-- Modal Empleado Sucursal -->
<div class="modal fade" id="empSucModal" tabindex="-1" role="dialog" aria-labelledby="empSucModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="empSucModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="empleadoId-sucursal" name="empleadoId-sucursal" value="0">
                    <input type="hidden" id="accionSucursal" name="accionSucursal" value="agregar">
                    <div id="frmEmpleadoSucursal">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Empleado</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        
                                    </div>
                                    <input type="hidden" id="empSucId" name="empSucId" readonly>

                                    <div name="empleadoId-sucursal" id="empleadoId-sucursal" style="text-transform:uppercase">
                                        <p id="nombreEmpleadoSuc" style="text-transform:uppercase"></p>
                                    </div>
                                    <span id="error_empleadoId" class="text-warning col-md-12"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Sucursal</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-store"></i>
                                        </div>
                                    </div>
                                    <select class="form-control" name="sucursalId" id="sucursalId"
                                        style="text-transform:uppercase">
                                    </select>
                                    <span id="error_sucursalId" class="text-warning col-md-12"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Encargado</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-toggle-on"></i>
                                        </div>
                                    </div>
                                    <select class="form-control" name="esEncargado" id="esEncargado"
                                        style="text-transform:uppercase">
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span id="error_esEncargado" class="text-warning col-md-12"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardarSuc">Guardar</button>
            </div>
        </div>
    </div>
</div>