<?php $__env->startSection('content'); ?>

<br>
<section class="section-box mt-3" style="background: rgb(248, 241, 241)">
    <div class="container pt-50">
        <div class="w-50 w-md-100 mx-auto text-center">
            <img src="/403error.png" alt="" style="width: 250px">
            <h1 class="section-title-large mb-30 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Error 403</h1>
            
        
            <p class="lead">Acceso Prohibido</p>
            <p class="mb-4">Lo siento, no tienes permisos para acceder a esta página.</p> <br>
            <a class="btn btn-primary mb-5" href="<?php echo e(url('/')); ?>">Ir a la página de inicio</a>
        </div>
    </div>
</section>
<br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/errors/403.blade.php ENDPATH**/ ?>