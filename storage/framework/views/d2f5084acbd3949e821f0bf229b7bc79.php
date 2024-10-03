<?php $__env->startSection('content'); ?>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <?php echo $__env->make('portal.usuario.navbar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-8">
                    <div class="sidebar-shadow">
                         
                        
                      <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            <h4 class="text-center mb-3 mb-sm-0">Mis Documentos</h4>
                        
                            <div class="text-center">
                                <?php if($cantidad_documento_otros < 1): ?>
                                    <a href="<?php echo e(route('portal-admin.registrar-documentos')); ?>" class="btn btn-success">REGISTRAR CURRÍCULUM</a>
                                <?php endif; ?>

                                
                            </div>
                        </div>
                        
                        <h6 class="card-header">Documentos Adjuntos</h6>
                        <div class="table-responsive" class="mt-5">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <table class="table datatable-project dataTable no-footer dtr-column"
                                    id="DataTables_Table_0" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled control" rowspan="1" colspan="1"
                                                style="width: 42.5781px; display: none;">
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 165.359px;"> Tipo Documentación</th>
                                            <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 204.5px;">Documento Adjuntado
                                            </th>

                                            


                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 188.766px;">Accciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="odd">
                                                <td><?php echo e($documento->tipoDocumentacion->nombres); ?></td>
                                                <td>

                                                    <button class="btn btn-success"
                                                        data-url="<?php echo e(Storage::url($documento->url_documento)); ?>"
                                                        onclick="mostrarVistaPrevia(this)">

                                                        <svg class="icon-32" width="32" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M22.5 12.8057H1.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M20.6304 8.5951V7.0821C20.6304 5.0211 18.9594 3.3501 16.8974 3.3501H15.6924"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M3.37012 8.5951V7.0821C3.37012 5.0211 5.04112 3.3501 7.10312 3.3501H8.33912"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M20.6304 12.8047V16.8787C20.6304 18.9407 18.9594 20.6117 16.8974 20.6117H15.6924"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M3.37012 12.8047V16.8787C3.37012 18.9407 5.04112 20.6117 7.10312 20.6117H8.33912"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>


                                                        Vista previa

                                                    </button>
                                                </td>
                                                
                                                <td>
                                                    <a class="btn btn-warning"
                                                        href="<?php echo e(route('portal-admin.editar-documentos', $documento)); ?>">Editar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="modal fade" id="preview-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vista Previo Del Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function mostrarVistaPrevia(button) {
            var url = button.dataset.url;
            var iframe = '<iframe src="' + url + '" width="100%" height="500"></iframe>';
            $('#preview-modal .modal-body').html(iframe);
            $('#preview-modal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-trabajo-mdsjl_03_05_2024\portal-trabajo-mdsjl\resources\views/portal/usuario/mis-documentos.blade.php ENDPATH**/ ?>