<?php $__env->startSection('content'); ?>
    <section class="section-box mt-50">

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <?php echo $__env->make('portal.usuario.navbar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="sidebar-shadow">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Mis Servicios</h4>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.registrar')): ?>
                                    <a href="<?php echo e(route('portal-admin.publicarServicios')); ?>" class="btn btn-success">REGISTRAR</a>
                                <?php endif; ?>

                            </div>
                            <hr>

                            <div class="card-body">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.registrar')): ?>
                                <?php else: ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hola!</strong> Espere ser validado por el area administrativa .
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <div class="job-list-list mb-15">
                                    <div class="list-recent-jobs">



                                        <?php if($publicaciones->count() >=1): ?>
                                            <?php $__currentLoopData = $publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card-job hover-up wow animate__ animate__fadeIn animated"
                                                    style="visibility: visible; animation-name: fadeIn;">
                                                    <div class="card-job-top">


                                                        <div style="display: flex">
                                                            <h6 class="card-job-top--info-heading"><a
                                                                    href="#"><?php echo e($publicacion->tipoServicio->nombres); ?></a>
                                                            </h6>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-7">

                                                                <span class="card-job-top--location text-sm"><i
                                                                        class="fi-rr-marker"></i> San juan de lurigancho
                                                                </span>
                                                                &nbsp;&nbsp;

                                                                &nbsp;&nbsp;
                                                                <span class="card-job-top--post-time text-sm"><i
                                                                        class="fi-rr-clock"></i>
                                                                    <?php echo e($publicacion->created_at); ?></span>
                                                            </div>
                                                            <div class="col-lg-5 text-lg-end">
                                                                <?php if($publicacion->estado_proceso_id == 2): ?>
                                                                    <span class="badge bg-success">APROBADO</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-danger">PENDIENTE</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-job-description mt-20">
                                                        <?php echo e($publicacion->descripcion); ?>

                                                    </div>
                                                    <div class="card-job-bottom mt-25">
                                                        <div class="row">
                                                            <div class="col-lg-10 col-sm-8 col-12">
                                                                <a href="#"
                                                                    class="btn btn-small background-12 mr-5"><?php echo e($publicacion->servicio->nombres); ?>

                                                                </a>
                                                                


                                                            </div>
                                                            <div class="col-md-2">
                                                                <a class="btn btn-warning"
                                                                    href="<?php echo e(route('portal-admin.editarPublicacion', $publicacion)); ?>">Editar</a>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                               <center>
                                                    NO EXISTEN SERVICIOS REGISTRADOS
                                               </center>

                                            </table>
                                        <?php endif; ?>







                                        
                                        <!-- End item job -->
                                    </div>
                                </div>
                                <div class="content-page">

                                    <div class="col-md-12">
                                        <div class="paginations">
                                            <ul class="pager">
                                                <li
                                                    class="page-item <?php echo e($publicaciones->previousPageUrl() ? '' : 'disabled'); ?>">
                                                    <a href="<?php echo e($publicaciones->previousPageUrl()); ?>"
                                                        class="pager-prev"></a>
                                                </li>

                                                <?php if($publicaciones->currentPage() > 3): ?>
                                                    <li class="page-item">
                                                        <a href="<?php echo e($publicaciones->url(1)); ?>" class="pager-number">1</a>
                                                    </li>
                                                    <?php if($publicaciones->currentPage() > 4): ?>
                                                        <li class="page-number disabled">
                                                            <span class="pager-number">...</span>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php $__currentLoopData = $publicaciones->getUrlRange(max($publicaciones->currentPage() - 2, 1), min($publicaciones->currentPage() + 2, $publicaciones->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                        class="page-number <?php echo e($page == $publicaciones->currentPage() ? 'active' : ''); ?>">
                                                        <a href="<?php echo e($url); ?>"
                                                            class="pager-number <?php echo e($page == $publicaciones->currentPage() ? 'active btn btn-warning' : ''); ?>"><?php echo e($page); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($publicaciones->currentPage() < $publicaciones->lastPage() - 2): ?>
                                                    <?php if($publicaciones->currentPage() < $publicaciones->lastPage() - 3): ?>
                                                        <li class="page-number disabled">
                                                            <span class="pager-number">...</span>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li class="page-number">
                                                        <a href="<?php echo e($publicaciones->url($publicaciones->lastPage())); ?>"
                                                            class="pager-number"><?php echo e($publicaciones->lastPage()); ?></a>
                                                    </li>
                                                <?php endif; ?>

                                                <li
                                                    class="page-next <?php echo e($publicaciones->nextPageUrl() ? '' : 'disabled'); ?>">
                                                    <a href="<?php echo e($publicaciones->nextPageUrl()); ?>" class="pager-next"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(session('succes')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Servicio Publicado!!'
            })
        </script>
    <?php endif; ?>
    <?php if(session('actualizacion')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Servicio Actualizado!!'
            })
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/usuario/mis-servicios.blade.php ENDPATH**/ ?>