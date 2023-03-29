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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Módulos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Personas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agenda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expediente</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('tipodocumento') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipo de Documento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('intereses') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Intereses o Gustos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('profesiones') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profesiones</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('agenda') ?>" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Agenda
                            <span class="right badge badge-danger">Nuevo</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>