<?= $this->extend('layouts/main') ?>

<?= $this->section('plugins') ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/sweetalert2.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/select2/css/select2.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <?= $this->include('layouts/header') ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="card-title">Expediente | Pacientes</h3>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="btnAddPaciente" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i>
                                        Agregar Nuevo
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="paciente" class="table table-striped table-bordered table-hover"
                                style="width:100%">
                                <thead style="text-transform:uppercase">
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Código</th>
                                        <th>Paciente</th>
                                        <th>Estado</th>
                                        <th class="text-center" width="10%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyPaciente" style="text-transform:uppercase">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<input type="hidden" id="txtPacienteId">

<?= $this->include('modals/modal_paciente') ?>
<?= $this->include('modals/modal_paciente_medios')?>
<?= $this->include('modals/modal_paciente_interes')?>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('/public/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/paciente.js') ?>"></script>

<?= $this->endSection() ?>