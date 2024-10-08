<?php $__env->startSection('title', 'Módulo Roles'); ?>


<?php $__env->startSection('header'); ?>
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h3>Roles List</h3>

                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.create')): ?>
                        <div>
                            <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary" style="color: white; border-radius: 12px">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                        fill="currentColor"></path>
                                </svg>
                                Registrar
                            </a>
                        </div>
                    <?php endif; ?>

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
                        <h4 class="card-title"> Lista De Roles </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($role->id); ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.show')): ?>
                                                <a href="<?php echo e(route('role.show', $role)); ?>">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12ZM17.7366 6.04606C19.4439 7.36485 20.8976 9.29455 21.9415 11.7091C22.0195 11.8933 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8933 2.05854 11.7091C4.14634 6.88 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM12.0012 14.4124C13.3378 14.4124 14.4304 13.3264 14.4304 11.9979C14.4304 10.6597 13.3378 9.57362 12.0012 9.57362C11.8841 9.57362 11.767 9.58332 11.6597 9.60272C11.6207 10.6694 10.7426 11.5227 9.65971 11.5227H9.61093C9.58166 11.6779 9.56215 11.833 9.56215 11.9979C9.56215 13.3264 10.6548 14.4124 12.0012 14.4124Z"
                                                            fill="currentColor"></path>
                                                    </svg>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($role->name); ?></td>

                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <form action="<?php echo e(route('role.destroy', $role)); ?>" method="POST"
                                                    class="formulario">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
                                                    <a href="<?php echo e(route('role.edit', $role)); ?>" class="btn btn-primary"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                        data-original-title="Edit">Editar
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.destroy')): ?>
                                                    <button type="submit" class="btn btn-danger"
                                                        style="background-color: none">
                                                        Eliminar
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
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.formulario').submit(function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro de eliminar este rol?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
        </script>


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
                    title: 'Se Guardo Satisfactoriamente!!'
                })
            </script>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/roles/index.blade.php ENDPATH**/ ?>