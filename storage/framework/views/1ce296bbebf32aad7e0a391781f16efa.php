



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
                                <h3>Lista de Comentarios</h3>

                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="result-table"
                                        class="table table-responsive  datatables-basic dtr-column collapsed ">
                                        <thead>
                                            <tr>
                                                <th>Datos de Contratado</th>
                                                <th>Publicacion</th>
                                                <th>Ver Publicacion</th>
                                                <th>Estado</th>


                                            </tr>
                                        </thead>
                                        <tbody id="result-table">

                                            <?php if($calificaciones->isEmpty()): ?>
                                                <tr>
                                                    <td colspan="4" class="text-center"> No hay Solicitudes de comentarios.</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $calificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>


                                                        <td>
                                                            <?php echo e($calificacion->personas->nombres ?? ''); ?>

                                                            <?php echo e($calificacion->personas->apellido_paterno ?? ''); ?>

                                                            <?php echo e($calificacion->personas->apellido_paterno ?? ''); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($calificacion->publicacion->nombres ?? 'No hay comentario'); ?>


                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('servicio-portal.show', $calificacion->publicacion->slug)); ?>"
                                                                class="btn btn-success" target="_blank"> Ver </a>

                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn <?php echo e($calificacion->estado_proceso_id == '1' ? 'btn-warning' : 'btn-success'); ?>">
                                                                <?php echo e($calificacion->estado_proceso_id == '1' ? $calificacion->estadosProceso->nombres : $calificacion->estadosProceso->nombres); ?>


                                                            </button>
                                                        </td>




                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="content-page">

                                <div class="col-md-12">
                                    <div class="paginations">
                                        <ul class="pager">
                                            <li
                                                class="page-item <?php echo e($calificaciones->previousPageUrl() ? '' : 'disabled'); ?>">
                                                <a href="<?php echo e($calificaciones->previousPageUrl()); ?>" class="pager-prev"></a>
                                            </li>

                                            <?php if($calificaciones->currentPage() > 3): ?>
                                                <li class="page-item">
                                                    <a href="<?php echo e($calificaciones->url(1)); ?>" class="pager-number">1</a>
                                                </li>
                                                <?php if($calificaciones->currentPage() > 4): ?>
                                                    <li class="page-number disabled">
                                                        <span class="pager-number">...</span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php $__currentLoopData = $calificaciones->getUrlRange(max($calificaciones->currentPage() - 2, 1), min($calificaciones->currentPage() + 2, $calificaciones->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li
                                                    class="page-number <?php echo e($page == $calificaciones->currentPage() ? 'active' : ''); ?>">
                                                    <a href="<?php echo e($url); ?>"
                                                        class="pager-number <?php echo e($page == $calificaciones->currentPage() ? 'active btn btn-warning' : ''); ?>"><?php echo e($page); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($calificaciones->currentPage() < $calificaciones->lastPage() - 2): ?>
                                                <?php if($calificaciones->currentPage() < $calificaciones->lastPage() - 3): ?>
                                                    <li class="page-number disabled">
                                                        <span class="pager-number">...</span>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="page-number">
                                                    <a href="<?php echo e($calificaciones->url($calificaciones->lastPage())); ?>"
                                                        class="pager-number"><?php echo e($calificaciones->lastPage()); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <li class="page-next <?php echo e($calificaciones->nextPageUrl() ? '' : 'disabled'); ?>">
                                                <a href="<?php echo e($calificaciones->nextPageUrl()); ?>" class="pager-next"></a>
                                            </li>
                                        </ul>
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

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/usuario/cliente/index.blade.php ENDPATH**/ ?>