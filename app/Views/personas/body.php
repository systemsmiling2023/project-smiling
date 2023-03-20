<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar
            </button>

            <br>
            <br>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Usuario</td>
                        <td>Creacion</td>
                        <td>Estado</td>
                    </tr>
                </thead>
                <tbody>
                    <?php /*foreach ($usuarios as $key => $usuario) {  ?>
                        <!-- <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $usuario['nombreUsuario'] ?></td>
                            <td><?= $usuario['fechaCreaUsuario'] ?></td>
                            <td><?= $usuario['estadoUsuario'] ?></td>
                        </tr> -->
                    <?php } */ ?>
                </tbody>
            </table>
        </div>
    </div>
</div>