<?= $this->extend('layouts/main') ?>

<?= $this->section('plugins') ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/sweetalert2.css') ?>">

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
                                    <h3 class="card-title">Agenda | Cumpleañeros</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="mes">Mes:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <select class="form-control" name="mes" id="mes"
                                            style="text-transform:uppercase">
                                            <option value="">Seleccione el mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">

                            </div>
                            <table id="cumpleanero" class="table table-striped table-bordered table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Edad</th>
                                        <th>Categoría</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyCumpleanero">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>





<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/cumpleanero.js') ?>"></script>

<?= $this->endSection() ?>