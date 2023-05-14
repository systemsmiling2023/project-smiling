<!-- Modal PERSONAS-->
<div class="modal fade" id="personasModal" tabindex="-1" role="dialog" aria-labelledby="personasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="personasModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="frmAgregarPersonas">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Nombres</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" id="personasId" name="personasId" readonly>
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba sus nombres" style="text-transform:uppercase" required >
                                </div>
                            <label>Tercer apellido</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="apellidoTres" name="apellidoTres" placeholder="Escriba su tercer apellido" style="text-transform:uppercase"  >
                                </div>
                            <label>Detalle dirección</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="detalleDire" name="detalleDire" placeholder="Escriba complemento dirección" style="text-transform:uppercase" required >
                                </div>
                            <div id="divEstado">
                                <label>Estado</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-toggle-on"></i>
                                        </div>
                                    </div>
                                        <select name="estadoPersona" id="estadoPersona" class="custom-select" required >
                                        <option value="1" selected>ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Primer Apellido</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="apellidoUno" name="apellidoUno" placeholder="Escriba su primer apellido" style="text-transform:uppercase" required >
                                </div>
                            <label>Fecha Nacimiento</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" id="fechaNac" name="fechaNac" placeholder="Escriba su primer apellido" style="text-transform:uppercase" required >
                                </div>
                                <label>Sexo</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-toggle-on"></i>
                                    </div>
                                </div>
                                    <select name="sexoPersona" id="sexoPersona" class="custom-select" required >
                                    <option value="" selected>SELECCION UNA OPCIÓN</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <label>Segundo Apellido</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="apellidoDos" name="apellidoDos" placeholder="Escriba su segundo apellido" style="text-transform:uppercase" required >
                                </div>
                            <label>Municipio</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                        <select  class="form-control" name="municipios" id="municipios" required >
                                        </select>
                                </div>
                            <label>Tipo de persona</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <i class="fas fa-user-friends"></i>
                                        </div>
                                    </div>
                                    <select name="tipoPersona" id="tipoPersona" class="custom-select">
                                        <option value="N" selected>NATURAL</option>
                                        <option value="j">JURIDA</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="error_personas" class="text-warning col-md-12"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>