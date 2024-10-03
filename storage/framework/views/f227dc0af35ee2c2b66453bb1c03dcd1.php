<?php $__env->startSection('content'); ?>
<div class="breacrumb-cover">
    <div class="container">
        <br>
        <ul class="breadcrumbs mt-3">
            <li><a href="<?php echo e(route('servicio-portal.index')); ?>">Inicio</a></li>
            <li>Iniciar Sesión</li>
        </ul>
    </div>
</div>

<section class="section-box ">
    <div class="container">
        <div class="container mt-50 mt-md-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">

                        <div class="row">
                            <div class="col-xl-9 col-md-12 mx-auto">
                                <div class="contact-from-area padding-20-row-col">
                                    <div class="card" style="box-sizing: border-box; padding: 20px;border: 1px solid #ccc;border-radius: 50px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                                        <div class="card-body">
                                            <h2 class="section-title text-center mb-15 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Iniciar Sesión
                                            </h2>
                                            <div class="text-normal text-success text-center mb-60 color-black-5 box-mw-60 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                                *Ingrese su contraseña y correo.
                                            </div>
                                            <form class="contact-form-style" id="contact-form" action="<?php echo e(route('portal.login')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="email" style="font-weight: bold">*
                                                                Email:</label>
                                                            <input class="form-control" id="email" type="text" name="email" placeholder="john@gmail.com" aria-describedby="email" autofocus="" tabindex="1" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <span><a href="<?php echo e(route('portal-credenciales.index')); ?>" class="text-red fw-bolder" style="float: right"><small>Olvide mi
                                                            contraseña?</small></a></span>
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="login-password" style="font-weight: bold">*
                                                                Contraseña:</label>

                                                            <input name="password" placeholder="INGRESE SU CONTRASEÑA" type="password" autocomplete="" />

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <button class="submit submit-auto-width" type="submit">Iniciar</button>

                                                    </div>




                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="form-messege"></p>
                                </div>
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
                    <input type="text" class="input-newsletter" value="" placeholder="portal.servicios.sjl@gmail.com" required />
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/login/index.blade.php ENDPATH**/ ?>