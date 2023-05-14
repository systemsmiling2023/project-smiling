<!-- Modal -->
<div class="modal fade" id="personaDocumentosModal" tabindex="-1" role="dialog" aria-labelledby="personaDocumentosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="personaDocumentosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="personaId-documentos" name="personaId-documentos" value="0">
                    <input type="hidden" id="accionDocumentos" name="accionDocumentos" value="agregar">
                    <div id="frmPersonaDocumentos">
                        <div class="row mb-4">
                            <div class="col-6">
                            <label>Tipo documento</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                <input type="hidden" id="docId" name="docId" value="agregar">
                                <select class="form-control" id="tipoDocId" name="tipoDocId" onchange="aplicarMascaraDocumento();">
                                </select>
                                </div>
                            </div>
                            <div class="col-6">
                            <label>Documento</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                    <input type="text" onkeypress="return event.charCode >= 45 && event.charCode <= 57" class="form-control" id="valorDocumento" name="valorDocumento" placeholder="Documento...">
                                    <span id="error_Documentos" class="text-warning col-md-12"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3 offset-6">
                                <button type="button" class="btn btn-primary btn-block" id="btn_guardar_documentos">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary btn-block" onclick="mostrarOcultarFormulario('frmPersonaDocumentos', 'divBtnFrmPersonaDocumentos', 'ocultar');">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <div id="divBtnFrmPersonaDocumentos" class="row mb-4">
                        <div class="col-3 offset-9">
                            <button type="button" class="btn btn-primary btn-block" onclick="mostrarOcultarFormulario('frmPersonaDocumentos', 'divBtnFrmPersonaDocumentos', 'mostrar');"><i class="fas fa-plus"></i> Agregar Documentos</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tblPersonaDocumentos" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Tipo documento</th>
                                        <th>Documento</th>
                                        <th class="text-center" width="14%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyPersonaDocumentos">

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