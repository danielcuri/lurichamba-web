<?php $__env->startSection('content'); ?>
    <section class="section-box"
        style="background-image: url('recursos-sjl/imagenes/FONDO-1_1920X1080.jpg');background-repeat: no-repeat; background-size: cover;">



        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="banner-imgs">
                    <img alt="jobhub" src="/recursos-sjl/imagenes/LURIGANCHO.png"
                        style="position: absolute; top:85%; left: 150px; width:43%" class="img-responsive shape-1" />
                </div>

                <div class="row align-items-center justify-content-center">

                    



                    <div class="col-lg-5 col-md-6">

                        <div class="row d-flex">
                            <div class="col-md-1 col-sm-6 mt-4 ">
                                <span style="color: red;font-size:110px" class="span-rojo">|</span>
                            </div>
                            <div class="img-ruwani-mobile">
                                <img alt="jobhub" src="/recursos-sjl/imagenes/LURIGANCHO.png" style=""
                                    class="" />
                            </div>
                            <div class="col-md-11 col-sm-6 ml-3">
                                <h3 class="texto-que-buscas">
                                    LA FORMA MÁS FÁCIL
                                    DE OFRECER TUS SERVICIOS</h3>
                            </div>


                        </div>

                        <div class="block-banner form-buscar margin-banner-buscar">

                            <div class="form-find mw-720" style="background-color:#C51821">
                                <h2 class="text-center text-white texto-categoria que-buscas" id=""
                                    style="font-weight:900">¿Qué buscas?</h2>

                                <form class="mt-4" style="display:flow-root !important; "
                                    action="/servicio<?php echo e(request('search') || request('servicio') ? '?' . http_build_query(request()->except('page')) : ''); ?>">

                                    <div class="row">
                                        <div class="col-md-6 select-container input-form-buscar-margin">
                                            <select name="servicio" id=""
                                                class="form-control form-select mr-10 custom-select" style="width: 100%;">
                                                <option value="" disabled selected>SELECCIONE UN SERVICIO</option>
                                                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($servicio->id); ?>">
                                                        <?php echo e($servicio->nombres); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 input-form-buscar-margin">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Puertas, Soldad... " />


                                        </div>
                                        <div class="row d-flex align-items-center justify-content-center mt-4">
                                            <div class="col-md-2 text-center">
                                                <button type="submit"
                                                    class="btn btn-default btn-find texto-categoria wow animate__ animate__fadeInUp"
                                                    style="visibility: visible; animation-name: fadeInUp;font-weight:900"><b>BUSCAR</b></button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-imgs">
                            <img alt="jobhub" src="/recursos-sjl/imagenes/1734X2038_PERSONAJE-1.png"
                                class="img-responsive shape-1" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="section-box"
        style="background-image: url('recursos-sjl/imagenes/FONDO-CATEGORIAS_1920X1080.jpg');background-repeat: no-repeat; background-size: cover;">
        <div class="container">


            <div class="row mt-70 mb-5">

                <div class="col-md-12">
                    <h1 class="text-center texto-categoria text-xl" style="color: #34A0B3;font-size:50px;font-weight:900">
                        BUSCAR POR CATEGORÍA
                    </h1>
                </div>

            </div>



            <div class="row mt-70 ml-desktop-200 mr-desktop-200">
                <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp"
                            style="background-color: #34A0B3">

                            <div class="row">
                                <!-- First part (20% width) -->
                                <div class="text-center col-lg-12 col-4">
                                    <a href="/servicio?categoria=<?php echo e($tipo_servicio->slug); ?>" class="text-center">
                                        <figure>
                                            <img alt="jobhub" src="<?php echo e(Storage::url($tipo_servicio->icono_url)); ?>" />
                                        </figure>
                                    </a>
                                </div>

                                <!-- Second part (80% width) -->
                                <div class=" col-lg-12 col-8">
                                    <h5 class="text-center mt-3 card-heading">
                                        <a class="text-white texto-categoria" style="font-weight: 900"
                                            href="/servicio?categoria=<?php echo e($tipo_servicio->slug); ?>">
                                            <?php echo e(Str::upper($tipo_servicio->nombres)); ?>

                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row d-flex align-items-center justify-content-center mt-4 ml-desktop-200 mr-desktop-200">

                <div class="col-md-5 col-lg-4 mt-10 mb-40 text-center">
                    <a href="/servicio" target="_blank" class="texto-categoria btn btn-default fw-900 mt-2"
                        style="font-weight: 900;font-size:25px">
                        <b class="mt-2 mb-3">EXPLORAR MÁS</b>

                    </a>
                </div>

            </div>

        </div>
    </section>

    

    <section class="section-box mt-50 bg-patern"
        style="background-image: url('recursos-sjl/imagenes/FONDO-SERVICIOS_1920X1080.jpg'); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">



        <div class="container">
            <div class="row mt-40 mb-4">

                <div class="col-md-12">
                    <h1 class="text-center texto-categoria text-xl" style="color: #F1A405;font-size:50px;font-weight:900">
                        SERVICIOS RECIENTES

                    </h1>
                </div>

            </div>


            <div class="row mt-70 ml-desktop-100 mr-desktop-100">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-3">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <?php $__currentLoopData = $publicaciones_recientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide col-md-4">
                                    <div class="card-grid-3 hover-up card-gris align-items-stretch">
                                        <div class="card-block-info">
                                            <div class="text-center">
                                                <figure>
                                                    <img alt="jobhub"
                                                        src="<?php echo e(asset('recursos-sjl/imagenes/ICONO-USUARIO_100X100.png')); ?>"
                                                        style="width: 200px !important;height:200px" />
                                                </figure>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-12 text-center font-bold texto-categoria"
                                                    style="font-weight: 900;font-size:30px">
                                                    <p><?php echo e($publicacion->personas->nombres); ?>

                                                        <?php echo e($publicacion->personas->apellido_paterno); ?></p>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="mt-15 heading-md font-semibold text-center"
                                                    style="height: 50px">
                                                    <a
                                                        href="<?php echo e(route('servicio-portal.show', $publicacion)); ?>"><?php echo e($publicacion->nombres); ?></a>
                                                </h5>
                                            </div>


                                            <div class="card-2-bottom mt-50">
                                                <div
                                                    class="row d-flex align-items-center justify-content-center boton-contactar">
                                                    <div class="col-lg-6 col-md-12 text-center">
                                                        <a href="<?php echo e(route('servicio-portal.show', $publicacion)); ?>"
                                                            class="btn btn-default btn-shadow hover-up fw-900 texto-categoria"
                                                            style="font-weight: 900">CONTACTAR</a>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="swiper-pagination swiper-pagination3 mt-20 mb-5"></div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>









        </div>
    </section>

    <section class="section-box mt-50 fondo-imagen-seccion" style="">
        <div class="row">
            
            <div class="col-md-5" style="">
                <img class="img-persona-registrate" alt="jobhub"
                    src="/recursos-sjl/imagenes/1734X2038_PERSONAJE-2.png" />
            </div>

            <div class="col-md-5 img-persona-registrate-corto mt-180">
                <img class="" alt="jobhub" src="/recursos-sjl/imagenes/1734X2038_PERSONAJE-3.png"
                    style="top: 500px" />
            </div>





            <div class="col-md-7 top-registra">

                <div class="top-registra">
                    <h2 class="text-center text-white texto-categoria top-registra-h" style="font-weight:900">
                        ¡REGISTRATE AHORA!
                    </h2>



                </div>

                <div>
                    <h2 class="text-center text-white texto-categoria top-publica-servicio-h" style="font-weight: normal">
                        Y publica tus servicios laborales
                    </h2>
                </div>
                
                

                <form class="form-newsletter" action="<?php echo e(route('registrate.index')); ?>" method="GET">

                    <div class="input-correo-registrate mt-70">
                        <input type="text" class="form-control rounded-pill py-4 mt-8 mb-3 input-correo-text"
                            placeholder="Correo Electrónico">
                    </div>



                    <div class="row justify-content-center mt-4">
                        <div class="col-md-3 text-center">
                            <button type="submit" class="texto-categoria btn btn-default rounded-pill fw-900 mt-2 mb-10"
                                style="font-weight: 900; font-size:25px">
                                <b class="">REGISTRARME</b>
                            </button>
                        </div>
                    </div>
                </form>

            </div>






        </div>






    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .boton-contactar {
            margin-right: 80px
        }

        .texto-categoria {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 22px;

        }

        .que-buscas {
            margin-top: 1px;
        }

        .top-registra {
            margin-top: -17px !important;
        }

        .top-registra-h {
            margin-top: 85px !important;
            font-size: 40px
        }

        .top-publica-servicio-h {
            font-size: 25px
        }

        .img-persona-registrate {
            height: 100%;
            width: 700px;
            top: 30px;
            display: none;

        }

        .input-correo-registrate {
            margin-right: 3px;
            margin-left: 3px;

        }

        .input-correo-text {
            font-size: 15px;
            height: 40px;
        }

        .img-persona-registrate-corto {

            display: flow-root;

        }

        .fondo-imagen-seccion {
            background-image: url('recursos-sjl/imagenes/Imagen4.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center;
            z-index: 3
        }


        @media (max-width: 992px) {
            .ml-desktop-200 {
                margin-left: 40px !important;

            }

            .boton-contactar {
                margin-right: 0px !important
            }

            .mr-desktop-200 {
                margin-right: 40px !important;

            }
        }

        @media (min-width: 992px) {

            .ml-desktop-200 {
                margin-left: 400px !important;
            }

            .mr-desktop-200 {
                margin-right: 400px !important;
            }

            .top-registra {
                margin-top: 70px !important;
            }

            .top-registra-h {
                margin-top: 150px !important;
                font-size: 80px
            }

            .top-publica-servicio-h {
                font-size: 55px
            }

            .img-persona-registrate {
                height: 850px;
                width: 850px;
                display: flow-root;
            }

            .input-correo-registrate {
                margin-right: 100px;
                margin-left: 100px;

            }

            .input-correo-text {
                font-size: 20px;
                height: 80px;
            }

            .img-persona-registrate-corto {
                display: none;
            }

            .fondo-imagen-seccion {
                background-image: url('recursos-sjl/imagenes/FONDO-REGISTRO_1920X1080.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-position: center;
                z-index: 3
            }

        }

        @media (min-width: 992px) {
            .ml-desktop-100 {
                margin-left: 280px !important;
            }

            .mr-desktop-100 {
                margin-right: 280px !important;
            }
        }



        .card-gris {
            background: #ededed;
            border-radius: 30px;
            box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.5)
        }

        .fondo-final-seccion {
            background-color: #C51821;
        }


        .form-buscar {
            position: relative !important;
            top: none;
            left: 0;
            width: 100%;
        }

        .input-form-buscar-margin {

            margin-top: 15px
        }

        .texto-que-buscas {

            font-size: 22px;
            font-weight: 800;
            text-align: center;
            font-family: 'Montserrat', sans-serif !important;
            margin-top: 10px;
            line-height: 1.2;

        }

        .span-rojo {
            display: none;
        }

        .img-ruwani-mobile {
            display: flex;
        }

        .margin-banner-buscar {
            margin-top: 2px;
            padding-top: 2px !important;

        }



        @media screen and (max-width: 1098px) {
            .ml-desktop-200 {
                margin-left: 40px !important;

            }

            .mr-desktop-200 {
                margin-right: 40px !important;

            }

            .ml-desktop-100 {
                margin-left: 10px !important;

            }

            .mr-desktop-100 {
                margin-right: 10px !important;

            }

            .img-persona-registrate {
                height: 700px;
                width: 700px;
            }


            .img-persona-registrateo-corto {
                display: flow-root;
            }


        }

        /* Styles for screens with a maximum width of 767px (typical for mobile devices) */


        /* esta malogrando */
        @media (max-width: 1536px) {
            .ml-desktop-200 {
                margin-left: 40px !important;

            }

            .mr-desktop-200 {
                margin-right: 40px !important;

            }

            .ml-desktop-100 {
                margin-left: 10px !important;

            }

            .mr-desktop-100 {
                margin-right: 10px !important;

            }

            .img-persona-registrate {
                height: 700px;
                width: 700px;
            }


            .img-persona-registrateo-corto {
                display: flow-root;
            }

            .texto-que-buscas {
                font-size: 38px !important;
                font-weight: 400 !important;
                text-align: start !important;
                margin-top: -23px !important;

            }

            .margin-banner-buscar {
                margin-top: 80px !important;
                padding-top: 10px !important;
            }

            .form-buscar {
                position: absolute !important;
                top: 43%;
                left: 0;
                width: 100%;
            }

            .input-form-buscar-margin {
                margin-top: -29px !important;
            }
        }

        @media (min-width: 992px) {
            .form-buscar {
                position: absolute !important;
                top: 45%;
                left: 0;
                width: 100%;

            }

            .input-form-buscar-margin {

                margin-top: 5px
            }

            .texto-que-buscas {
                font-size: 44px;
                font-weight: 400;
                text-align: start;
                margin-top: 1px;

            }

            .span-rojo {
                display: flex;
            }

            .img-ruwani-mobile {
                display: none;
            }

            .margin-banner-buscar {
                margin-top: 80px !important;
                padding-top: 50px !important;
            }



        }

        @media (max-width: 1098px) {
            .ml-desktop-200 {
                margin-left: 40px !important;

            }

            .mr-desktop-200 {
                margin-right: 40px !important;

            }

            .ml-desktop-100 {
                margin-left: 10px !important;

            }

            .mr-desktop-100 {
                margin-right: 10px !important;

            }

            .img-persona-registrate {
                height: 617px !important;
                width: 700px !important;
            }


            .img-persona-registrateo-corto {
                display: flow-root;
            }

            .mt-70 {
                margin-top: 20px !important
            }


            .fondo-imagen-seccion {
                background-image: url('recursos-sjl/imagenes/FONDO-REGISTRO_1920X1080.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-position: center;
                z-index: 3;
            }

            h2 .texto-categoria {
                font-weight: 900;
                margin-top: -38px;
            }

            .mw-720 {
                max-width: 576px;
                margin: auto;
                display: table !important;
                table-layout: fixed;
            }

            .que-buscas {
                margin-top: -41px;
            }

        }

        @media screen and (max-width: 1024px) {

            .ml-desktop-200 {
                margin-left: 10px !important;

            }

            .mr-desktop-200 {
                margin-right: 10px !important;

            }

            .ml-desktop-100 {
                margin-left: 100px !important;

            }

            .mr-desktop-100 {
                margin-right: 100px !important;

            }

            .input-correo-registrate {
                margin-right: 5px;
                margin-left: 5px;

            }

            .form-buscar {
                position: relative !important;
                top: none;
                left: 0;
                width: 100%;
            }




        }


        /* LO MALOGRA EN DESKTOP Y CELULAR LO PONE LAS LETRAS PEQUEÑAS*/

        /* CAMBIADO DE MAX A MIN */
        @media (max-width: 1280px) {
            .ml-desktop-200 {
                margin-left: 40px !important;

            }

            .mr-desktop-200 {
                margin-right: 40px !important;

            }

            .ml-desktop-100 {
                margin-left: 10px !important;

            }

            .mr-desktop-100 {
                margin-right: 10px !important;

            }

            .img-persona-registrate {
                height: 700px;
                width: 700px;
            }

            .img-logo-responsive {
                width: 469px;
                height: 73px;
            }

            .img-persona-registrateo-corto {
                display: flow-root;
            }

            .texto-que-buscas {
                font-size: 20px !important;
                font-weight: 400 !important;
                text-align: start !important;
                margin-top: -23px !important;

            }

            .margin-banner-buscar {
                margin-top: 80px !important;
                padding-top: 10px !important;
            }

            .form-buscar {
                position: absolute !important;
                top: 43%;
                left: 0;
                width: 100%;
            }

            .input-form-buscar-margin {
                margin-top: -29px !important;
            }

            .span-rojo {
                color: red !important;
                font-size: 60px !important;
                margin-top: -42px;
            }



        }

        /* Consulta de medios para pantallas de laptops y pantallas más grandes */
        @media (max-width: 1366px) {
            .ml-desktop-200 {
                margin-left: 0px !important;

            }

            .mr-desktop-200 {
                margin-right: 0px !important;

            }

            .img-persona-registrate {
                height: 667px;
                width: 700px;
            }


            .img-persona-registrateo-corto {
                display: flow-root;
            }
        }


        @media (max-width: 767px) {
            .ml-desktop-100 {
                margin-left: 10px !important;

            }

            .mr-desktop-100 {
                margin-right: 10px !important;

            }

            .card-gris {
                background: #ededed !important;
                border-radius: 30px !important;
                box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.5) !important
            }

            .fondo-final-seccion {
                background-color: #C51821 !important;
            }


            .form-buscar {
                position: relative !important;
                top: none;
                left: 0;
                width: 100%;
            }

            .input-form-buscar-margin {

                margin-top: 15px !important
            }

            .texto-que-buscas {

                font-size: 22px !important;
                font-weight: 800 !important;
                text-align: center !important;
                font-family: 'Montserrat', sans-serif !important;
                margin-top: 10px !important;
                line-height: 1.2 !important;

            }

            .span-rojo {
                display: none;
            }

            .img-ruwani-mobile {
                display: flex;
            }

            .margin-banner-buscar {
                margin-top: 2px;
                padding-top: 2px !important;

            }




            /* CSSS 2 */
            .texto-categoria {
                font-family: 'Montserrat', sans-serif !important;
                font-size: 22px;

            }

            .que-buscas {
                margin-top: 1px;
            }

            .top-registra {
                margin-top: -17px !important;
            }

            .top-registra-h {
                margin-top: 85px !important;
                font-size: 40px
            }

            .top-publica-servicio-h {
                font-size: 25px
            }

            .img-persona-registrate {
                height: 100%;
                width: 700px;
                top: 30px;
                display: none;

            }

            .input-correo-registrate {
                margin-right: 3px;
                margin-left: 3px;

            }

            .input-correo-text {
                font-size: 15px;
                height: 40px;
            }

            .img-persona-registrate-corto {

                display: flow-root;

            }

            .fondo-imagen-seccion {
                background-image: url('recursos-sjl/imagenes/Imagen4.png');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-position: center;
                z-index: 3
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/portal/menu/index.blade.php ENDPATH**/ ?>