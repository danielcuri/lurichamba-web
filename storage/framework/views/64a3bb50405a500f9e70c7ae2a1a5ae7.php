<?php $__env->startSection('title', 'Registrar Roles'); ?>

<?php $__env->startSection('header'); ?>

    <div class="container-fluid iq-container">

        <div class="row">

            <div class="col-md-12">

                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">

                    <div>
                        <h1>Registrar Rol</h1>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-sm-12 col-lg-12">

            <div class="card">

                <div class="card-body">

                    <?php echo Form::open(['route' => 'role.store', 'autocomplete' => 'off', 'files' => true, 'class' => 'formulario']); ?>


                    <div class="form-group">

                        <label class="form-label" for="pwd">Nombre:</label>

                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ingrese El Nombre" value="<?php echo e(old('name')); ?>">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <strong class="text-sm text-red-600" style="color: red"><?php echo e($message); ?></strong>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <label class="form-label" for="pwd"><strong> Elegir Permisos:</strong></label>

                    <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <strong class="text-sm text-red-600" style="color: red"><?php echo e($message); ?></strong>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <?php
                        
                        $chunks = $permissions->chunk(ceil($permissions->count() / 10));
                        
                        $headers = ['MÓDULO USUARIOS', 'MÓDULO ROLES', 'MÓDULO DE AREAS', 'MÓDULO DE SUBAREAS', 'MODULO DE PROGRAMAS', 'MODULO ESTUDIANTES', 'MODULO CERTIFICADOS', 'MODULO RESPONSABLES','MODULO CATEGORIAS','MODULO TIPO DE PROGRAMAS'];
                        
                    ?>

                    <div class="row">

                        <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <br>
                                <h6 class="btn btn-primary" style="font-size: 10px"><?php echo e($headers[$key]); ?></h6>
                                <br>
                                <br>
                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>
                                                    <?php echo Form::checkbox('check_all_' . $key, 1, null, ['class' => 'check-all', 'data-column' => $key]); ?>

                                                </th>
                                                <th>Seleccionar todos los permisos</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'data-column' => $key]); ?>

                                                    </td>
                                                    <td><?php echo e($permission->description); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>


                    <div class="mt-4 mb-3">

                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="<?php echo e(route('role.index')); ?>" class="btn btn-danger">
                            Cancelar
                        </a>

                    </div>

                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

        <script>
            $('.formulario').submit(function(e) {
                e.preventDefault()

                Swal.fire({
                    title: '¿Estas seguro de guardar este rol?',
                    icon: 'info',
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

        <script>
            $(document).ready(function() {
                // Manejador de eventos para los checkboxes "Marcar Todo"
                $('.check-all').change(function() {
                    var column = $(this).data('column');
                    var checked = $(this).is(':checked');
                    $('table:eq(' + column + ') tbody tr td input[type="checkbox"]').prop('checked', checked);
                });

                // Manejador de eventos para los checkboxes de cada fila
                $('table tbody tr td input[type="checkbox"]').change(function() {
                    var column = $(this).data('column');
                    var checked = $(this).is(':checked');
                    var all_checked = true;
                    var all_unchecked = true;
                    $('table:eq(' + column + ') tbody tr').each(function() {
                        if ($(this).find('td:eq(' + column + ') input[type="checkbox"]').is(
                                ':checked')) {
                            all_unchecked = false;
                        } else {
                            all_checked = false;
                        }
                    });
                    $('table:eq(' + column + ') thead th:eq(0) input[type="checkbox"]').prop('checked',
                        all_checked);
                    $('table:eq(' + column + ') thead th:eq(0) input[type="checkbox"]').prop('indeterminate', (!
                        all_checked && !all_unchecked));
                });
            });
        </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/roles/create.blade.php ENDPATH**/ ?>