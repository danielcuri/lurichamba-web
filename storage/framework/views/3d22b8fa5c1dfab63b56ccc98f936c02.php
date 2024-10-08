<?php $__env->startSection('header'); ?>
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de Comentarios Publicaciones</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-comentario.index')); ?>">Comentarios
                                Publicaciones</a>
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
                            <h6 class="mb-0">Lista de Comentarios
                            </h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">

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
                            <div class="row">
                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Estado</label>
                                    <select name="estado" class="form-select" id="estado">
                                        <option value="" selected>Seleccione un estado
                                        </option>



                                        <option value="1" <?php echo e(request('estado') == 1 ? 'selected' : ''); ?>>HABILITADO
                                        </option>
                                        <option value="2" <?php echo e(request('estado') == 2 ? 'selected' : ''); ?>>DESHABILITADO
                                        </option>


                                    </select>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Comentario</label>

                                    <input type="text" name="search" id="search-input" class="form-control"
                                        placeholder="Buscar por comentario" value="<?php echo e(request('search')); ?>">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>

                                </div>
                            </div>



                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th>Datos usuario Publicación</th>
                                    <th>Publicación</th>

                                    <th>Descripción Publicacion</th>
                                    <th>Fecha Registrada</th>

                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody id="result-table">

                                <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td><?php echo e(Str::upper($comentario->personas->nombres)); ?>

                                            <?php echo e(Str::upper($comentario->personas->apellido_paterno)); ?>

                                            <?php echo e(Str::upper($comentario->personas->apellido_materno)); ?></td>



                                        <td><?php echo e(Str::upper($comentario->publicacion->nombres)); ?></td>
                                        <td><?php echo e(Str::upper($comentario->comentario)); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($comentario->fecha_registrada)->format('d-m-Y')); ?>

                                        </td>



                                        <td>
                                            <button
                                                class="btn <?php echo e($comentario->estado == '1' ? 'btn-success' : 'btn-danger'); ?>">
                                                <?php echo e($comentario->estado == '1' ? 'Habilitado' : 'Deshabilitado'); ?>


                                            </button>
                                        </td>


                                        <td>

                                            <form action="<?php echo e(route('admin-comentario.destroy', $comentario)); ?>"
                                                method="POST" class="desactivar">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>



                                                
                                                <button type="submit"
                                                    class="btn btn-danger <?php echo e($comentario->estado == '2' ? 'disabled' : ''); ?>">
                                                    <i data-feather='trash-2'></i>
                                                </button>
                                                

                                            </form>


                                        </td>

                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <form action="<?php echo e(route('admin-comentario.activar', $comentario)); ?>"
                                                    method="POST" class="activar">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('POST'); ?>
                                                    <button type="submit"
                                                        class="btn btn-success <?php echo e($comentario->estado == '1' ? 'disabled' : ''); ?>"
                                                        style="">Habilitar</button>
                                                </form>
                                            </ul>
                                        </td>




                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando <?php echo e($comentarios->firstItem()); ?> a <?php echo e($comentarios->lastItem()); ?> de
                                    <?php echo e($comentarios->total()); ?> registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item <?php echo e($comentarios->previousPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link"
                                                href="<?php echo e($comentarios->previousPageUrl()); ?>">Anterior</a>
                                        </li>

                                        <?php if($comentarios->currentPage() > 3): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($comentarios->url(1)); ?>">1</a>
                                            </li>
                                            <?php if($comentarios->currentPage() > 4): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $comentarios->getUrlRange(max($comentarios->currentPage() - 2, 1), min($comentarios->currentPage() + 2, $comentarios->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li
                                                class="page-item <?php echo e($page == $comentarios->currentPage() ? 'active' : ''); ?>">
                                                <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($comentarios->currentPage() < $comentarios->lastPage() - 2): ?>
                                            <?php if($comentarios->currentPage() < $comentarios->lastPage() - 3): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="<?php echo e($comentarios->url($comentarios->lastPage())); ?>"><?php echo e($comentarios->lastPage()); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <li class="page-item <?php echo e($comentarios->nextPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link" href="<?php echo e($comentarios->nextPageUrl()); ?>">Siguiente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--/ Basic table -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('sweetalert2.all.min.js')); ?>}}"></script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/comentarios/index.blade.php ENDPATH**/ ?>