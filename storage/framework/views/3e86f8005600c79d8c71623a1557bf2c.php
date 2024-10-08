



<?php $__env->startSection('content'); ?>
    <section class="app-user-view-account">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fw-bolder section-title text-center mb-15 wow animate__ animate__fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">INFORMACIÓN PERSONA</h2>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                <ul class="error-list">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class=""><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <button type="button" class="btn-close mb-2" data-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form class="contact-form-style" id="contact-form"
                            action="<?php echo e(route('usuario-registrado.guardarPersona')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">

                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento"
                                            style="font-weight: bold">*
                                            Tipo de Documento:</label>
                                        <select name="tipo_documento_id" id="tipo_documento_id"
                                            onchange="capturarValorSeleccionado()" class="form-control"
                                            value="<?php echo e(old('tipo_documento_id')); ?>" required>
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
                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento"
                                            style="font-weight: bold">*
                                            Número de Documento:</label>
                                        <input class="form-control" id="numero_documento" type="text"
                                            name="numero_documento" placeholder="Ingrese N° Documento"
                                            value="<?php echo e(old('numero_documento')); ?>" required
                                            onkeypress="return solonumeros(event)" />
                                    </div>
                                </div>



                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                            style="font-weight: bold">*
                                            Numero de celular:</label>
                                        <input class="form-control" id="numero_celular" type="text" name="numero_celular"
                                            placeholder="Ingrese su celular" autocomplete="new-username" maxlength="9"
                                            value="<?php echo e(old('numero_celular')); ?>" required
                                            onkeypress="return solonumeros(event)" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="ruc"
                                            style="font-weight: bold">*
                                            RUC:</label>
                                        <input class="form-control" id="ruc" type="text" name="ruc"
                                            placeholder="Ingrese su RUC" value="<?php echo e(old('ruc')); ?>"
                                            onkeypress="return solonumeros(event)" />
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                            style="font-weight: bold">*
                                            Nombres:</label>
                                        <input class="form-control" id="nombres" type="text" name="nombres"
                                            placeholder="Ingrese Su Nombre Completo" autocomplete="new-username"
                                            value="<?php echo e(old('nombres')); ?>" required
                                            onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="apellido_paterno"
                                            style="font-weight: bold">*
                                            Apellido Paterno:</label>
                                        <input name="apellido_paterno" id="apellido_paterno" class="form-control"
                                            placeholder="Ingrese Su Apellido Paterno" type="text"
                                            value="<?php echo e(old('apellido_paterno')); ?>" required
                                            onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="apellido_materno"
                                            style="font-weight: bold">*
                                            Apellido Materno:</label>

                                        <input name="apellido_materno" id="apellido_materno" class="form-control"
                                            placeholder="Ingrese Su Apellido Materno" type="text"
                                            value="<?php echo e(old('apellido_materno')); ?>" required
                                            onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="direccion_fiscal"
                                            style="font-weight: bold">*
                                            Dirección Fiscal:</label>
                                        <input name="direccion_fiscal" id="direccion_fiscal" class="form-control"
                                            placeholder="Ingrese Su Domicilio Fiscal" type="text"
                                            value="<?php echo e(old('direccion_fiscal')); ?>" required />

                                    </div>
                                </div>




                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="login-password"
                                            style="font-weight: bold">*Correo:</label>
                                        <input name="email" id="email" class="form-control"
                                            placeholder="Ingrese Su Correo" type="email"
                                            value="<?php echo e(old('email', request('email') ?? '')); ?>" required />
                                    </div>


                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="fecha_nacimiento"
                                            style="font-weight: bold">*
                                            Fecha de Nacimiento:</label>
                                        <input name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                                            placeholder="Fecha Nacimiento" type="date"
                                            value="<?php echo e(old('fecha_nacimiento')); ?>" required />

                                    </div>
                                </div>




                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_discapacidad"
                                            style="font-weight: bold">*
                                            Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control"
                                            value="<?php echo e(old('sexo')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sexo); ?>">
                                                    <?php echo e($sexo); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="distrito"
                                            style="font-weight: bold">*
                                            Distrito:</label>
                                        <select name="distrito" id="distrito" class="form-control"
                                            value="<?php echo e(old('distrito')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $distritos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distrito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($distrito); ?>">
                                                    <?php echo e($distrito); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="comuna"
                                            style="font-weight: bold">*
                                            Comuna:</label>
                                        <select name="comuna" id="comuna" class="form-control"
                                            value="<?php echo e(old('comuna')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($comuna); ?>">
                                                    <?php echo e($comuna); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3"
                                            for="coordenadas_geograficas" style="font-weight: bold">*
                                            Coordenadas Graficas:</label>
                                        <input name="coordenadas_geograficas" id="coordenadas_geograficas"
                                            class="form-control" placeholder="Ingrese Coordenadas Graficas"
                                            type="text" value="<?php echo e(old('coordenadas_geograficas')); ?>" required />

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_nucleo"
                                            style="font-weight: bold">*
                                            Tipo Nucleos:</label>
                                        <select name="tipo_nucleo" id="tipo_nucleo" class="form-control"
                                            value="<?php echo e(old('tipo_nucleo')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_nucleos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_nucleo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo_nucleo); ?>">
                                                    <?php echo e($tipo_nucleo); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3"
                                            for="nombre_asentamiento_humano" style="font-weight: bold">*
                                            Asentamiento humano:</label>
                                        <input name="nombre_asentamiento_humano" id="nombre_asentamiento_humano"
                                            class="form-control" placeholder="Ingrese nombre asentamiento humano"
                                            type="text" value="<?php echo e(old('nombre_asentamiento_humano')); ?>" required />

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_via"
                                            style="font-weight: bold">*
                                            Tipo Via:</label>
                                        <select name="tipo_via" id="tipo_via" class="form-control"
                                            value="<?php echo e(old('tipo_via')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_vias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_via): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo_via); ?>">
                                                    <?php echo e($tipo_via); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="nombre_via"
                                            style="font-weight: bold">*
                                            Via:</label>
                                        <input name="nombre_via" id="nombre_via" class="form-control"
                                            placeholder="Ingrese nombre via" type="text"
                                            value="<?php echo e(old('nombre_via')); ?>" required />

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="numeracion"
                                            style="font-weight: bold">*
                                            Numeración / Mz. Lt. / Km.:</label>
                                        <input name="numeracion" id="numeracion" class="form-control"
                                            placeholder="Numeración / Mz. Lt. / Km." type="text"
                                            value="<?php echo e(old('numeracion')); ?>" required />

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_organizacion"
                                            style="font-weight: bold">*
                                            Tipo Organización:</label>
                                        <select name="tipo_organizacion" id="tipo_organizacion" class="form-control"
                                            value="<?php echo e(old('tipo_organizacion')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_organizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_organizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo_organizacion); ?>">
                                                    <?php echo e($tipo_organizacion); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>






                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_discapacidad"
                                            style="font-weight: bold">*
                                            Tiene alguna discapacidad ?</label>
                                        <select name="es_discapacidad" id="es_discapacidad" class="form-control"
                                            value="<?php echo e(old('es_discapacidad')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-9 mt-1">
                                    <label class="form-label text-lg font-weight-bold mr-3" for="archivo_discapacidad"
                                        style="font-weight: bold">*
                                        ADJUNTAR CARNET DE CONADIS :</label>
                                    <input name="archivo_discapacidad" id="archivo_discapacidad" class="form-control"
                                        type="file" value="<?php echo e(old('archivo_discapacidad')); ?>" required />



                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="grado_estudios"
                                            style="font-weight: bold">*
                                            Grado Estudios:</label>
                                        <select name="grado_estudios" id="grado_estudios" class="form-control"
                                            value="<?php echo e(old('grado_estudios')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado_estudio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($grado_estudio); ?>">
                                                    <?php echo e($grado_estudio); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="centro_estudios"
                                            style="font-weight: bold">*
                                            Ultimo Centro de Estudios:</label>
                                        <input name="centro_estudios" id="centro_estudios" class="form-control"
                                            placeholder="Centro de Estudios." type="text"
                                            value="<?php echo e(old('centro_estudios')); ?>" required />

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="file"
                                            style="font-weight: bold">*
                                            ADJUNTAR DOCUMENTO QUE ACREDITE GRADO DE ESTUDIO TÉCNICO O UNIVERSITARIO
                                        </label>
                                        <input class="form-control" name="file_estudio" type="file" accept=".pdf"
                                            placeholder="" value="<?php echo e(old('file_estudio')); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="file"
                                            style="font-weight: bold">*
                                            Subir Certificado Único Laboral: <span><a
                                                    href="https://www.empleosperu.gob.pe/CertificadoUnicoLaboral/"
                                                    target="_blank" class="text-danger">Descargar
                                                    Certificado</a></span></label>
                                        <input class="form-control" name="file_certificado_unico" type="file"
                                            accept=".pdf" placeholder="" value="<?php echo e(old('file_certificado_unico')); ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="file_ficha_ruc"
                                            style="font-weight: bold">*
                                            Subir Certificado Ficha RUC: </label>
                                        <input class="form-control" name="file_ficha_ruc" type="file" accept=".pdf"
                                            placeholder="" value="<?php echo e(old('file_ficha_ruc')); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_comprobante"
                                            style="font-weight: bold">*
                                            TIPO COMPROBANTE:</label>
                                        <select name="tipo_comprobante" id="tipo_comprobante" class="form-control"
                                            value="<?php echo e(old('tipo_comprobante')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_comprobantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_comprobante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo_comprobante); ?>">
                                                    <?php echo e($tipo_comprobante); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_emision"
                                            style="font-weight: bold">*
                                            TIPO EMISION:</label>
                                        <select name="tipo_emision" id="tipo_emision" class="form-control"
                                            value="<?php echo e(old('tipo_emision')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_emisiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_emision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo_emision); ?>">
                                                    <?php echo e($tipo_emision); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_local_fisico"
                                            style="font-weight: bold">*
                                            Tiene local fisico ?</label>
                                        <select name="es_local_fisico" id="es_local_fisico" class="form-control"
                                            value="<?php echo e(old('es_local_fisico')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_licencia"
                                            style="font-weight: bold">*
                                            TIENE LICENCIA DE FUNCIONAMIENTO ?</label>
                                        <select name="es_licencia" id="es_licencia" class="form-control"
                                            value="<?php echo e(old('es_licencia')); ?>" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="file_licencia"
                                            style="font-weight: bold">*
                                            ADJUNTAR LICENCIA: </label>
                                        <input class="form-control" name="file_licencia" id="file_licencia"
                                            type="file" accept=".pdf" placeholder=""
                                            value="<?php echo e(old('file_licencia')); ?>" required>
                                    </div>
                                </div>



                            </div>

                            <div class="row">

                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3 class="fw-bolder">SERVICIO QUE OFRECE</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                            <div class="col-lg-12 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label class="form-label text-lg font-weight-bold mr-3"
                                                        for="numero_documento" style="font-weight: bold">*
                                                        Tipo de Servicio:</label>
                                                    <select name="tipo_servicio_id" id="select1" class="form-control"
                                                        required>
                                                        <option value="0" disabled selected>Seleccione un Tipo de
                                                            Servicio
                                                        </option>
                                                        <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($tipoServicio->id); ?>">
                                                                <?php echo e($tipoServicio->nombres); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                                        style="font-weight: bold">*
                                                        Servicio:</label>
                                                    <select name="servicio_id" id="select2" class="form-control"
                                                        required>
                                                        <option value="0" disabled selected>Seleccione un Servicio
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-20">
                                                    <label class="form-label text-lg font-weight-bold mr-3"
                                                        style="font-weight: bold">*
                                                        Título de publicación:</label>
                                                    <div>
                                                        <span> Ejemplo: Servicio de albañileria especializada ......</span>
                                                    </div>
                                                    <input name="nombre_servicio" class="form-control" placeholder=""
                                                        type="text" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    style="font-weight: bold">*
                                                    Descripción de publicación:</label>
                                                <div>
                                                    <span>Ingresar el detalle de lo que va ofrecer.</span>
                                                </div>
                                                <textarea name="descripcion_servicio" class="form-control" id="" cols="30" rows="5" required></textarea>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <button class="btn btn-success submit submit-auto-width"
                                                    type="submit">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>



        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/numeros.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/letras.js')); ?>"></script>


    <script>
        $(document).ready(function() {

            // Escucha el evento de cambio en el elemento con id 'area_id'
            $('#select1').on('change', function() {
                // Captura el valor seleccionado en 'area_id'
                var AreaId = this.value;

                // Vacía el contenido del elemento con id 'sub_area_id'
                $('#select2').html('');

                if (AreaId) {

                    $.ajax({
                        url: '<?php echo e(route('getServicios')); ?>?area_id=' + AreaId,
                        type: 'get',
                        success: function(res) {
                            $.each(res, function(key, value) {
                                $('#select2').append('<option value="' + value.id +
                                    '">' + value.nombres + '</option>');
                            });
                        }
                    });
                } else {
                    // Establece opciones predeterminadas en caso de que no se haya seleccionado una opción en 'area_id'
                    $('#select2').html(
                        '<option value="" selected　<?php if(old('select2') == '1'): ?> selected <?php endif; ?>>Seleccione un servicio.....</option>'
                    );
                }
            });
        });
    </script>
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
    <script>
        function capturarValorSeleccionado() {
            // Obtener el elemento select
            var select = document.getElementById("tipo_documento_id");
            // Obtener el valor seleccionado
            var valorSeleccionado = select.options[select.selectedIndex].value;

            // Obtener el elemento input
            var inputNumeroDocumento = document.getElementById("numero_documento");

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
    <script>
        const fileInput = document.getElementById('archivo_discapacidad');
        fileInput.disabled = true; // Deshabilitar el input
        fileInput.style.display = 'none'; // Ocultar el input
        const file_licencia = document.getElementById('file_licencia');
        file_licencia.disabled = true; // Deshabilitar el input
        file_licencia.style.display = 'none'; // Ocultar el input
        document.getElementById('es_discapacidad').addEventListener('change', function() {

            if (this.value === 'NO') {
                fileInput.style.display = 'none'; // Ocultar el input
                fileInput.disabled = true; // Deshabilitar el input
            } else {
                fileInput.style.display = 'block'; // Mostrar el input
                fileInput.disabled = false; // Habilitar el input
            }
        });

        document.getElementById('es_licencia').addEventListener('change', function() {

            if (this.value === 'NO') {
                file_licencia.style.display = 'none'; // Ocultar el input
                file_licencia.disabled = true; // Deshabilitar el input
            } else {
                file_licencia.style.display = 'block'; // Mostrar el input
                file_licencia.disabled = false; // Habilitar el input
            }
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/portal-usuarios/create.blade.php ENDPATH**/ ?>