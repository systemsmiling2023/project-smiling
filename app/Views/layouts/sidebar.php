<style>
    .itemMarginLeft{
        margin-left: 20px !important;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('home') ?>" class="brand-link text-center">
        <i class="fas fa-home"></i>
        <span class="brand-text">Clínica Dental Smiling</span>
    </a>

    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Lista para ver los módulos -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="text-secondary nav-icon fas fa-th"></i>
                        <p>
                            Módulos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon itemMarginLeft"></i>
                                <p>Personas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('agenda/main') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon itemMarginLeft"></i>
                                <p>Agenda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon itemMarginLeft"></i>
                                <p>Expediente</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Lista para configuración del sistema -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="text-secondary nav-icon fas fa-tools"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">11</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('config/tipodocumento') ?>" class="nav-link">
                                <i class="fas fa-id-card nav-icon itemMarginLeft"></i>
                                <p>Tipo de Documento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/intereses') ?>" class="nav-link">
                                <i class="fas fa-heart nav-icon itemMarginLeft"></i>
                                <p>Intereses o Gustos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/profesiones') ?>" class="nav-link">
                                <i class="fas fa-tools nav-icon itemMarginLeft"></i>
                                <p>Profesiones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/mediosconocer') ?>" class="nav-link">
                                <i class="fas fa-globe nav-icon itemMarginLeft"></i>
                                <p>Medios Conocer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/franjahorario') ?>" class="nav-link">
                                <i class="fas fa-calendar-day nav-icon itemMarginLeft"></i>
                                <p>Franjas de Horarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/personas') ?>" class="nav-link">
                                <i class="fas fa-user nav-icon itemMarginLeft"></i>
                                <p>Personas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/usuarios') ?>" class="nav-link">
                                <i class="fas fa-user nav-icon itemMarginLeft"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/rol') ?>" class="nav-link">
                                <i class="fas fa-user-tag nav-icon itemMarginLeft"></i>
                                <p>Roles de Usuario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/tipocontacto') ?>" class="nav-link">
                                <i class="fas fa-comments nav-icon itemMarginLeft"></i>
                                <p>Tipo de Contacto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/empleado') ?>" class="nav-link">
                                <i class="fas fa-user nav-icon itemMarginLeft"></i>
                                <p>Empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/cargo') ?>" class="nav-link">
                                <i class="fas fa-user-md nav-icon itemMarginLeft"></i>
                                <p>Cargos Empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('config/proveedor') ?>" class="nav-link">
                                <i class="fas fa-user-md nav-icon itemMarginLeft"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- <li class="nav-item">
                    <a href="<?= base_url('agenda/main') ?>" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Agenda
                            <span class="right badge badge-danger">Nuevo</span>
                        </p>
                    </a>
                </li> -->

                <!-- Cerrar Sesión -->
                <li class="nav-item">
                    <a href="<?= base_url('cerrarSesion') ?>" class="nav-link">
                        <i class="text-secondary nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>