<?= $this->extend('layouts/main') ?>

<?= $this->section('plugins') ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/sweetalert2.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session('rolId') === 'ADMIN'): ?>

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
                                    <h3 class="card-title">Administración | Insumos Vencidos</h3>
                                </div>
                                <!--<div class="col-md-2">
                                    <button type="button" id="btnAddProfesion" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i>
                                        Agregar Nueva
                                    </button>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="listaVencidos" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Insumo</th>
                                        <th>Fecha Caducidad</th>
                                        <th>Fecha Ultima compra</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyInsumosVencidos">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- JavaScript -->
<script src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/listaVencidos.js') ?>"></script>

<?= $this->endSection() ?>