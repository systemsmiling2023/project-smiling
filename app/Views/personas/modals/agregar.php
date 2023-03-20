<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-6">
                            <label for="clave">Clave</label>
                            <input type="text" name="clave" id="clave" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnAgregarUsuario">Guardar Usuario</button>
            </div>
        </div>
    </div>
</div>