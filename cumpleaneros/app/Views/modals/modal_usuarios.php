<!-- Modal -->
<div class="modal fade" id="usuariosModal" tabindex="-1" role="dialog" aria-labelledby="usuariosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="usuariosModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarUsuario">
                    <div class="row">
                        <div class="col-sm-12">
                                <div id="divPersona">
                                    <label for="txtPasNombrePersona">Persona</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="hidden" id="usuarioId" name="usuarioId" readonly>
                                        <select class="form-control" name="txtNombrePersona" id="txtNombrePersona" onchange="generarNombreUsuario(0);">
                                        </select>
                                    </div>
                                </div>
                                <div id="divRol">
                                    <label for="txtRol">Rol</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-users"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" name="txtRol" id="txtRol">
                                        </select>
                                    </div>
                                </div>
                                <div id="divUsuario">
                                    <input type="hidden" name="id_Usuario" id="id_Usuario">
                                    <label for="txtUsuario">Usuario</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario...">
                                        </div>
                                </div>
                                <div id="divClave">
                                    <label for="txtClave">Clave</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="txtClave" id="txtClave" placeholder="Clave...">
                                    </div>
                                </div>
                                <div id="divEditarClave" style="display: none;">
                                        <label for="flgPasswordS">¿Cambiará la contraseña?</label><br>
                                        <input type="checkbox" id="flgPasswordSi" title=""/>&nbsp;&nbsp;Si, cambiar &nbsp;&nbsp;
                                        <input type="checkbox" id="flgPasswordNo" title=""/>&nbsp;&nbsp;No, mantener actual
                                </div>
                                <br>
                                <div id="divEditarClaveInputs" style="display: none;">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="txtNuevaClave" id="txtNuevaClave" placeholder="Nueva Clave...">
                                    </div>
                                </div>
                                <div id='mostrarContraseña'>
                                    <input type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
                                    &nbsp;&nbsp;Mostrar Contraseña
                                </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <span id="error_usuarios" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>