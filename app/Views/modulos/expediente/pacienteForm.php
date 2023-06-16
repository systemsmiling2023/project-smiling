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
                                    <!--<button type="button" id="btnAddPaciente" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i>
                                        Agregar Nuevo
                                    </button>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body container">
                            <form class="form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Paciente</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <input type="hidden" id="pacienteId" name="pacienteId" readonly>
                                            <select class="form-control" name="personaId" id="personaId"
                                                style="text-transform:uppercase">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Estado</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-toggle-on"></i>
                                                </div>
                                            </div>
                                            <select name="estado" id="estado" class="form-control"
                                                style="text-transform:uppercase">
                                                <option value="1">ACTIVO</option>
                                                <option value="0">INACTIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Medio</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <select class="form-control" name="medioId" id="medioId"
                                                style="text-transform:uppercase">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Intereses</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <select class="form-control" name="interesId" id="interesId"
                                                style="text-transform:uppercase">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Patologías</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <select class="form-control" name="patologiaId" id="patologiaId"
                                                style="text-transform:uppercase">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Encargados</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="responsableId"
                                                name="responsableId" style="text-transform:uppercase">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="back">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('/public/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/paciente.js') ?>"></script>

<?= $this->endSection() ?>