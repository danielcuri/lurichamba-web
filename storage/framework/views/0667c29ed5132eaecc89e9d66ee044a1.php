


<?php $__env->startSection('content'); ?>
    <div class="breacrumb-cover">
        <div class="container">
            <ul class="breadcrumbs mt-3">
                <li><a href="<?php echo e(route('servicio-portal.index')); ?>">Inicio</a></li>
                <li>Recuperar credenciales </li>
            </ul>
        </div>
    </div>

    <section class="section-box ">
        <div class="container">
            <div class="container mt-50 mt-md-30">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="mb-50">
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
                            <div class="row">
                                <?php if(session('enviado')): ?>
                                    <h3 class="text-center">SE ENVIO LAS NUEVAS CREDENCIALES A SU CORREO
                                        <b><?php echo e(session('enviado')); ?></b>
                                    </h3>
                                <?php else: ?>
                                    <div class="col-xl-9 col-md-12 mx-auto">
                                        <h2 class="section-title text-center mb-15 wow animate__ animate__fadeInUp animated"
                                            style="visibility: visible; animation-name: fadeInUp;">Recuperar credenciales
                                        </h2>


                                        <div class="contact-from-area padding-20-row-col">
                                            <div class="card"
                                                style="box-sizing: border-box; padding: 20px;border: 1px solid #ccc;border-radius: 50px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                                                <div class="card-body">


                                                    <form class="contact-form-style" id="enviar"
                                                        action="<?php echo e(route('portal-credenciales.enviar')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row wow animate__animated animate__fadeInUp"
                                                            data-wow-delay=".1s">
                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="input-style mb-20">
                                                                    <label class="form-label text-lg font-weight-bold mr-3"
                                                                        for="numero_documento" style="font-weight: bold">*
                                                                        Numero De Documento:</label>
                                                                    <input class="form-control" id="email"
                                                                        type="text" name="numero_documento"
                                                                        placeholder="Ingrese su numero de documento"
                                                                        aria-describedby="numero_documento" autofocus=""
                                                                        tabindex="1" minlength="8" maxlength="12"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="input-style mb-20">
                                                                    <label class="form-label text-lg font-weight-bold mr-3"
                                                                        for="login-email" style="font-weight: bold">*
                                                                        Correo:</label>

                                                                    <input name="email" placeholder="Ingrese su correo"
                                                                        type="email" autocomplete="" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 text-center">
                                                                <button class="submit submit-auto-width"
                                                                    type="submit">Enviar</button>

                                                            </div>





                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <p class="form-messege"></p>
                                        </div>
                                <?php endif; ?>
                            </div>
                    </div>
    </section>
    </div>
    </div>

    </div>
    </div>
    </section>

    <section class="section-box mt-50 mb-60">
        <div class="container">
            <div class="box-newsletter">
                <h5 class="text-md-newsletter">Registrate Ahora</h5>
                <h6 class="text-lg-newsletter">Para Publicar Tus Servicios.</h6>
                <div class="box-form-newsletter mt-30">
                    <form class="form-newsletter">
                        <input type="text" class="input-newsletter" value=""
                            placeholder="portal.servicios.sjl@gmail.com" required />
                        <button class="btn btn-default font-heading icon-send-letter">Registrarse</button>
                    </form>
                </div>
            </div>
            <div class="box-newsletter-bottom">
                <div class="newsletter-bottom"></div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('guardar')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Guardo Satisfactoriamente!!'
            })
        </script>
    <?php endif; ?>



    <script>
        $('#enviar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Recuperar Credenciales?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Enviar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/recuperar-credenciales/index.blade.php ENDPATH**/ ?>