<!-- Modal MEDIOS CONOCER -->
<div class="modal fade" id="mediosConocerModal" tabindex="-1" role="dialog" aria-labelledby="mediosconcerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="mediosConocerModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarMediosConocer">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Medios de Información</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-globe"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="mediosConocerId" name="mediosConocerId" readonly>
                                <input type="text" class="form-control" id="conocer" name="conocer" placeholder="Escriba Medio de Información" style="text-transform:uppercase">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-toggle-on"></i>
                                    </div>
                                </div>
                                <select name="estadoMediosConocer" id="estadoMediosConocer" class="custom-select">
                                    <option value="1" selected>ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <span id="error_mediosConocer" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>