<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="<?= base_url('public/dist/img/diente2.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('/public/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/fontawesome/css/all.min.css') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('/assets/css/login.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('/public/sweetalert2/sweetalert2.min.css') ?>">

    <title>Smiling | Registro </title>
</head>

<style>
    ::placeholder {
        color: #17202A !important;
        opacity: 0.5;
    }

    input {
        color: white !important;
    }
</style>



<body style="background:#17202A">
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div style="margin-top:30px !important" class="bg-dark px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-7 mb-7 mb-lg-0">
                        <div class="card text-left" style="background:#616A6B">
                            <div class="card-body py-3 px-md-5">
                                <h3 class="text-white">Registro</h3>
                                <form class="form text-white" id="frmDatosReg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fas fa-user-edit"></i> <label for="regNombres"> &nbsp; Nombres:</label>
                                            <input id="regNombres" name="regNombres" type="text" class="form-control bg-secondary" placeholder="Escriba sus nombres">
                                            <span id="error_regNombres" class="text-warning col-md-12"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fas fa-user-edit"></i> <label for="regApellido1"> &nbsp; Primer Apellido:</label>
                                            <input id="regApellido1" name="regApellido1" type="text" class="form-control bg-secondary" placeholder="Escriba su primer apellido">
                                            <span id="error_regApellido1" class="text-warning col-md-12"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fas fa-user-edit"></i> <label for="regApellido2"> &nbsp;  Segundo Apellido:</label>
                                            <input id="regApellido2" name="regApellido2" type="text" class="form-control bg-secondary" placeholder="Escriba su segundo apellido">
                                            <span id="error_regApellido2" class="text-warning col-md-12"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fas fa-user-edit"></i> <label for="regApellido3"> &nbsp;  Tercer Apellido (Casada) :</label>
                                            <input id="regApellido3" name="regApellido3" type="text" class="form-control bg-secondary" placeholder="Escriba su apellido de casada">
                                            <span id="error_regApellido3" class="text-warning col-md-12"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <i class="fas fa-calendar"></i> <label for="regFechaNac"> &nbsp; Fecha Nacimiento:</label>
                                            <input id="regFechaNac" name="regFechaNac" type="date" class="form-control bg-secondary">
                                            <span id="error_regFechaNac" class="text-warning col-md-12"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-id-card"></i> <label for="regDUI"> &nbsp; DUI:</label>
                                            <input id="regDUI" name="regDUI" type="text" class="form-control bg-secondary" placeholder="Escriba su DUI">
                                            <span id="error_regDUI" class="text-warning col-md-12"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-mobile-alt"></i> <label for="regTelefono"> &nbsp; Teléfono:</label>
                                            <input id="regTelefono" name="regTelefono" type="text" class="form-control bg-secondary" placeholder="Escriba su teléfono">
                                            <span id="error_regTelefono" class="text-warning col-md-12"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <i class="fas fa-at"></i> <label for="regEmail"> &nbsp; Correo Electrónico:</label>
                                            <input id="regEmail" name="regEmail" type="email" class="form-control bg-secondary" placeholder="Escriba correo electrónico">
                                            <span id="error_regEmail" class="text-warning col-md-12"></span>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <i class="fas fa-map-marked-alt"></i> <label for="regMunicipio"> &nbsp; Municipio:</label>
                                            <select name="regMunicipio" id="regMunicipio" class="form-control bg-secondary select select2" style="color:white !important"></select>
                                            <!-- <input id="regMunicipio" name="regMunicipio" type="text" class="form-control bg-secondary" placeholder="Seleccione su municipio de residencia"> -->
                                            <span id="error_regMunicipio" class="text-warning col-md-12"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-8">
                                            <i class="fas fa-map-pin"></i> <label for="regDireccion"> &nbsp; Dirección:</label>
                                            <input id="regDireccion" name="regDireccion" type="text" class="form-control bg-secondary" placeholder="Escriba dirección específica">
                                            <span id="error_regDireccion" class="text-warning col-md-12"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-user-edit"></i> <label for=""> &nbsp; Sexo:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="regSexo" id="regSexoMasculino" value="M">
                                                <label class="form-check-label" for="regSexoMasculino">
                                                    Masculino
                                                </label>
                                                &nbsp; &nbsp; &nbsp;
                                                <input class="form-check-input" type="radio" name="regSexo" id="regSexoFemenino" value="F">
                                                <label class="form-check-label" for="regSexoFemenino">
                                                    Femenino
                                                </label>
                                            </div>
                                            <span id="error_regSexo" class="text-warning col-md-12"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkTerminosCondiciones">
                                                <label class="form-check-label" for="checkTerminosCondiciones">
                                                    <a href="#" id="terminosCondiciones" class="text-white"> &nbsp; Acepto Términos y Condiciones</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="btnEnviarReg" class="btn btn-outline-primary btn-block"> <i class="fas fa-paper-plane"></i> Enviar</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="login" class=""><span class="badge badge-warning">INICIAR SESIÓN</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Espacio para Información de Smiling -->
                    <div class="col-lg-5 mb-6 mb-lg-0">
                        <i class="fas fa-tooth text-secondary fa-4x" id="dienteSmiling"></i>
                        <h1 class="my-5 display-3 fw-bold ls-tight text-white">
                            Clínica Dental<br />
                            <span class="text-primary" id="tituloSmiling">Smiling</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            ¡NOS ENCANTA VERTE SONREÍR!
                        </p>
                        <div class="text-center text-white">
                            <a href="https://www.facebook.com/Clinica-Dental-Smiling-110639324421123" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook m-3" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/clinicadentalsmiling/" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram m-3" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                            <a href="" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp m-3" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>




    <!-- Section: Design Block -->
    <script src="<?= base_url('/public/jquery.js') ?>"></script>
    <script src="<?= base_url('/public/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('/public/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('/public/maskinput.js') ?>"></script>
    <script src="<?= base_url('/assets/js/registro.js') ?>"></script>

</body>

</html>