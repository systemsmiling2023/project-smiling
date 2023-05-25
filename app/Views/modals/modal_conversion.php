<!-- Modal Conversiones-->
<div class="modal fade" id="conversionModal" tabindex="-1" role="dialog" aria-labelledby="conversionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="conversionModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Unidad</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="uniDetId" name="uniDetId" readonly>
                                <select class="form-control" name="unidadId" id="unidadId"
                                    style="text-transform:uppercase">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Presentación</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="presentacion" name="presentacion"
                                    style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Factor Conversión</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <input type="number" step=0.001 class="form-control" id="factorConversion" name="factorConversion"
                                    style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Insumo</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="insumoId" id="insumoId"
                                    style="text-transform:uppercase">
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