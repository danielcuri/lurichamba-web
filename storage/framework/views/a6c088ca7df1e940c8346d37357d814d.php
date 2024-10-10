<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-20503CPVHS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-20503CPVHS');
    </script>
    <meta charset="utf-8" />
    <title>SJL SERVICIOS</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://web.munisjl.gob.pe/web/images/favicon.png" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/css/plugins/animate.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/css/main.css?v=1.0')); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('portal/font-awesome.min.css')); ?>">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



    <style>
        .img-logo-responsive {

            width: 550px;
            right: 57px
        }

        .burger-icono-side {
            top: 45px;
            right: 27px;

        }

        .botones-sesiones {

            font-size: 5px
        }




        @media (min-width: 992px) {
            .img-logo-responsive {

                width: 563px;
                height: 98px
            }

            .burger-icono-side {
                top: 45px;
                right: 27px;

            }

            .botones-sesiones {

                font-size: 22px
            }
        }

        @media screen and (max-width: 767px) {
            .botones-sesiones {

                font-size: 10px
            }

        }

        @media screen and (max-width: 1024px) {


            .botones-sesiones {

                font-size: 15px
            }
        }
    </style>

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="<?php echo e(asset('portal/assets/imgs/theme/loading.gif')); ?>" alt="jobhub" />
                </div>
            </div>
        </div>
    </div>
    <header class="header sticky-bar">
        <div class="container">
            <?php echo $__env->make('portal.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <?php echo $__env->make('portal.mobile-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!--End header-->
    <!-- Content -->
    <main class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <!-- End Content -->
    <!-- Footer -->
    <footer class="footer mt-50" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="">
                        <img alt="jobhub" style="width: 360px;height:100px"
                            src="/logo_sjl_cambia-contigo_2.png" />

                    </a>
                    <div class="mt-20 mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan sodales urna, et maximus diam rhoncus sollicitudin.</div>

                </div>
                <div class="col-md-2 col-xs-6">
                    <h6 class="font-bold">Municipalidad</h6>
                    <ul class="menu-footer mt-40">
                        <!-- <li><a href="https://web.munisjl.gob.pe/web/convocatorias.php?anio=6"
                                target="_blank">Convocatorias</a></li>
                        <li><a href="https://web.munisjl.gob.pe/web/mas_noticias.php" target="_blank">Noticias</a></li>
                        <li><a href="https://web.munisjl.gob.pe/web/contacto" target="_blank">Sedes</a></li> -->
                        <li><a href="<?php echo e(route('portal.politicasPrivacidad')); ?>" target="_blank">Políticas y Privacidad</a></li>
                        <li><a href="<?php echo e(route('portal.terminosCondiciones')); ?>">Términos y Condiciones</a></li>
                    </ul>
                </div>
                <!-- <div class="col-md-2 col-xs-6">
                    <h6 class="font-bold">Autenticación</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="<?php echo e(route('portal.login')); ?>">Iniciar sesión</a></li>
                        <li><a href="<?php echo e(route('registrate.index')); ?>">Registrarse</a></li>

                    </ul>
                </div> -->
                <!-- <div class="col-md-2 col-xs-6">
                    <h6 class="font-bold">Institucional</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="<?php echo e(route('portal.politicasPrivacidad')); ?>" target="_blank">Políticas y Privacidad</a></li>
                        <li><a href="<?php echo e(route('portal.terminosCondiciones')); ?>">Términos y Condiciones</a></li>


                        
                        
                    </ul>
                </div> -->
                <!-- <div class="col-md-2 col-xs-6">
                    <h6 class="font-bold">Distrito</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="https://web.munisjl.gob.pe/web/distrito.php?id=1" target="_blank">Historia</a></li>
                        <li><a href="https://web.munisjl.gob.pe/web/distrito.php?id=2" target="_blank">Geografía</a></li>

                    </ul>
                </div> -->

            </div>

            <div class="footer-bottom mt-50">
                <div class="row">
                    <div class="col-md-6">
                        <span id="copyright"></span> <a href="https://web.munisjl.gob.pe/web/" target="_blank"><strong>Copyright </strong></a>. Reservados todos los derechos
                    </div>
                    <div class="col-md-6 text-md-end text-start">
                        <div class="footer-social">
                            <!-- <a href="https://www.facebook.com/MunicipalidadSJL/" class="icon-socials icon-facebook" target="_blank"></a>
                            <a href="https://twitter.com/municipiosjl" class="icon-socials icon-twitter" target="_blank"></a>
                            <a href="https://www.instagram.com/munisanjuandelurigancho/?hl=es-la" class="icon-socials icon-instagram" target="_blank"></a>
                            <a href="https://www.linkedin.com/company/municipality-of-san-juan-de-lurigancho/mycompany/" class="icon-socials icon-linkedin" target="_blank"></a> -->
                            <a href="#" class="icon-socials icon-facebook" target="_blank"></a>
                            <a href="#" class="icon-socials icon-twitter" target="_blank"></a>
                            <a href="#" class="icon-socials icon-instagram" target="_blank"></a>
                            <a href="#" class="icon-socials icon-linkedin" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                document.getElementById("copyright").innerHTML = "&copy;" + new Date().getFullYear();
            </script>
            
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Vendor JS-->

    <?php echo $__env->yieldContent('scripts'); ?>
    <script src="<?php echo e(asset('portal/assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    
    
    <script src="<?php echo e(asset('portal/assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/scrollup.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/assets/js/plugins/swiper-bundle.min.js')); ?>"></script>
    <!-- Template  JS -->
    <script src="<?php echo e(asset('portal/assets/js/main.js?v=1.0')); ?>"></script>



</body>

</html>
<?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/portal/panel.blade.php ENDPATH**/ ?>