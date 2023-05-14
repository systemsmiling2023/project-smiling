<!-- Modal -->
<div class="modal fade" id="tipodocModal" tabindex="-1" role="dialog" aria-labelledby="tipodocModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="tipodocModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmTipoDocumentos">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Tipo de Documento</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="tipoDocumentoId" name="tipoDocumentoId" readonly>
                                <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento" placeholder="Escriba Tipo de Documento" style="text-transform:uppercase">
                                <span id="error_tipoDocumento" class="text-warning col-md-12"></span>
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