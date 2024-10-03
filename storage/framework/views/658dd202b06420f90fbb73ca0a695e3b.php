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
                            <h3>Mi Perfil</h3>
                            <hr>
                            <div>

                            </div>

                            <div class="card-body">
                                <form class="contact-form-style" id="contact-form" action="<?php echo e(route('portal-admin.perfilEditar')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="numero_documento" style="font-weight: bold">*
                                                    N° Documento:</label>
                                                <input name="numero_documento" placeholder="Ingrese N° Documento"
                                                    type="text" value="<?php echo e($datosPersonales->numero_documento); ?>" disabled/>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                                    style="font-weight: bold">*
                                                    Nombres:</label>
                                                <input class="form-control" id="nombres" type="text" name="nombres"
                                                    placeholder="Jesus" autocomplete="new-username" value="<?php echo e($datosPersonales->nombres); ?>" disabled/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_paterno" style="font-weight: bold">*
                                                    Apellido Paterno:</label>

                                                <input name="apellido_paterno" placeholder="Ingrese Su Apellido Paterno"
                                                    type="text" value="<?php echo e($datosPersonales->apellido_paterno); ?>" disabled/>


                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_materno" style="font-weight: bold">*
                                                    Apellido Materno:</label>

                                                <input name="apellido_materno" placeholder="Ingrese Su Apellido Materno"
                                                    type="text" value="<?php echo e($datosPersonales->apellido_materno); ?>" disabled/>


                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="direccion_fiscal" style="font-weight: bold">*
                                                    Dirección Fiscal:</label>
                                                <input name="direccion_fiscal" placeholder="Ingrese Su Domicilio Fiscal"
                                                    type="text" id="direccion_fiscal" value="<?php echo e($datosPersonales->direccion_fiscal); ?>" disabled/>

                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3" for="login-password"
                                                    style="font-weight: bold">*
                                                    Correo:</label>

                                                <input name="email" class="form-control" placeholder="Ingrese Su Correo"
                                                    type="email" value="<?php echo e($datosPersonales->email); ?>" disabled/>

                                                
                                            </div>
                                        </div>





                                        <div class="col-lg-12 col-md-12">
                                            <button class="btn btn-success submit submit-auto-width" type="submit">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/usuario/perfil.blade.php ENDPATH**/ ?>