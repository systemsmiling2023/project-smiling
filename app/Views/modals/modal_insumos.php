<!-- Modal -->
<div class="modal fade" id="insumosModal" tabindex="-1" role="dialog" aria-labelledby="insumosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="insumosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmInsumos">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Insumos</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-first-aid"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="insumosId" name="insumosId" readonly>
                                <input type="text" class="form-control" id="insumo" name="insumo" placeholder="Escriba un Insumo" style="text-transform:uppercase">
                            </div>
                            <label>Categoria</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-toggle-on"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="categoriaId" id="categoriaId" style="text-transform:uppercase">
                                </select>
                            </div>
                            <label>Unidades Medida</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-weight"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="unidadId" id="unidadId" style="text-transform:uppercase">
                                </select>
                            </div>
                            <label>Fecha Ultima Compra</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="date" class="form-control" id="fechaUlCompra" name="fechaUlCompra">
                            </div>
                            <label>Costo Ultima Compra</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="fas fa-money-bill-alt"></i>
                                      </div>
                                  </div>
                                  <input type="text" oninput="validarFloat(event)" class="form-control" id="costoUltCompra" name="costoUltCompra">
                              </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                              <label>Cantidad Maxima</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="fas fa-sort-amount-up"></i>
                                      </div>
                                  </div>
                                  <input type="number" class="form-control" id="cantMax" onkeypress="ValidaSoloNumeros()" name="cantMax">
                            </div>
                        </div>
                        <div class="col-sm-6">
                              <label>Cantidad Minima</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="fas fa-sort-amount-down"></i>
                                      </div>
                                  </div>
                                  <input type="number" class="form-control" id="cantMin" onkeypress="ValidaSoloNumeros()" name="cantMin">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <span id="error_insumos" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>