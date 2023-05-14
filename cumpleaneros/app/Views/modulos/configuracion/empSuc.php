<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title">Administración | Sucursal Empleados</h3>
                </div>
                <div class="col-md-2">
                    <button type="button" id="btnAddEmpSuc" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i>
                        Agregar Sucursal
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="empSuc" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead style="text-transform:uppercase">
                    <tr>
                        <th class="text-center" width="5%">No.</th>
                        <th>Empleado</th>
                        <th>Sucursal</th>
                        <th>Encargado</th>
                        <th class="text-center" width="10%">Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyEmpSuc" style="text-transform:uppercase">

                </tbody>
            </table>
        </div>
        <!--<div class="card-body">
                <table id="empSucJoin" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead style="text-transform:uppercase">
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th>Empleado</th>
                            <th>Sucursal</th>
                            <th>Encargado</th>
                            <th class="text-center" width="10%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyEmpSucJoin" style="text-transform:uppercase">

                    </tbody>
                </table>
            </div>-->
    </div>
</div>


<?= $this->include('modals/modal_empSuc') ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/empSuc.js') ?>"></script>

<?= $this->endSection() ?>