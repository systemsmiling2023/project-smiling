<?= $this->extend('layouts/main') ?>

<?= $this->section('plugins') ?>

<link rel="stylesheet" href="<?= base_url('public/fullcalendar/main.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">

    <?= $this->include('layouts/header') ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pacientes</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('expediente/paciente') ?>" class="btn btn-primary">Haz clic aquí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->include('modals/modal_agenda') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script> -->
<!-- <script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script> -->
<script src="<?= base_url('public/moment/moment.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@2.9.0/dist/lang/es.js"></script>
<script src="<?= base_url('public/fullcalendar/main.js') ?>"></script>
<script src="<?= base_url('assets/js/calendario.js') ?>"></script>

<?= $this->endSection() ?>