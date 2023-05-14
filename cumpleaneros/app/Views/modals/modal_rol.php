<!-- Modal -->
<div class="modal fade" id="rolModal" tabindex="-1" role="dialog" aria-labelledby="rolModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="rolModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmRoles">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Rol de Usuario</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="rolId" name="rolId" readonly>
                                <input type="text" class="form-control" id="rol" name="rol" placeholder="Escriba nombre de Rol" style="text-transform:uppercase">
                                <span id="error_rol" class="text-warning col-md-12"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Descripción</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-keyboard"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Describa el Rol" style="text-transform:uppercase">
                                <span id="error_rol" class="text-warning col-md-12"></span>
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
                                <select name="estado" id="estado" class="custom-select">
                                    <option value="1" selected>ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                                <span id="error_rol" class="text-warning col-md-12"></span>
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