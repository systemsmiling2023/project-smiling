<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>



<div class="content-wrapper">

    <?= $this->include('layouts/header') ?>

    <section class="content">
        <div class="container info-box col-md-12">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentistaMod1.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class=" text-info">Módulo de Personas</h3>
                            <p class="card-text">En esta sección puede configurar todo lo relacionado a las personas, empleados y pacientes.</p>
                            <a href="#" class="btn btn-primary">Entrar a Módulo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentistaMod2.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class=" text-info">Módulo de Agenda</h3>
                            <p class="card-text">En esta sección puede visualizar las citas agendadas, canceladas y realizadas por calendario.</p>
                            <a href="agenda/main" class="btn btn-primary">Entrar a Módulo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentistaMod3.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class=" text-info">Módulo de Expediente</h3>
                            <p class="card-text">En esta sección puede visualizar y actualizar toda la información esencial del paciente y expediente clínico.</p>
                            <a href="#" class="btn btn-primary">Entrar a Módulo</a>
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
<script src="<?= base_url('/public/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/home.js') ?>"></script>
<script src="<?= base_url('assets/js/notificarVencimiento.js') ?>"></script>

<?= $this->endSection() ?>