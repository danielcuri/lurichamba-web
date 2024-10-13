<?php $__env->startSection('title', 'Editar Usuarios'); ?>

<?php $__env->startSection('header'); ?>
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Editar Usuario</h1>
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
                    <?php echo Form::model($usuario, [
                        'route' => ['usuario.update', $usuario],
                        'method' => 'put',
                        'files' => true,
                        'class' => 'formulario',
                    ]); ?>


                    <div class="form-group">
                        <label class="form-label" for="pwd">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ingrese El Nombre" value="<?php echo e($usuario->name); ?>">
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

                    <div class="form-group">
                        <label class="form-label" for="pwd">Correo :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ingrese El Correo" value="<?php echo e($usuario->email); ?>">
                        <?php $__errorArgs = ['email'];
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
                    <div class="form-group">
                        <label class="form-label" for="pwd">Escribir Nueva Contraseña :</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese La contraseña">
                        <?php $__errorArgs = ['password'];
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

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?php echo e(route('usuario.index')); ?>" class="btn btn-danger">
                        Cancelar
                    </a>

                    <?php echo Form::close(); ?>

                </div>



            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.formulario').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de actualizar?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Guardar!',
                cancelButtonText: 'Cancelar',
                theme: 'dark', // Agregar la opción de tema oscuro
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/usuarios/edit.blade.php ENDPATH**/ ?>