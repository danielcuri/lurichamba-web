<?php $__env->startSection('header'); ?>
    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Menu Principal</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php echo e(route('menu-principal.index')); ?>">Menu Principal</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">

        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <!-- Greetings Card starts -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-congratulations">
                        <div class="card-body text-center">
                            <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left"
                                alt="card-img-left" />
                            <img src="../../../app-assets/images/elements/decore-right.png"
                                class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <i data-feather="award" class="font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-1 text-white">Bienvenido <?php echo e(auth()->user()->name); ?></h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Greetings Card ends -->
            </div>

            



            <!--/ List DataTable -->
        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/menu/index.blade.php ENDPATH**/ ?>