<?php $__env->startSection('content'); ?>




<div class="breacrumb-cover">
    <div class="container">
        <ul class="breadcrumbs mt-3">
            <li><a href="#">Inicio</a></li>
            <li>Registrarse</li>
        </ul>
    </div>
</div>


<section class="section-box ">
    <div class="container">
        <div class="container mt-50 mt-md-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto mt-50">
                    <section class="mb-50">

                        <div class="row">
                            
                            <div class="col-xl-9 col-md-12 mx-auto">
                                <div class="contact-from-area padding-20-row-col">


                               
                                <div class="d-grid gap-2 d-md-block">
                                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active d-grid gap-2  btn-lg" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">OFRECER SERVICIO</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link d-grid gap-2  btn-lg" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">CONTRATAR SERVICIO</button>
                                        </li>
                                    </ul>
                                </div>
                                

                                <div class="card" style="box-sizing: border-box; padding: 20px;border: 1px solid #ccc;border-radius: 50px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="card-body">
                                            <h2 class="section-title text-center mb-15 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Registro</h2>
                                            <?php if($errors->any()): ?>
                                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                                <ul class="error-list">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class=""><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <button type="button" class="btn-close mb-2" data-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php endif; ?>
                                            
                                            <form class="contact-form-style" id="contact-form" action="<?php echo e(route('registrate.ofrecerServicio')); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="input-style mb-20">
                                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*
                                                            Tipo de Documento:</label>
                                                        <select name="tipo_documento_id" id="tipo_documento_id" onchange="capturarValorSeleccionado()" class="form-control" value="<?php echo e(old('tipo_documento_id')); ?>" required>
                                                            <option value="" selected disabled>Seleccione tipo de documento</option>
                                                            <?php $__currentLoopData = $tipo_documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($tipo_documento->id); ?>">
                                                                <?php echo e($tipo_documento->nombres); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*
                                                            Número de Documento:</label>
                                                        <input class="form-control" id="numero_documento" type="text" name="numero_documento" placeholder="Ingrese N° Documento" value="<?php echo e(old('numero_documento')); ?>" required onkeypress="return solonumeros(event)" />
                                                    </div>
                                                </div>

                                                    

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="nombres" style="font-weight: bold">*
                                                                Numero de celular:</label>
                                                            <input class="form-control" id="numero_celular" type="text" name="numero_celular" placeholder="Ingrese su celular" autocomplete="new-username" value="<?php echo e(old('numero_celular')); ?>" required onkeypress="return solonumeros(event)" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="ruc" style="font-weight: bold">*
                                                                RUC:</label>
                                                            <input class="form-control" id="ruc" type="text" name="ruc" placeholder="Ingrese su RUC" value="<?php echo e(old('ruc')); ?>"  onkeypress="return solonumeros(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="nombres" style="font-weight: bold">*
                                                                Nombres:</label>
                                                            <input class="form-control" id="nombres" type="text" name="nombres" placeholder="Ingrese Su Nombre Completo" autocomplete="new-username" value="<?php echo e(old('nombres')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_paterno" style="font-weight: bold">*
                                                                Apellido Paterno:</label>
                                                            <input name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese Su Apellido Paterno" type="text" value="<?php echo e(old('apellido_paterno')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_materno" style="font-weight: bold">*
                                                                Apellido Materno:</label>

                                                            <input name="apellido_materno" id="apellido_materno" placeholder="Ingrese Su Apellido Materno" type="text" value="<?php echo e(old('apellido_materno')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="direccion_fiscal" style="font-weight: bold">*
                                                                Dirección Fiscal:</label>
                                                            <input name="direccion_fiscal" id="direccion_fiscal" placeholder="Ingrese Su Domicilio Fiscal" type="text" value="<?php echo e(old('direccion_fiscal')); ?>" required />

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="file" style="font-weight: bold">* 
                                                                Subir Certificado Único Laboral: <span><a href="https://www.empleosperu.gob.pe/CertificadoUnicoLaboral/" target="_blank" class="text-danger">Descargar Certificado</a></span></label>
                                                            <input class="form-control" name="file" id="file" type="file" accept=".pdf" placeholder=""  value="<?php echo e(old('file')); ?>" required>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <label class="form-label text-lg font-weight-bold mr-3" for="login-password" style="font-weight: bold">*Correo:</label>
                                                        <input name="email" id="email" class="form-control" placeholder="Ingrese Su Correo" type="email" value="<?php echo e(old('email', request('email') ?? '')); ?>" required />
                                                    </div>

                                                    <label class="form-label text-lg font-weight-bold mr-3" for="password" style="font-weight: bold">*Contraseña:</label>
                                                    <div class="input-group form-password-toggle mb-2">
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su Contraseña" aria-describedby="basic-default-password" maxlength="18">
                                                        <span class="input-group-text cursor-pointer" onclick="togglePassword()">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-small-4">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </span>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <div class="input-style mb-20">
                                                            <input class="form-check-input" type="checkbox" id="aceptacion_termino" value="1" name="aceptacion_termino" required>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Estoy de acuerdo con los <a href="#">Terminos y Condiciones.</a>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <button class="submit submit-auto-width" type="submit">Registrarse</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- aqui -->
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                            <h2 class="section-title text-center mb-15 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Registro</h2>
                                            <?php if($errors->any()): ?>
                                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                                <ul class="error-list">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class=""><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <button type="button" class="btn-close mb-2" data-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php endif; ?>
                                            
                                            <form class="contact-form-style" id="contact-form" action="<?php echo e(route('registrar.contratarServicio')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*
                                                                Tipo de Documento:</label>
                                                            <select name="tipo_documento_id" id="tipo_documento_id1" onchange="capturarValorSeleccionado()" class="form-control" value="<?php echo e(old('tipo_documento_id')); ?>" required>
                                                                <option value="" selected disabled>Seleccione tipo de documento</option>
                                                                <?php $__currentLoopData = $tipo_documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($tipo_documento->id); ?>">
                                                                    <?php echo e($tipo_documento->nombres); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*
                                                                Número de Documento:</label>
                                                            <input class="form-control" id="numero_documento1" type="text" name="numero_documento1" placeholder="Ingrese N° Documento" value="<?php echo e(old('numero_documento')); ?>" required onkeypress="return solonumeros(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="ruc" style="font-weight: bold">*
                                                                RUC:</label>
                                                            <input class="form-control" type="text" name="ruc" placeholder="Ingrese su RUC" value="<?php echo e(old('ruc')); ?>" required onkeypress="return solonumeros(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="nombres" style="font-weight: bold">*
                                                                Numero de celular:</label>
                                                            <input class="form-control" id="numero_celular1" type="text" name="numero_celular1" placeholder="Ingrese su celular" autocomplete="new-username" value="<?php echo e(old('numero_celular')); ?>" required onkeypress="return solonumeros(event)" />
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="nombres" style="font-weight: bold">*
                                                                Nombres:</label>
                                                            <input class="form-control" id="nombres1" type="text" name="nombres1" placeholder="Ingrese Su Nombre Completo" autocomplete="new-username" value="<?php echo e(old('nombres')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_paterno" style="font-weight: bold">*
                                                                Apellido Paterno:</label>
                                                            <input name="apellido_paterno1" id="apellido_paterno1" placeholder="Ingrese Su Apellido Paterno" type="text" value="<?php echo e(old('apellido_paterno')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_materno" style="font-weight: bold">*
                                                                Apellido Materno:</label>

                                                            <input name="apellido_materno1" id="apellido_materno1" placeholder="Ingrese Su Apellido Materno" type="text" value="<?php echo e(old('apellido_materno')); ?>" required onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="input-style mb-20">
                                                            <label class="form-label text-lg font-weight-bold mr-3" for="direccion_fiscal" style="font-weight: bold">*
                                                                Dirección Fiscal:</label>
                                                            <input name="direccion_fiscal1" id="direccion_fiscal1" placeholder="Ingrese Su Domicilio Fiscal" type="text" value="<?php echo e(old('direccion_fiscal')); ?>" required />

                                                        </div>
                                                    </div>

                                                    

                                                    <div class="col-lg-12 col-md-12">
                                                    <div class="input-style mb-20">
                                                        <label class="form-label text-lg font-weight-bold mr-3" for="login-password" style="font-weight: bold">*
                                                            Correo:</label>
                                                        <input name="email" id="email" class="form-control" placeholder="Ingrese Su Correo" type="email" value="<?php echo e(old('email', request('email') ?? '')); ?>" required />
                                                    </div>

                                                    </div>

                                                    <label class="form-label text-lg font-weight-bold mr-3" for="password" style="font-weight: bold">*Contraseña:</label>
                                                    <div class="input-group form-password-toggle mb-2">
                                                        <input type="password" class="form-control" name="password" id="password2" placeholder="Ingrese su Contraseña" aria-describedby="basic-default-password" maxlength="18">
                                                        <span class="input-group-text cursor-pointer" onclick="togglePassword2()">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-small-4">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </span>
                                                    </div>





                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <div class="input-style mb-20">
                                                            <input class="form-check-input" type="checkbox" id="aceptacion_termino1" value="1" name="aceptacion_termino1" required>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Estoy de acuerdo con los <a href="#">Terminos y Condiciones.</a>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <button class="submit submit-auto-width" type="submit">Registrarse</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <p class="form-messege"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</section>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/numeros.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/letras.js')); ?>"></script>

<!-- VALIDAR SI EL SELECT SELECIONA UNA OPCION, LA CAJA DE TEXTO SE ADAPTA A QUE INGRESEN DATOS A ESA SELECCION-->
<script>
    // Asegurarse de que el DOM se haya cargado antes de ejecutar el script
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener el elemento select
        var select = document.getElementById("tipo_documento_id");

        // Verificar si el elemento select existe
        if (select) {
            // Agregar el evento onchange solo si el elemento existe
            select.addEventListener('change', function() {
                // Obtener el valor seleccionado
                var valorSeleccionado = select.options[select.selectedIndex].value;

                // Obtener el elemento input
                var inputNumeroDocumento = document.getElementById("numero_documento");

                // Limpiar el contenido del campo
                inputNumeroDocumento.value = "";

                // Ajustar la longitud máxima del input según el valor seleccionado
                if (valorSeleccionado === "1") {
                    inputNumeroDocumento.setAttribute("maxlength", "8");
                } else if (valorSeleccionado === "2" || valorSeleccionado === "3") {
                    inputNumeroDocumento.setAttribute("maxlength", "12");
                } else {
                    // Si no coincide con ninguna opción, restablecer a un valor predeterminado
                    inputNumeroDocumento.removeAttribute("maxlength");
                }
            });
        }
    });
