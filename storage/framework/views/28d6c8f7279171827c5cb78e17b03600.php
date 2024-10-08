<?php $__env->startSection('content'); ?>
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">

                                <?php if($persona->estado_proceso_id == 2): ?>
                                    <div>
                                        <span class="badge badge-glow bg-warning me-1 mt-1">VALIDADO A PORTAL</span>
                                    </div>
                                <?php else: ?>
                                <?php endif; ?>


                                <?php if($persona->profile_photo_path): ?>
                                    <img class="img-fluid rounded mt-3 mb-2"
                                        src="<?php echo e(Storage::url($persona->profile_photo_path)); ?>" height="110" width="110"
                                        alt="User avatar">
                                <?php else: ?>
                                    <h1 class="mt-1">SIN FOTO</h1>
                                    <img class="img-fluid rounded mt-3 mb-2" src="/sinfoto.png" height="110"
                                        width="110" alt="User avatar">
                                <?php endif; ?>
                                <div class="user-info text-center">
                                    <h4><?php echo e($persona->nombres); ?> <?php echo e($persona->apellido_paterno); ?></h4>
                                    <span class="badge bg-light-secondary"><?php echo e($persona->tipoUtilidad->nombres); ?></span>
                                </div>
                            </div>
                        </div>

                        <h4 class="fw-bolder border-bottom pb-50 mt-2 mb-1">Detalle Persona</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nombres:</span>
                                    <span><?php echo e($persona->nombres); ?> <?php echo e($persona->apellido_paterno); ?>

                                        <?php echo e($persona->apellido_materno); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Correo:</span>
                                    <span><?php echo e($persona->email); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Estado Proceso:</span>
                                    

                                    <span class=""><?php echo e($persona->estadosProceso->nombres); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Tipo Documento:</span>
                                    <span><?php echo e($persona->tipoDocumento->siglas); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Documento:</span>
                                    <span><?php echo e($persona->numero_documento); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Celular:</span>
                                    <span><?php echo e($persona->numero_celular ?? 'SIN INFORMACIÓN'); ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Dirección:</span>
                                    <span><?php echo e($persona->direccion_fiscal); ?></span>
                                </li>

                            </ul>
                            <div class="d-flex justify-content-center pt-2">

                                <?php if($persona->estado_proceso_id == 1): ?>
                                    <form class="permiso"
                                        action="<?php echo e(route('usuario-registrado.validarProcesoPersona', $persona)); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>


                                        <button type="submit"
                                            class="btn btn-success me-1 waves-effect waves-float waves-light">
                                            Dar Permiso en portal
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('usuario-registrado.rechazarProcesoPersona', $persona)); ?>"
                                        method="POST" class="pendiente">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>


                                        <button class="btn btn-outline-danger cancel-subscription mt-1 waves-effect"
                                            <?php echo e($persona->estado_proceso_id == 1 ? 'disabled' : ''); ?>>Rechazar</button>

                                    </form>
                                <?php endif; ?>

                                





                            </div>
                        </div>


                        <?php if($persona_extra): ?>
                            <h4 class="fw-bolder border-bottom pb-50 mt-2 mb-1">Informacion Adicional</h4>
                            <div class="info-container">
                                <ul class="list-unstyled">
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">DISTRITO:</span>
                                        <span><?php echo e($persona_extra->distrito ?? ''); ?> </span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">COMUNA:</span>
                                        <span><?php echo e($persona_extra->comuna ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">TIPO NUCLEO:</span>
                                        

                                        <span class=""><?php echo e($persona_extra->tipo_nucleo ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">ASENTAMIENTO HUMANO:</span>
                                        <span><?php echo e($persona_extra->nombre_asentamiento_humano ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">TIPO VIA:</span>
                                        <span><?php echo e($persona_extra->tipo_via ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">NOMBRE VIA:</span>
                                        <span><?php echo e($persona_extra->nombre_via ?? 'SIN INFORMACIÓN'); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">TIPO ORGANIZACIÓN:</span>
                                        <span><?php echo e($persona_extra->tipo_organizacion ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25"> TIENE ALGUNA DISCAPACIDAD ?:</span>
                                        <span><?php echo e($persona_extra->es_discapacidad ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">GRADO ESTUDIOS:</span>
                                        <span><?php echo e($persona_extra->grado_estudios ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">CENTRO DE ESTUDIOS:</span>
                                        <span><?php echo e($persona_extra->centro_estudios ?? ''); ?></span>
                                    </li>



                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">TIENE LOCAL FISICO ? :</span>
                                        <span><?php echo e($persona_extra->es_local_fisico ?? ''); ?></span>
                                    </li>
                                    <li class="mb-50">
                                        <span class="fw-bolder me-25">TIENE LICENCIA?:</span>
                                        <span><?php echo e($persona_extra->es_licencia ?? ''); ?></span>
                                    </li>




                                </ul>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /User Card -->
                <!-- Plan Card -->

                <!-- /Plan Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-justified" data-bs-toggle="pill" href="#home-justified"
                                aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users font-medium-5 me-50">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                DOCUMENTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-justified" data-bs-toggle="pill"
                                href="#profile-justified" aria-expanded="false">


                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-plus-square font-medium-5 me-50">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                    </rect>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                                Solicitar Documentos</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home-justified"
                                    aria-labelledby="home-tab-justified" aria-expanded="true">




                                    <div class="card">
                                        <h6 class="card-header">Documentos Adjuntos</h6>
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_0_wrapper"
                                                class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <table class="table datatable-project dataTable no-footer dtr-column"
                                                    id="DataTables_Table_0" role="grid">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_disabled control" rowspan="1"
                                                                colspan="1" style="width: 42.5781px; display: none;">
                                                            </th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 165.359px;"> Tipo Documentación</th>
                                                            <th class="text-nowrap sorting_disabled" rowspan="1"
                                                                colspan="1" style="width: 204.5px;">Documento Adjuntado
                                                            </th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 188.766px;">Estado Proceso</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 188.766px;">Estado</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 188.766px;">Validar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $persona->documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="odd">
                                                                <td><?php echo e($documento->tipoDocumentacion->nombres); ?></td>
                                                                <td>

                                                                    <button class="btn btn-success"
                                                                        data-url="<?php echo e(Storage::url($documento->url_documento)); ?>"
                                                                        onclick="mostrarVistaPrevia(this)">

                                                                        <svg class="icon-32" width="32"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M22.5 12.8057H1.5"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M20.6304 8.5951V7.0821C20.6304 5.0211 18.9594 3.3501 16.8974 3.3501H15.6924"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M3.37012 8.5951V7.0821C3.37012 5.0211 5.04112 3.3501 7.10312 3.3501H8.33912"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M20.6304 12.8047V16.8787C20.6304 18.9407 18.9594 20.6117 16.8974 20.6117H15.6924"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M3.37012 12.8047V16.8787C3.37012 18.9407 5.04112 20.6117 7.10312 20.6117H8.33912"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>


                                                                        Vista previa

                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <?php echo e($documento->estadosProceso->nombres); ?>


                                                                </td>
                                                                <td>
                                                                    <button
                                                                        class="btn <?php echo e($documento->estado == '1' ? 'btn-success' : 'btn-danger'); ?>">
                                                                        <?php echo e($documento->estado == '1' ? 'Habilitado' : 'Deshabilitado'); ?>


                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <?php if($documento->estado_proceso_id == 1): ?>
                                                                        <form
                                                                            action="<?php echo e(route('usuario-registrado.validarProcesoDocumento', $documento)); ?>"
                                                                            method="POST" class="validarDocumento">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>


                                                                            <button type="submit"
                                                                                class="btn btn-icon btn-icon rounded-circle btn-warning">
                                                                                <i data-feather='check-square'></i>
                                                                            </button>
                                                                        </form>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="badge badge-glow bg-warning">VALIDADO</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane" id="profile-justified" role="tabpanel"
                                    aria-labelledby="profile-tab-justified" aria-expanded="false">





                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Project table -->

                <!-- Activity Timeline -->
                <div class="card">

                    

                    <div class="card-header">
                        <?php if($persona->estado_proceso_id > 2): ?>
                            <div class="col-md-12">
                                <span
                                    class="badge badge-glow bg-success mr-2 me-1 mt-1"><?php echo e($persona->estadosProceso->nombres); ?></span>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>

                        <div>
                            <h4 class="mt-1"> Permiso Habilitados</h4>

                        </div>
                    </div>
                    <div class="card-body">

                        <?php echo Form::model($persona, [
                            'route' => ['usuario-registrado.updaterole', $persona],
                            'method' => 'put',
                            'files' => false,
                            'class' => 'roles',
                        ]); ?>

                        <?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <br>
                            <small class="text-danger">
                                <strong><?php echo e($message); ?></strong>
                            </small>
                            <br>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="col-md-8">
                            <label for="" class="form-label">Tipo Utilidad en Portal: </label>
                            <select name="tipo_utilidad_id" class="form-select" id="tipo_utilidad_id">
                                <option value="" selected disabled>Seleccione una Utilidad
                                </option>
                                <?php $__currentLoopData = $tipo_utilidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_utilidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipo_utilidad->id); ?>"
                                        <?php echo e($persona->tipo_utilidad_id == $tipo_utilidad->id ? 'selected' : ''); ?>>
                                        <?php echo e($tipo_utilidad->nombres); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label>
                                    <?php echo Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1 mt-1']); ?>

                                    <?php echo e($rol->name); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <button type="submit" class="btn btn-primary mt-2">Asignar Rol</button>

                        <?php echo Form::close(); ?>



                    </div>
                </div>
                <!-- /Activity Timeline -->

                <!-- Invoice table -->

                <!-- /Invoice table -->
            </div>
            <!--/ User Content -->

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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.permiso').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Dar Permiso Al Portal?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Habilitar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

    <script>
        $('.pendiente').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Pasarlo A Pendiente?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Pasarlo A Pendiente!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
    <script>
        $('.validarDocumento').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de validar Documento?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, validar Documento!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

    <script>
        $('.roles').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Asignar los Roles?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, asignar Roles!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/portal-usuarios/show.blade.php ENDPATH**/ ?>