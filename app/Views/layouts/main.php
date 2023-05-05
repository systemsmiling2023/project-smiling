<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?></title>

    <link rel="shortcut icon" href="<?= base_url('public/dist/img/diente2.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('public/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
    <?= $this->renderSection('plugins') ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('public/dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <?= $this->include('layouts/navbar') ?>

        <?= $this->include('layouts/sidebar') ?>

        <?= $this->renderSection('content') ?>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h4>UCAD</h4>
                        <p class="justify">
                            Este es un sistema de gestión empresarial para la Clínica Dental Smiling.
                            Se ha desarrollado y diseñado con base a los requerimientos de la Dra. Jacqueline Zepeda,
                            a quien se le agradece mucho su apoyo durante todo el proyecto.
                        </p>
                        <br>
                        Integrantes:
                        <ul>
                            <li>Guadalupe Pineda</li>
                            <li>Carlos Tamayo</li>
                            <li>David Hernández</li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <?= $this->include('layouts/footer') ?>

    </div>

    <script src="<?= base_url('public/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= base_url('public/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
    <script src="<?= base_url('public/jquery-mapael/maps/usa_states.min.js') ?>"></script>
    <script src="<?= base_url('public/chart.js/Chart.min.js') ?>"></script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>