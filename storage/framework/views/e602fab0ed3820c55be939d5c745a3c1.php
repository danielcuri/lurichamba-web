<div class="main-header">
    <div class="header-left">
        <div class="header-logo">
            <a href="/" class="d-flex "><img alt="jobhub"  class="img-logo-responsive"
                
                src="/recursos-sjl/imagenes/lurichamba.png" /></a>
            

            
        </div>
        <div class="header-nav">
           
            <div class="burger-icon burger-icon-white burger-icono-side">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
    </div>
    <div class="header-right">
        <?php if(session('usuario')): ?>
            
        <?php else: ?>
            <div class="block-signin mr-40 mb-40">
                <a href="<?php echo e(route('registrate.index')); ?>" class="btn btn-default hover-up botones-sesiones">Registrate</a>
                <a href="<?php echo e(route('portal-login.index')); ?>" class="btn btn-default btn-shadow ml-10 hover-up botones-sesiones">Iniciar Sesión</a>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/portal/header.blade.php ENDPATH**/ ?>