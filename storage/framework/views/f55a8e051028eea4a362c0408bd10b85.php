<?php $__env->startSection('title', 'Asignar Rol Al Usuario'); ?>

<?php $__env->startSection('header'); ?>
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Asignar Rol</h1>
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
                        'route' => ['usuario.updaterole', $usuario],
                        'method' => 'put',
                        'files' => true,
                        'class' => 'casino',
                    ]); ?>


                    <div class="form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="name" class="form-control" id="name" name="name"
                            value="<?php echo e($usuario->name); ?>" readonly>
                    </div>

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

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label>
                                <?php echo Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']); ?>

                                <?php echo e($rol->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <button type="submit" class="btn btn-primary">Asignar Rol</button>
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
        $('.casino').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de asignar roles a este Usuario?',

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/usuarios/role.blade.php ENDPATH**/ ?>