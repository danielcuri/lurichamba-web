<?php $__env->startSection('header'); ?>
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de Solicitudes Publicaciones</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('solicitud.index')); ?>">Solicitudes Publicaciones</a>
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
                            <h6 class="mb-0">Lista de Usuarios Registrados
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
                                    <label for="" class="form-label">Estado de procesos</label>
                                    <select name="estado_proceso_id" class="form-select" id="estado_proceso_id">
                                        <option value="" selected disabled>Seleccione un estado proceso
                                        </option>
                                        <?php $__currentLoopData = $estados_procesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estados_proceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($estados_proceso->id); ?>"
                                                <?php echo e(request('estado_proceso_id') == $estados_proceso->id ? 'selected' : ''); ?>>
                                                <?php echo e($estados_proceso->nombres); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Nombre de Servicio</label>

                                    <input type="text" name="search" id="search-input" class="form-control"
                                        placeholder="Buscar por nombre del servicio">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>

                                </div>
                            </div>



                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th>Persona</th>
                                    
                                    <th>Descripción Publicacion</th>
                                    <th>Fecha Registrada</th>

                                    <th>Ver Publicación</th>
                                    <th>Estado Proceso</th>
                                    <th>Estado</th>

                                </tr>
                            </thead>
                            <tbody id="result-table">

                                <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td><?php echo e(Str::upper($solicitud->personas->nombres)); ?> <?php echo e(Str::upper($solicitud->personas->apellido_paterno)); ?>

                                            <?php echo e(Str::upper($solicitud->personas->apellido_materno)); ?></td>
                   
                                        <td><?php echo e(Str::upper($solicitud->nombres)); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($solicitud->fecha_registrada)->format('d-m-Y')); ?></td>

                                        <td class="">

                                            <a href="<?php echo e(route('solicitud.show', $solicitud)); ?>"
                                                class="btn btn-warning " style="">

                                                <i data-feather='eye'></i>
                                                Ver Publicacion</a>
                                        </td>
                                        <td class="">
                                            <?php echo e($solicitud->estadosProceso->nombres); ?>

                                        </td>

                                        <td>
                                            <button
                                                class="btn <?php echo e($solicitud->estado == '1' ? 'btn-success' : 'btn-danger'); ?>">
                                                <?php echo e($solicitud->estado == '1' ? 'Habilitado' : 'Deshabilitado'); ?>


                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando <?php echo e($solicitudes->firstItem()); ?> a <?php echo e($solicitudes->lastItem()); ?> de
                                    <?php echo e($solicitudes->total()); ?> registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item <?php echo e($solicitudes->previousPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link" href="<?php echo e($solicitudes->previousPageUrl()); ?>">Anterior</a>
                                        </li>

                                        <?php if($solicitudes->currentPage() > 3): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($solicitudes->url(1)); ?>">1</a>
                                            </li>
                                            <?php if($solicitudes->currentPage() > 4): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $solicitudes->getUrlRange(max($solicitudes->currentPage() - 2, 1), min($solicitudes->currentPage() + 2, $solicitudes->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="page-item <?php echo e($page == $solicitudes->currentPage() ? 'active' : ''); ?>">
                                                <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($solicitudes->currentPage() < $solicitudes->lastPage() - 2): ?>
                                            <?php if($solicitudes->currentPage() < $solicitudes->lastPage() - 3): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            <?php endif; ?>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="<?php echo e($solicitudes->url($solicitudes->lastPage())); ?>"><?php echo e($solicitudes->lastPage()); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <li class="page-item <?php echo e($solicitudes->nextPageUrl() ? '' : 'disabled'); ?>">
                                            <a class="page-link" href="<?php echo e($solicitudes->nextPageUrl()); ?>">Siguiente</a>
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/solicitudes/index.blade.php ENDPATH**/ ?>