<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/public/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/sweetalert2.css') ?>">

    <title>Smiling</title>
</head>




<body style="background:#17202A">
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div style="margin-top:100px !important" class="bg-dark px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight text-white">
                            Clínica Dental<br />
                            <span class="text-primary">Smiling</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                            quibusdam tempora at cupiditate quis eum maiores libero
                            veritatis? Dicta facilis sint aliquid ipsum atque?
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0 center">
                        <div class="card" style="background:#616A6B">
                            <div class="card-body py-5 px-md-5">
                                <h3>Inicio Sesión</h3>
                                <form>

                                    <!-- User input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="usuario" name="usuario" class="form-control" autocomplete="off" />
                                        <label class="form-label" for="form3Example3">Usuario</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="clave" name="clave" class="form-control" />
                                        <label class="form-label" for="form3Example4">Contraseña</label>
                                    </div>



                                    <!-- Submit button -->
                                    <button id="btnEntrar" class="btn btn-outline-primary btn-block mb-4">
                                        Entrar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>




    <!-- Section: Design Block -->
    <script src="<?= base_url('/public/jquery.js') ?>"></script>
    <script src="<?= base_url('/public/popper.js') ?>"></script>
    <script src="<?= base_url('/public/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('/public/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/login.js') ?>"></script>

</body>

</html>