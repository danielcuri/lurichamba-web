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
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>Dashboard</h3>

                                </div>

                                <div class="col-md-5">





                                    <?php if(session('usuario')->tipo_utilidad_id == 2 && session('usuario')->estado_proceso_id != 3): ?>
                                        <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                            data-bs-target="#modalSolicitaOfrecer">
                                            Solicitar Ofrecer
                                            Servicio
                                        </button>
                                    <?php elseif(session('usuario')->tipo_utilidad_id == 1 && session('usuario')->estado_proceso_id != 4): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.registrar')): ?>
                                            <form id="contratar" action="<?php echo e(route('portal-admin.solicitarContratarServicio')); ?>"
                                                method="post" style="float: left;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('put'); ?>
                                                <button type="submit" class="btn btn-default">Solicitar Contratar
                                                    Servicios</button>

                                            </form>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </div>

                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <hr>
                            <!-- Button trigger modal -->

                            <?php if(session('usuario')->tipo_utilidad_id == 2 && session('usuario')->estado_proceso_id != 3): ?>
                                <!-- Modal -->
                                <div class="modal fade" id="modalSolicitaOfrecer" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSolicitaOfrecerLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form id="ofrecer" class="contact-form-style"
                                            action="<?php echo e(route('portal-admin.guardar-documentos-ofrecer')); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalSolicitaOfrecerLabel">Solicitar Ofrecer
                                                        Servicio</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <p>Al solicitar ofrecer servicios, se requiere que se registre el
                                                        Certificado Único Laboral.</p>


                                                    <div class="row wow animate__animated animate__fadeInUp"
                                                        data-wow-delay=".1s">


                                                        <div class="col-md-12 mt-3">


                                                            <label for="" class="form-label">Subir Certificado Único
                                                                laboral. <span><a style="color: red"
                                                                        href="https://www.gob.pe/47089-obtener-tu-certificado-unico-laboral-cul"
                                                                        target="_blank">Descague su certificador único
                                                                        laboral.</a></span></label>



                                                            <input type="file" class="form-control"
                                                                name="otro_documento">
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">GUARDAR</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="card-body">

                                <div class="row ">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.registrar')): ?>
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold"><?php echo e($datos->total); ?></h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Portal</h6>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow background-12 ">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold"><?php echo e($datos->aceptadas); ?></h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Aceptadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow background-urgent"
                                                style="background-color: #ffc107">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold"><?php echo e($datos->pendientes); ?></h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Pendientes</h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <?php if(session('usuario')->tipo_utilidad_id == 1): ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Hola!</strong> Espere ser validado por el area administrativa .
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('servicios.registrar')): ?>
                                        <div class="col md-12">
                                            <h5>Últimas Publicaciones Recientes:</h5>
                                            <hr>

                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr class="list-group list-group-numbered ">
                                                            <td class="rounded">

                                                                <?php $__currentLoopData = $datos->ultimos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="list-group-item">
                                                                        <div class="fw-bold">
                                                                            
                                                                            <?php echo e($publicacion->nombres); ?>

                                                                        </div>
                                                                        Fecha Registrada:
                                                                        
                                                                        <?php echo e(\Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d/m/Y H:i:s')); ?>


                                                                        <span
                                                                            class="badge <?php echo e($publicacion->estado_proceso_id == 2 ? 'bg-success' : 'bg-warning'); ?>"><?php echo e($publicacion->estado_proceso_id == 2 ? 'Aceptado' : 'Pendiente'); ?></span>

                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endif; ?>



                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        /* .texto-dash {
                                                                                                                                                font-size: 12px;
                                                                                                                                                font-weight: bolder;
                                                                                                                                            } */


        .texto-dash {
            font-size: 11px !important;
            word-wrap: break-word;
            /* Romper palabras cuando sea necesario */

        }

        @media (max-width: 768px) {
            .texto-dash {
                font-size: 10px !important;
                /* Ajustar el tamaño del texto para dispositivos más pequeños */
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('sweetalert2.all.min.js')); ?>"></script>

    <script src="<?php echo e(asset('jquery-3.6.4.min.js')); ?>"></script>


    <?php if(session('contratar')): ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Se envio su solicitud, para Contratar Servicios",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>


    <?php if(session('ofrecer')): ?>
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se envio su solicitud, para Ofrecer Servicios",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>




    <script>
        $('#ofrecer').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Solicitar Ofrecer Servicio?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Solicitar Ofrecer Servicio!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>


    <script>
        $('#contratar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Solicitar Contratar Servicios?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Solicitar Contratar Servicio!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/portal/usuario/index.blade.php ENDPATH**/ ?>