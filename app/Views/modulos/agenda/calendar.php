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
                                <h4 class="card-title">Arrastrar Eventos</h4>
                            </div>
                            <div class="card-body">
                                <div id="external-events">
                                    <div class="external-event bg-success">Comprar Mercadería</div>
                                    <div class="external-event bg-warning">Revisar Inventario</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            Quitar después de usar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crear Evento</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Título Evento">

                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script src="<?= base_url('public/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('public/fullcalendar/main.js') ?>"></script>
<script src="<?= base_url('assets/js/calendario.js') ?>"></script>

<?= $this->endSection() ?>