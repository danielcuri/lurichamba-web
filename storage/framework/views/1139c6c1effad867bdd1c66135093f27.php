<?php $__env->startSection('content'); ?>
    <div class="breacrumb-cover">
        <div class="container">
            <ul class="breadcrumbs mt-4">
                <li><a href="<?php echo e(route('servicio-portal.index')); ?>">Inicio</a></li>
                <li>Detalle Servicio</li>
            </ul>
        </div>
    </div>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="employers-header-2">
                        <div class="heading-image-rd online" style="background: #F1A405;border-radius:6.5rem">
                            <a href="#">
                                


                                <figure><img alt="jobhub"
                                        src="<?php echo e($publicacion->servicio->tipoServicio->icono_url ? Storage::url($publicacion->servicio->tipoServicio->icono_url) : '/recursos-sjl/imagenes/ICONO-USUARIO_100X100.png'); ?>">
                                </figure>
                            </a>
                        </div>
                        <div class="heading-main-info">
                            <h4><?php echo e($publicacion->nombres); ?></h4>
                            <div class="head-info-profile">
                                
                                <span class="text-small mr-20"><i class="fi-rr-briefcase text-mutted"></i>
                                    <?php echo e($publicacion->servicio->nombres); ?> /
                                    <?php echo e($publicacion->tipoServicio->nombres); ?></span>
                                <span class="text-small"><i class="fi-rr-clock text-mutted"></i>
                                    <?php echo e(\Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d-m-Y')); ?></span>

                                <div class="rate-reviews-small">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $promedioValoraciones): ?>
                                            <span><img src="<?php echo e(asset('portal/assets/imgs/theme/icons/star.svg')); ?>"
                                                    alt="jobhub" /></span>
                                        <?php else: ?>
                                            <span><img src="<?php echo e(asset('portal/assets/imgs/theme/icons/star-grey.svg')); ?>"
                                                    alt="jobhub" /></span>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="ml-10 text-muted text-small">(<?php echo e($promedioValoraciones ?? 0); ?>.00)</span>
                                </div>





                            </div>

                            <div class="d-flex justify-content-end">

                                <a href="tel:+51<?php echo e($publicacion->personas->numero_celular); ?>"
                                    class="btn btn-default">Contactame</a>


                                <a href="https://wa.me/<?php echo e($publicacion->personas->numero_celular); ?>?text=Hola!%20¿Cómo%20estás?%20Estoy%20interesado%20en%20el%20servicio%20<?php echo e($publicacion->nombres); ?>.%20¿Podrías%20proporcionarme%20más%20información%20al%20respecto,%20por%20favor?"
                                    class="btn" target="_blank"
                                    style="background: #25D366;color:white;font-size:20px;margin-left:6px">
                                    <i class="fa fa-whatsapp my-floata"></i>
                                    <b style="font-size: 18px">WhatsApp</b>
                                </a>

                            </div>

                        </div>
                    </div>

                    <div class="content-single">
                        <h4 class="mb-20">Detalle Servicio</h4>
                        <p>
                            <?php echo e($publicacion->descripcion); ?>

                        </p>

                        <div class="divider"></div>




                    </div>



                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    


                    <?php if(session('usuario')): ?>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(route('portal-admin.clienteComentariosLibre', $publicacion)); ?>"
                                    class="registrar-comentario" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">

                                        <div class="col-md-12 mt-3">
                                            <label for="" class="form-label fw-bold">Ingrese un
                                                Comentario</label>
                                            <textarea class="form-control" name="comentario" id="" cols="100" rows="300" minlength="5"
                                                maxlength="100" required></textarea>
                                        </div>
                                        <div class="col-md-12 mt-3">

                                            <div style="float: right;">
                                                <label for="" class="form-label fw-bold">Calificación:</label>
                                                <span class="rateYo" data-rating="">
                                                </span>
                                                <input type="hidden" class="rating-input" name="rating" value="2">

                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-success mt-2" style="float: right">Publicar
                                                Comentario</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>

                    


                    <div class="card mt-2">
                        <div class="card-body">
                            <?php if($calificaciones->isEmpty()): ?>
                                <h5 class="text-center">No hay comentarios en esta publicacion.</h5>
                            <?php else: ?>
                                <h4>Reseñas de los clientes con el Servicio</h4>
                                <hr>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $calificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">

                                            <p class="fw-bold"><?php echo e(Str::upper($calificacion->clientes->nombres)); ?>

                                                <?php echo e(Str::upper($calificacion->clientes->apellido_paterno)); ?></p>

                                            <div class="rate-reviews-small">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($i <= $calificacion->valor): ?>
                                                        <span><img
                                                                src="<?php echo e(asset('portal/assets/imgs/theme/icons/star.svg')); ?>"
                                                                alt="jobhub" /></span>
                                                    <?php else: ?>
                                                        <span><img
                                                                src="<?php echo e(asset('portal/assets/imgs/theme/icons/star-grey.svg')); ?>"
                                                                alt="jobhub" /></span>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <span
                                                    class="ml-10 text-muted text-small">(<?php echo e($calificacion->valor); ?>.00)</span>
                                            </div>
                                            <p><?php echo e($calificacion->comentario); ?>

                                            </p>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                                <div class="col-md-6">
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
                                                        class="pager-number <?php echo e($page == $calificaciones->currentPage() ? 'btn btn-warning' : ''); ?>"><?php echo e($page); ?></a>
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
                            <?php endif; ?>
                        </div>
                    </div>



                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-shadow">
                        <h5 class="font-bold">Descripción general</h5>
                        <div class="sidebar-list-job mt-10">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Servicio</span>
                                        <strong class="small-heading"><?php echo e($publicacion->servicio->nombres); ?></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-user"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Creador</span>
                                        <strong class="small-heading"><?php echo e($publicacion->personas->nombres); ?> <br>
                                            <?php echo e($publicacion->personas->apellido_paterno); ?></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-call-outgoing"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Celular</span>
                                        <strong class="small-heading">+51
                                            (<?php echo e($publicacion->personas->numero_celular); ?>)<br>
                                        </strong>
                                    </div>
                                </li>

                                

                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Año</span>
                                        <strong
                                            class="small-heading"><?php echo e(\Carbon\Carbon::parse($publicacion->fecha_registrada)->format('Y')); ?></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Publicado</span>
                                        <strong
                                            class="small-heading"><?php echo e(\Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d-m-Y')); ?></strong>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-list-job mt-10">
                            <a href="tel:+51<?php echo e($publicacion->personas->numero_celular); ?>"
                                class="btn btn-default mr-10">Contactame</a>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">



                </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(".rateYo").each(function(index, element) {
                var $rateYo = $(element);
                var $ratingInput = $rateYo.closest('.card').find(
                    '.rating-input'); // Assuming the input has a class 'rating-input'

                $rateYo.rateYo({
                    rating: 2, // Set a default value (you can adjust this)
                    fullStar: true,
                    onSet: function(rating, rateYoInstance) {
                        $ratingInput.val(
                            rating); // Set the selected rating value in the input field
                    }
                });
            });
        });
    </script>
    <?php if(session('error')): ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Inicie Sesión, Por Favor",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Se Registro su comentario, satisfactoriamente",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>

    <?php if(session('error-comentario')): ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "No puede comentar su propia publicación.",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>
    <script>
        $('.registrar-comentario').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de guardar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Guardar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/portal/servicios/show.blade.php ENDPATH**/ ?>