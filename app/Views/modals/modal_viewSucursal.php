<!-- Vista Empleado Sucursal-->
<div class="modal fade bd-sucursalModal-lg" id="sucursalModal" tabindex="-1" role="dialog" aria-labelledby="sucursalModalLabel"
    aria-hidden="true" style="text-transform:uppercase">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-primary">
                <h5 class="modal-title" id="sucursalModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h3 class="card-title text-left" type="hidden">&nbsp; &nbsp;&nbsp;
                                                &nbsp;&nbsp; &nbsp;</h3>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <button type="button" id="btnAddEmpleadoSucursal"
                                                class="btn btn-primary btn-block">
                                                <i class="fas fa-plus"></i>
                                                Agregar Sucursal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="empleadoSucursal" class="table table-striped table-bordered table-hover"
                                        style="width:100%">
                                        <thead style="text-transform:uppercase">
                                            <tr>
                                                <th class="text-center" width="5%">No.</th>
                                                <th>Empleado</th>
                                                <th>Sucursal</th>
                                                <th>Encargado</th>
                                                <th class="text-center" width="10%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyEmpleadoSucursal" style="text-transform:uppercase">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('modals/modal_empleado_sucursal') ?>

