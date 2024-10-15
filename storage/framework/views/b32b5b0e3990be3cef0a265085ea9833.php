<div class="modal fade" id="editEvent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Editar Publicación</h1>
                    <p></p>
                </div>


                <form id="editActividad" class="row gy-1 pt-75 formactualizar"
                    action="<?php echo e(route('usuario-registrado.actualizarPublicacion', 2)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="input-style mb-20">
                                    <label class="form-label text-lg font-weight-bold mr-3" for="edit_tiposervicioid"
                                        style="font-weight: bold">*
                                        Tipo de Servicio:</label>
                                    <select name="edit_tiposervicioid" id="edit_tiposervicioid" class="form-control"
                                        required>
                                        <option value="0" disabled selected>Seleccione un Tipo de
                                            Servicio
                                        </option>
                                        <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tipoServicio->id); ?>">
                                                <?php echo e($tipoServicio->nombres); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="input-style mb-20">
                                    <label class="form-label text-lg font-weight-bold mr-3" for="edit_servicioid"
                                        style="font-weight: bold">*
                                        Servicio:</label>
                                    <select name="edit_servicioid" id="edit_servicioid" class="form-control" required>
                                        <option value="0" disabled selected>Seleccione un Servicio
                                        </option>
                                        <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($servicio->id); ?>">
                                                <?php echo e($servicio->nombres); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <label class="form-label text-lg font-weight-bold mr-3" style="font-weight: bold">*
                                        Título de publicación:</label>
                                    <div>
                                        <span> Ejemplo: Servicio de albañileria especializada ......</span>
                                    </div>
                                    <input name="edit_nombres" id="edit_nombres" class="form-control" placeholder=""
                                        type="text" required />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <label class="form-label text-lg font-weight-bold mr-3" style="font-weight: bold">*
                                    Descripción de publicación:</label>
                                <div>
                                    <span>Ingresar el detalle de lo que va ofrecer.</span>
                                </div>
                                <textarea name="edit_descripcion" id="edit_descripcion" class="form-control" id="" cols="30"
                                    rows="5" required></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1" id="btnactualizar">Actualizar</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/portal-usuarios/servicios/modal.blade.php ENDPATH**/ ?>