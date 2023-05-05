<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title">Administración | Profesión Empleados</h3>
                </div>
                <div class="col-md-2">
                    <button type="button" id="btnAddEmpProf" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i>
                        Agregar Profesión
                    </button>
                </div>
            </div>
        </div>
        <!--<div class="card-body">
                <table id="empProf" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead style="text-transform:uppercase; text-align: center;">
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th>Empleado</th>
                            <th>Profesión</th>
                            <th class="text-center" width="10%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyEmpProf" style="text-transform:uppercase">

                    </tbody>
                </table>
            </div>-->
        <div class="card-body">
            <table id="EmpProf" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead style="text-transform:uppercase;">
                    <tr>
                        <th class="text-center" width="5%">No.</th>
                        <th>Empleado</th>
                        <th>Profesión</th>
                        <th class="text-center" width="10%">Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyEmpProfJoin" style="text-transform:uppercase">

                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->include('modals/modal_empProf') ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/empProf.js') ?>"></script>

<?= $this->endSection() ?>