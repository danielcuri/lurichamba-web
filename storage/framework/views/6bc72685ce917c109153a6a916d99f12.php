

<?php $__env->startSection('header'); ?>
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de Servicios</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('servicio.index')); ?>"> Servicios</a>
                        </li>
                        <li class="breadcrumb-item active">Lista
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
                <button
                    class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light"
                    type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg></button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check-square me-1">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-message-square me-1">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-mail me-1">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg><span class="align-middle">Email</span></a><a class="dropdown-item"
                        href="app-calendar.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-calendar me-1">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg><span class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">Lista de Servicios</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                


                                <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="modal"
                                    data-bs-target="#addEvent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-plus me-50 font-small-4">
                                        <line x1="12" y1="5" x2="12" y2="19">
                                        </line>
                                        <line x1="5" y1="12" x2="19" y2="12">
                                        </line>
                                    </svg>
                                    <span class="align-middle">Registrar Servicios</span>
                                </button>
                            </div>


                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                <ul class="error-list">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class=""><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <button type="button" class="btn-close mb-2" data-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form id="search-form" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="search-input" class="form-control"
                                    placeholder="Buscar por nombre del servicio">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Descripción</th>
                                        <th>Tipo Servicio</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                        <th>Subir Img. Icono</th>
                                        <th></th>
    
                                    </tr>
                                </thead>
                                <tbody id="result-table">
    
                                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <?php echo e($servicio->id); ?>

                                                </a>
    
    
                                            </td>
    
                                            <td>
                                                <a href="#" class="btn-modal-foto" data-bs-toggle="modal"
                                                    data-bs-target="#fotoModal" data-id="<?php echo e($servicio->id); ?>"
                                                    data-foto="<?php echo e(Storage::url($servicio->icono_url) ?? 'https://marketplace.canva.com/EAFbDgiv63c/1/0/1600w/canva-certificado-taller-de-administraci%C3%B3n-simple-azul-y-amarillo-Y-NyNpF3uqE.jpg'); ?>">
                                                    <?php echo e($servicio->nombres ?? 'No existe descripción.....'); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php echo e($servicio->tipoServicio->nombres); ?>

                                            </td>
                                            <td>
                                                <button
                                                    class="btn <?php echo e($servicio->estado == '1' ? 'btn-success' : 'btn-danger'); ?>">
                                                    <?php echo e($servicio->estado == '1' ? 'Habilitado' : 'Deshabilitado'); ?>

    
                                                </button>
                                            </td>
    
                                            <td>
    
                                                <form action="<?php echo e(route('servicio.destroy', $servicio)); ?>" method="POST"
                                                    class="desactivar">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
    
    
                                                    <a href="#" class="btn btn-primary dt-button create-new"
                                                        data-bs-toggle="modal" data-bs-target="#editEvent"
                                                        data-id="<?php echo e($servicio->slug); ?>"
                                                        data-nombres="<?php echo e($servicio->nombres); ?>"
                                                        data-tipo-servicio="<?php echo e($servicio->tipo_servicio_id); ?>"
                                                        data-slug="<?php echo e($servicio->slug); ?>">
                                                        <i data-feather='edit'></i>
    
                                                    </a>
    
                                                    
                                                    <button type="submit"
                                                        class="btn btn-danger <?php echo e($servicio->estado == '2' ? 'disabled' : ''); ?>">
                                                        <i data-feather='trash-2'></i>
                                                    </button>
                                                    
    
                                                </form>
    
    
                                            </td>
                                            <th>
                                                <a href="#" class="btn btn-primary imagen-actualizar"
                                                    data-bs-toggle="modal" data-bs-target="#fotoActualizar"
                                                    data-id="<?php echo e($servicio->slug); ?>">
                                                    <i data-feather='file-plus'></i>
    
                                                </a>
    
                                            </th>
                                            
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <form action="<?php echo e(route('servicio.activar', $servicio)); ?>" method="POST"
                                                        class="activar">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <button type="submit"
                                                            class="btn btn-success <?php echo e($servicio->estado == '1' ? 'disabled' : ''); ?>"
                                                            style="">Habilitar</button>
                                                    </form>
                                                </ul>
                                            </td>
                                            
    
    
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                </tbody>
                            </table>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando <?php echo e($servicios->firstItem()); ?> a <?php echo e($servicios->lastItem()); ?> de
                                    <?php echo e($servicios->total()); ?> registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item <?php echo e($servicios->previousPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link" href="<?php echo e($servicios->previousPageUrl()); ?>">Anterior</a>
                                        </li>

                                        <?php if($servicios->currentPage() > 3): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($servicios->url(1)); ?>">1</a>
                                            </li>
                                            <?php if($servicios->currentPage() > 4): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $servicios->getUrlRange(max($servicios->currentPage() - 2, 1), min($servicios->currentPage() + 2, $servicios->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li
                                                class="page-item <?php echo e($page == $servicios->currentPage() ? 'active' : ''); ?>">
                                                <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($servicios->currentPage() < $servicios->lastPage() - 2): ?>
                                            <?php if($servicios->currentPage() < $servicios->lastPage() - 3): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="<?php echo e($servicios->url($servicios->lastPage())); ?>"><?php echo e($servicios->lastPage()); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <li class="page-item <?php echo e($servicios->nextPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link" href="<?php echo e($servicios->nextPageUrl()); ?>">Siguiente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addEvent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Registrar Servicio</h1>
                            <p></p>
                        </div>

                        <?php if($errors->any()): ?>
                            <ul class="error-list">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <form id="editAddForm" class="row gy-1 pt-75 formguardar" action="<?php echo e(route('servicio.store')); ?>"
                            method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>


                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <label for="" class="form-label">Tipo Servicio</label>
                                        <select name="tipo_servicio_id" id="tipo_servicio_id" class="form-select"
                                            required style="width: 100%">
                                            <option value="">SELECCIONE UN TIPO SERVICIO</option>
                                            <?php $__currentLoopData = $tipoServicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipoServicio->id); ?>">
                                                    <?php echo e($tipoServicio->nombres); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['tipo_servicio_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <strong class="text-sm text-red-600"
                                                style="color: red"><?php echo e($message); ?></strong>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <label for="nombre" class="form-label">Nombres</label>

                                        <input class="form-control" type="text" name="nombres" id="nombres"
                                            required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="pwd">Slug :</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Ingrese El Slug" readonly value="<?php echo e(old('slug')); ?>">
                                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <strong class="text-sm text-red-600"
                                                style="color: red"><?php echo e($message); ?></strong>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <label for="estado_actividad" class="form-label">Subir Imagen Icono:</label>
                                        <input type="file" class="form-control" id="icono_url" name="icono_url"
                                            required>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1" id="btnguardar">Guardar</button>
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cerrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php echo $__env->make('servicios.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="modal fade" id="fotoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1 font-bold">Imagen Icono</h1>
                            <p></p>
                        </div>
                        <div>
                            <img src="" alt="" id="foto_recursos" style="width: 100%">

                        </div>


                    </div>
                </div>
            </div>
        </div>

        


        
        <div class="modal fade" id="fotoActualizar" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Editar Imagen Icono</h1>
                            <p></p>
                        </div>


                        <form id="formActualizarImagen" class="row gy-1 pt-75 actualizarFoto"
                            action="<?php echo e(route('servicio.actualizarImagen', 2)); ?>" method="POST"
                            enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12 col-md-12 mt-1">
                                        <label class="form-label" for="start_date">Certificado:</label>
                                        <input type="file" id="file" name="icono_url" class="form-control"
                                            placeholder="" value="" data-msg="" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1"
                                    id="btnactualizar">ACTUALIZAR</button>
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cerrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        


    </section>
    <!--/ Basic table -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')); ?>"></script>



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
    <?php if(session('actualizar')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Actualizo Satisfactoriamente!!'
            })
        </script>
    <?php endif; ?>
    <?php if(session('desactivar')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Deshabilito Satisfactoriamente!!'
            })
        </script>
    <?php endif; ?>

    <?php if(session('activar')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Habilito Satisfactoriamente!!'
            })
        </script>
    <?php endif; ?>
    <script>
        $('.activar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Habilitar?',
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
        $('.desactivar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Deshabilitar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deshabilitar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

    <script>
        $('.formguardar').submit(function(e) {
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

    <script>
        $('.formactualizar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de actualizar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Actualizar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
     <script>
        $('.actualizarFoto').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de actualizar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Actualizar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
    <script>
        jQuery.noConflict();

        (function($) {
            $(document).ready(function() {
                $('#nombres').stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
                $('#edit_nombres').stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#edit_slug',
                    space: '-'
                });


            });
        })(jQuery);
    </script>

    <script>
        $(document).ready(function() {

            $('.dt-button.create-new').click(function() {


                var id = $(this).data('id');
                var nombres = $(this).data('nombres');
                var tipoServicio = $(this).data('tipo-servicio');
                // console.log(tipoServicio);
                var slug = $(this).data('slug');


                $('#edit_nombres').val(nombres)
                $('#edit_tipo_servicio_id').val(tipoServicio)
                $('#edit_slug').val(slug)

                var actionUrl = "<?php echo e(route('servicio.update', ':id')); ?>";
                actionUrl = actionUrl.replace(':id', id);
                $('#editActividad').attr('action', actionUrl);

            })

            $('.btn-modal-foto').click(function() {
                var id = $(this).data('id');
                var foto = $(this).data('foto');
                $('#foto_recursos').attr('src', foto)

            })

            $('.imagen-actualizar').click(function() {
                var id = $(this).data('id');
                var actionUrl = "<?php echo e(route('servicio.actualizarImagen', ':id')); ?>";
                actionUrl = actionUrl.replace(':id', id);
                $('#formActualizarImagen').attr('action', actionUrl);


            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/servicios/index.blade.php ENDPATH**/ ?>