</script>

<!-- VALIDACION PARA NUMERO DE CELULAR DE 8 DIGITOS-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el elemento input
        var inputNumeroCelular = document.getElementById("numero_celular");

        // Agregar un evento de escucha para el evento de entrada (input)
        inputNumeroCelular.addEventListener("input", function() {
            // Limitar la longitud máxima del input a 8 caracteres
            if (this.value.length > 9) {
                this.value = this.value.slice(0, 8);
            }
        });
    });
</script>

 <script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script> 


<!--SCRIPT / 2 SEGUNDO FORMULARIO -->

<!-- VALIDAR SI EL SELECT SELECIONA UNA OPCION, LA CAJA DE TEXTO SE ADAPTA A QUE INGRESEN DATOS A ESA SELECCION-->
<script>
    function capturarValorSeleccionado() {
        // Obtener el elemento select
        var select = document.getElementById("tipo_documento_id1");
        // Obtener el valor seleccionado
        var valorSeleccionado = select.options[select.selectedIndex].value;

        // Obtener el elemento input
        var inputNumeroDocumento = document.getElementById("numero_documento1");

        // Limpiar el contenido del campo
        inputNumeroDocumento.value = "";

        // Ajustar la longitud máxima del input según el valor seleccionado
        if (valorSeleccionado === "1") {
            inputNumeroDocumento.setAttribute("maxlength", "8");
        } else if (valorSeleccionado === "2") {
            inputNumeroDocumento.setAttribute("maxlength", "12");
        } else if (valorSeleccionado === "3") {
            inputNumeroDocumento.setAttribute("maxlength", "12");
        } else {
            // Si no coincide con ninguna opción, restablecer a un valor predeterminado
            inputNumeroDocumento.removeAttribute("maxlength");
        }
    }
</script>

<!-- VALIDACION PARA NUMERO DE CELULAR DE 8 DIGITOS-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el elemento input
        var inputNumeroCelular = document.getElementById("numero_celular1");

        // Agregar un evento de escucha para el evento de entrada (input)
        inputNumeroCelular.addEventListener("input", function() {
            // Limitar la longitud máxima del input a 8 caracteres
            if (this.value.length > 9) {
                this.value = this.value.slice(0, 8);
            }
        });
    });
</script>

<script>
    function togglePassword2() {
        var passwordInput = document.getElementById("password2");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\pt-mdsjl\resources\views/registrate/index.blade.php ENDPATH**/ ?>