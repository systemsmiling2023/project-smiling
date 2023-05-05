<!-- Modal -->
<div class="modal fade" id="personaContactosModal" tabindex="-1" role="dialog" aria-labelledby="personaContactosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="personaContactosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="contactosForm">
                    <input type="hidden" id="personaId-Contactos" name="personaId-Contactos" value="0">
                    <input type="hidden" id="accionContactos" name="accionContactos" value="agregar">
                    <div id="frmPersonaContactos">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label>Tipo Contacto</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="fas fa-address-book"></i>
                                            </div>
                                        </div>
                                        <input type="hidden" id="contId" name="contId" value="agregar">
                                        <select class="form-control" id="tipoContId" name="tipoContId" onchange="aplicarMascaraContactos();">
                                        </select>
                                    </div>
                                    <label>¿Es contacto principal?</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-toggle-on"></i>
                                            </div>
                                         </div>
                                        <select name="contprincipal" id="contprincipal" class="custom-select">
                                        <option value="1" selected>SI</option>
                                        <option value="0">NO</option>
                                        </select>
                                    </div>
                            </div>
                            <div class='col-6'>
                                        <label>Contacto</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-address-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="valorContacto" name="valorContacto" placeholder="Contacto...">
                                            <div id="email-error"></div>
                                            <span id="error_Contactos" class="text-warning col-md-12"></span>
                                        </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3 offset-6">
                                <button type="button" class="btn btn-primary btn-block" id="btn_guardar_Contactos">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary btn-block" onclick="mostrarOcultarFormulario('frmPersonaContactos', 'divBtnFrmPersonaContactos', 'ocultar');">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <div id="divBtnFrmPersonaContactos" class="row mb-4">
                        <div class="col-3 offset-9">
                            <button type="button" class="btn btn-primary btn-block" onclick="mostrarOcultarFormulario('frmPersonaContactos', 'divBtnFrmPersonaContactos', 'mostrar');"><i class="fas fa-plus"></i> Agregar Contactos</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tblPersonaContactos" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Tipo contacto</th>
                                        <th>Contacto</th>
                                        <th width="5%">Contacto Principal</th>
                                        <th class="text-center" width="14%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyPersonaContactos">

                                </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
</script>