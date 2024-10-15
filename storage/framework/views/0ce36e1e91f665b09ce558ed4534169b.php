<?php $__env->startSection('title', 'Módulo De Usuarios'); ?>

<?php $__env->startSection('header'); ?>
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Usuarios</h1>
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.create')): ?>
                        <a href="<?php echo e(route('usuario.create')); ?>" class="btn btn-primary"
                            style="color: white; border-radius: 12px">
                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                    fill="currentColor"></path>
                            </svg>
                            Registrar
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title"> Lista De Usuario </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Roles</th>

                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            
                                            <a href="<?php echo e(route('usuario.show', $usuario)); ?>"> <svg width="32"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12ZM17.7366 6.04606C19.4439 7.36485 20.8976 9.29455 21.9415 11.7091C22.0195 11.8933 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8933 2.05854 11.7091C4.14634 6.88 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM12.0012 14.4124C13.3378 14.4124 14.4304 13.3264 14.4304 11.9979C14.4304 10.6597 13.3378 9.57362 12.0012 9.57362C11.8841 9.57362 11.767 9.58332 11.6597 9.60272C11.6207 10.6694 10.7426 11.5227 9.65971 11.5227H9.61093C9.58166 11.6779 9.56215 11.833 9.56215 11.9979C9.56215 13.3264 10.6548 14.4124 12.0012 14.4124Z"
                                                        fill="currentColor"></path>
                                                </svg> </a>
                                            
                                            <?php echo e($usuario->name); ?>

                                        </td>
                                        <td><?php echo e($usuario->email); ?></td>
                                        <td>
                                            <?php if(!empty($usuario->getRoleNames())): ?>
                                                <?php $__currentLoopData = $usuario->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($rolName != ''): ?>
                                                        <p class="text-xs text-center font-weight-bold mb-0">
                                                            <?php echo e($rolName); ?></p>
                                                    <?php elseif($rolName == null): ?>
                                                        <p class="text-xs text-center font-weight-bold mb-0">Sin Rol</p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <form action="<?php echo e(route('usuario.destroy', $usuario)); ?>" method="POST"
                                                    class="formulario">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.edit')): ?>
                                                        <a href="<?php echo e(route('usuario.roles', $usuario)); ?>"
                                                            class="btn btn-primary">Asignar Rol</a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.edit')): ?>
                                                        <a href="<?php echo e(route('usuario.edit', $usuario)); ?>" class="bs-tooltip btn btn-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                            data-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                            Editar
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.destroy')): ?>
                                                        <button type="submit" class=""
                                                            style="background: red; color:blanchedalmond; border-color: red">
                                                            <i data-feather='trash' class=""></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </form>



                                            </ul>
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <?php if(session('editar')): ?>
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

    <?php if(session('guardar')): ?>
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
                title: 'Se Registro Satisfactoriamente El Usuario!!'
            })
        </script>
    <?php endif; ?>
    <?php if(session('eliminar')): ?>
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
                title: 'Se Elimino Satisfactoriamente El Usuario!!'
            })
        </script>
    <?php endif; ?>
    <script>
        $('.formulario').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Eliminar este Usuario?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/usuarios/index.blade.php ENDPATH**/ ?>