<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">

    <?= $this->include('layouts/header') ?>

    <section class="content">
        <div class="container info-box col-md-12">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentista.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Módulo de Personas</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentista.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Módulo de Agenda</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 100%">
                        <img src="<?= base_url('public/dist/img/dentista.png') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Módulo de Expediente</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/js/home.js') ?>"></script>

<?= $this->endSection() ?>