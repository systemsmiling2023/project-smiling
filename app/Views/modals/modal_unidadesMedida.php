<!-- Modal -->
<div class="modal fade" id="unidadMedidaModal" tabindex="-1" role="dialog" aria-labelledby="unidadMedidaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="unidadMedidaModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmUnidadMedida">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Unidad Medida</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-weight"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="unidaMedidaId" name="unidaMedidaId" readonly>
                                <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" placeholder="Escriba Unidad de Medida" style="text-transform:uppercase">
                            </div>
                            <label>Abreviatura</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-weight"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="abreviatura" name="abreviatura" placeholder="Escriba Abreviatura Ejem: 'A' " style="text-transform:uppercase">
                            </div>
                            <label>Medida Internacional</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                      <i class="fas fa-toggle-on"></i>
                                      </div>
                                  </div>
                                  <select name="tipoMedida" id="tipoMedida" class="custom-select">
                                      <option value="1" selected>MEDIDA INTERNACIONAL</option>
                                      <option value="0">CONVERSIÓN PERSONALIZADA</option>
                                  </select>
                              </div>
                          </div>    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <span id="error_unidadMedida" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>