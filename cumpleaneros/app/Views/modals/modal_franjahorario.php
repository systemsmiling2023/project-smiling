<!-- Modal FRANJA HORARIO-->
<div class="modal fade" id="franjaHorarioModal" tabindex="-1" role="dialog" aria-labelledby="franjahorarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="franjaHorarioModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarFranjaHorario">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Franja de Horarios</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="hidden" id="franjaHorariosId" name="franjaHorariosId" readonly>
                                    <select  class="form-control" name="txtDia" id="txtDia">
                                        
                                    </select>
                            </div>
                               
                            <div>
                                <label>Inicio horario</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <select class="form-control"  name="txtHorarioA" id="txtHorarioA">
                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Estado</label>
                            <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-toggle-on"></i>
                                        </div>
                                    </div>
                                    <select name="estadoFranjaHorarios" id="estadoFranjaHorarios" class="custom-select">
                                        <option value="1" selected>ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>

                                <div id="divD">
                                <label for="txtHorarioB">Fin horario</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="txtHorarioB" name="txtHorarioB" class="form-control" placeholder="Seleccione horario inicio" readonly>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="error_franjaHorarios" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>