    <div class="sidebar-shadow">
        <h5 class="font-bold text-center">Mi Información</h5>
        <hr>
        <div class="text-center" style="border-radius: 20px 0 20px 0;">

            <?php if(session('usuario')->profile_photo_path): ?>
                <img src="<?php echo e(Storage::url(session('usuario')->profile_photo_path)); ?>" alt="Image"
                    style="border-radius: 20px 0 20px 0;
            margin-bottom: 10px;
            box-shadow: 0px 5px 20px 3px rgba(230, 233, 249, 0.9); width: 150px "
                    class="rounded-circle shadow-4">
            <?php else: ?>
                <img src="<?php echo e(asset('/sinfoto.png')); ?>" alt="jobhub" />
            <?php endif; ?>


            <div class="avatar-mane">

                <?php if(session('usuario')): ?>
                    <p>Bienvenido, <?php echo e(session('usuario')->nombres); ?>

                    </p>
                <?php else: ?>
                    <p>No estás autenticado.</p>
                <?php endif; ?>

            </div>
        </div>

        <div class="sidebar-list-job mt-10">

            <ul class="nav nav-pills nav-justified flex-column">


                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('portal-admin') ? 'active' : ''); ?>" aria-current="page"
                        href="<?php echo e(route('usuario-portal.index')); ?>">Dashboard</a>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('perfil.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/perfil')|Request::is('portal-admin/perfil-editar')  ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.perfil')); ?>">Perfil</a>
                    </li>
                <?php endif; ?>

                

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/mis-servicios') || Request::is('portal-admin/publicar-servicios') || Request::is('portal-admin/editar-publicacion/*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.misservicios')); ?>">Servicios</a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('documentos.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/mis-documentos') || Request::is('portal-admin/registrar-documentos') ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.misDocumentos')); ?>">Mis Documentos</a>
                    </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comentarios-contrata.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/cliente-comentarios') ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.indexClienteComentarios')); ?>">Comentarios Pendientes</a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/lista-clientes') ||Request::is('portal-admin/registrar-clientes') ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.indexClientes')); ?>">Clientes</a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('credenciales.index')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('portal-admin/cambiar-credenciales') ? 'active' : ''); ?>"
                            href="<?php echo e(route('portal-admin.cambiarCredenciales')); ?>">Actualizar Credenciales y Foto de Perfil</a>
                    </li>
                <?php endif; ?>


            </ul>
        </div>

        <div class="sidebar-list-job mt-10 text-center">

            <form action="<?php echo e(route('portal.logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-default mr-10">Cerrar Sesión</button>

            </form>

        </div>


    </div>
<?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/usuario/navbar/index.blade.php ENDPATH**/ ?>