<div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
        <li class="nav-item me-auto"><a class="navbar-brand" href="<?php echo e(route('menu-principal.index')); ?>">
                <span class="brand-logo">


                    <img src="/images/pngegg.png" width="32px">
                    

                    
                </span>
                <h2 class="brand-text">PORTAL TR.</h2>
            </a></li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                    class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                    class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                    data-ticon="disc"></i></a></li>
    </ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



        <li class="nav-item <?php echo e(Request::is('menu-principal') ? 'active' : ''); ?>"> <a class="d-flex align-items-center "
                href="<?php echo e(route('menu-principal.index')); ?>">

                <i data-feather="home"></i>
                <span class="menu-title text-truncate" data-i18n="Email">Menú Principal</span></a>
        </li>



        <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Administración</span><i
                data-feather="more-horizontal"></i>
        </li>






        <li class="nav-item <?php echo e(Request::is('especialidad') | Request::is('especialidad/*') ? 'active' : ''); ?>"><a
                class="d-flex align-items-center" href="<?php echo e(route('especialidad.index')); ?>">
                <i data-feather='briefcase'></i>
                <span class="menu-title text-truncate" data-i18n="Chat">Especialidades</span></a>
        </li>


        <li class="nav-item <?php echo e(Request::is('tipo-servicio') | Request::is('tipo-servicio/*') ? 'active' : ''); ?>"><a
                class="d-flex align-items-center" href="<?php echo e(route('tipo-servicio.index')); ?>">
                <i data-feather='cloud-rain'></i>
                <span class="menu-title text-truncate" data-i18n="Chat">Tipo Servicio</span></a>
        </li>

        <li class="nav-item <?php echo e(Request::is('admin-servicio') | Request::is('admin-servicio/*') ? 'active' : ''); ?>"><a
                class="d-flex align-items-center" href="<?php echo e(route('servicio.index')); ?>">

                <i data-feather='columns'></i>

                <span class="menu-title text-truncate" data-i18n="Chat">Servicios</span></a>
        </li>
        <li
            class="nav-item <?php echo e(Request::is('admin-comentarios') | Request::is('admin-comentarios/*') ? 'active' : ''); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('admin-comentario.index')); ?>">

                <i data-feather='message-circle'></i>

                <span class="menu-title text-truncate" data-i18n="Chat">Comentarios</span></a>
        </li>

        <li
            class="nav-item <?php echo e(Request::is('admin-solicitudes') | Request::is('admin-solicitudes/*') ? 'active' : ''); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('solicitud.index')); ?>">
                <i data-feather='inbox'></i>
                <span class="menu-title text-truncate" data-i18n="Chat">Solicitudes</span></a>
        </li>

        <li
            class="nav-item <?php echo e(Request::is('admin-usuarios-registrados') | Request::is('admin-usuarios-registrados/*') ? 'active' : ''); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('usuario-registrado.index')); ?>">

                <i data-feather='user-check'></i>
                <span class="menu-title text-truncate" data-i18n="Chat">Usuarios Registrados</span></a>
        </li>

        <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Seguridad</span><i
                data-feather="more-horizontal"></i>
        </li>

        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                    class="menu-title text-truncate" data-i18n="Invoice">Seguridad</span></a>
            <ul class="menu-content">
                <li class="nav-item <?php echo e(Request::is('usuario') | Request::is('usuario/*') ? 'active' : ''); ?>">
                    <a class="d-flex align-items-center" href="<?php echo e(route('usuario.index')); ?>"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Usuarios</span></a>
                </li>
                <li class="nav-item <?php echo e(Request::is('role') | Request::is('role/*') ? 'active' : ''); ?>">
                    <a class="d-flex align-items-center" href="<?php echo e(route('role.index')); ?>"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="Preview">Roles</span></a>
                </li>

            </ul>
        </li>

    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/layouts/sidebar/index.blade.php ENDPATH**/ ?>