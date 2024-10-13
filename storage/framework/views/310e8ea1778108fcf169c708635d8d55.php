<div class="modal fade" id="editEvent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Editar Tipo Servicio</h1>
                    <p></p>
                </div>


                <form id="editActividad" class="row gy-1 pt-75 formactualizar"
                    action="<?php echo e(route('tipo-servicio.update', 2)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label for="estado_actividad" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombres" name="edit_nombres" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="pwd">Slug :</label>
                                <input type="text" class="form-control" id="edit_slug" name="edit_slug"
                                    placeholder="Ingrese El Slug" readonly value="<?php echo e(old('slug')); ?>">
                             
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
</div><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/tipo-servicios/modal.blade.php ENDPATH**/ ?>