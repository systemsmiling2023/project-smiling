<!-- Modal Proveedor-->
<div class="modal fade" id="proveedorModal" tabindex="-1" role="dialog" aria-labelledby="proveedorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="proveedorModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Proveedor</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="proveedorId" name="proveedorId" readonly>
                                <select class="form-control" name="personaId" id="personaId"
                                    style="text-transform:uppercase">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Razón Social</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="razonSocial" name="razonSocial"
                                    style="text-transform:uppercase">
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