@extends('layouts.panel')



@section('content')
    <section class="app-user-view-account">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fw-bolder section-title text-center mb-15 wow animate__ animate__fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">EDITAR INFORMACIÓN PERSONA</h2>
                        @if ($errors->any())
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                <ul class="error-list">
                                    @foreach ($errors->all() as $error)
                                        <li class="">{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close mb-2" data-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form class="contact-form-style" id="contact-form"
                            action="{{ route('usuario-registrado.update', $persona->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">

                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento"
                                            style="font-weight: bold">*
                                            Tipo de Documento:</label>
                                        <select name="tipo_documento_id" id="tipo_documento_id"
                                            onchange="capturarValorSeleccionado()" class="form-control" required>
                                            <option value="" selected disabled>Seleccione tipo de documento</option>
                                            @foreach ($tipo_documentos as $tipo_documento)
                                                <option value="{{ $tipo_documento->id }}"
                                                    @if ($persona->tipo_documento_id == $tipo_documento->id) selected @endif>
                                                    {{ $tipo_documento->nombres }}
                                                </option>
                                            @endforeach
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
                                            value="{{ $persona->numero_documento }}" required
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
                                            value="{{ $persona->numero_celular }}" required
                                            onkeypress="return solonumeros(event)" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="ruc"
                                            style="font-weight: bold">*
                                            RUC:</label>
                                        <input class="form-control" id="ruc" type="text" name="ruc"
                                            placeholder="Ingrese su RUC" value="{{ $persona->ruc }}"
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
                                            value="{{ $persona->nombres }}" required
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
                                            value="{{ $persona->apellido_paterno }}" required
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
                                            value="{{ $persona->apellido_materno }}" required
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
                                            value="{{ $persona->direccion_fiscal }}" required />

                                    </div>
                                </div>




                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="login-password"
                                            style="font-weight: bold">*Correo:</label>
                                        <input name="email" id="email" class="form-control"
                                            placeholder="Ingrese Su Correo" type="email" value="{{ $persona->email }}"
                                            required />
                                    </div>


                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="fecha_nacimiento"
                                            style="font-weight: bold">*
                                            Fecha de Nacimiento:</label>
                                        <input name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                                            placeholder="Fecha Nacimiento" type="date"
                                            value="{{ $persona_extra->fecha_nacimiento ?? '' }}" required />

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
                                            value="{{ old('sexo') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($sexos as $sexo)
                                                <option value="{{ $sexo }}"
                                                    @if ($persona_extra->sexo == $sexo) selected @endif>
                                                    {{ $sexo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="distrito"
                                            style="font-weight: bold">*
                                            Distrito:</label>
                                        <select name="distrito" id="distrito" class="form-control"
                                            value="{{ old('distrito') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($distritos as $distrito)
                                                <option value="{{ $distrito }}"
                                                    @if ($persona_extra->distrito == $distrito) selected @endif>
                                                    {{ $distrito }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="comuna"
                                            style="font-weight: bold">*
                                            Comuna:</label>
                                        <select name="comuna" id="comuna" class="form-control"
                                            value="{{ old('comuna') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($comunas as $comuna)
                                                <option value="{{ $comuna }}"
                                                    @if ($persona_extra->comuna == $comuna) selected @endif>
                                                    {{ $comuna }}
                                                </option>
                                            @endforeach
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
                                            type="text" value="{{ $persona_extra->coordenadas_geograficas ?? '' }}"
                                            required />

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_nucleo"
                                            style="font-weight: bold">*
                                            Tipo Nucleos:</label>
                                        <select name="tipo_nucleo" id="tipo_nucleo" class="form-control"
                                            value="{{ old('tipo_nucleo') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($tipo_nucleos as $tipo_nucleo)
                                                <option value="{{ $tipo_nucleo }}"
                                                    @if ($persona_extra->tipo_nucleo == $tipo_nucleo) selected @endif>
                                                    {{ $tipo_nucleo }}
                                                </option>
                                            @endforeach
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
                                            type="text" value="{{ $persona_extra->nombre_asentamiento_humano ?? '' }}"
                                            required />

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_via"
                                            style="font-weight: bold">*
                                            Tipo Via:</label>
                                        <select name="tipo_via" id="tipo_via" class="form-control"
                                            value="{{ old('tipo_via') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($tipo_vias as $tipo_via)
                                                <option value="{{ $tipo_via }}"
                                                    @if ($persona_extra->tipo_via == $tipo_via) selected @endif>
                                                    {{ $tipo_via }}
                                                </option>
                                            @endforeach
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
                                            value="{{ $persona_extra->nombre_via ?? '' }}" required />

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-6">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="numeracion"
                                            style="font-weight: bold">*
                                            Numeración / Mz. Lt. / Km.:</label>
                                        <input name="numeracion" id="numeracion" class="form-control"
                                            placeholder="Numeración / Mz. Lt. / Km." type="text"
                                            value="{{ $persona_extra->numeracion ?? '' }}" required />

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_organizacion"
                                            style="font-weight: bold">*
                                            Tipo Organización:</label>
                                        <select name="tipo_organizacion" id="tipo_organizacion" class="form-control"
                                            value="{{ old('tipo_organizacion') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($tipo_organizaciones as $tipo_organizacion)
                                                <option value="{{ $tipo_organizacion }}"
                                                    @if ($persona_extra->tipo_organizacion == $tipo_organizacion) selected @endif>
                                                    {{ $tipo_organizacion }}
                                                </option>
                                            @endforeach
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
                                            value="{{ old('es_discapacidad') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI" @if ('SI' == $persona_extra->es_discapacidad) selected @endif>SI
                                            </option>
                                            <option value="NO" @if ('NO' == $persona_extra->es_discapacidad) selected @endif>NO
                                            </option>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="grado_estudios"
                                            style="font-weight: bold">*
                                            Grado Estudios:</label>
                                        <select name="grado_estudios" id="grado_estudios" class="form-control"
                                            value="{{ old('grado_estudios') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($grados as $grado_estudio)
                                                <option value="{{ $grado_estudio }}"
                                                    @if ($persona_extra->grado_estudios == $grado_estudio) selected @endif>
                                                    {{ $grado_estudio }}
                                                </option>
                                            @endforeach
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
                                            value="{{ $persona_extra->centro_estudios ?? '' }}" required />

                                    </div>
                                </div>

                            </div>

                            <div class="row">



                                <div class="col-lg-6 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_comprobante"
                                            style="font-weight: bold">*
                                            TIPO COMPROBANTE:</label>
                                        <select name="tipo_comprobante" id="tipo_comprobante" class="form-control"
                                            value="{{ old('tipo_comprobante') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($tipo_comprobantes as $tipo_comprobante)
                                                <option
                                                    value="{{ $tipo_comprobante }}"@if ($persona_extra->tipo_comprobante == $tipo_comprobante) selected @endif>
                                                    {{ $tipo_comprobante }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="tipo_emision"
                                            style="font-weight: bold">*
                                            TIPO EMISION:</label>
                                        <select name="tipo_emision" id="tipo_emision" class="form-control"
                                            value="{{ old('tipo_emision') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($tipo_emisiones as $tipo_emision)
                                                <option
                                                    value="{{ $tipo_emision }}"@if ($persona_extra->tipo_emision == $tipo_emision) selected @endif>
                                                    {{ $tipo_emision }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_local_fisico"
                                            style="font-weight: bold">*
                                            Tiene local fisico ?</label>
                                        <select name="es_local_fisico" id="es_local_fisico" class="form-control"
                                            value="{{ old('es_local_fisico') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>

                                            <option value="SI" @if ('SI' == $persona_extra->es_local_fisico) selected @endif>SI
                                            </option>
                                            <option value="NO" @if ('NO' == $persona_extra->es_local_fisico) selected @endif>NO
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 mt-1">
                                    <div class="input-style mb-20">
                                        <label class="form-label text-lg font-weight-bold mr-3" for="es_licencia"
                                            style="font-weight: bold">*
                                            TIENE LICENCIA DE FUNCIONAMIENTO ?</label>
                                        <select name="es_licencia" id="es_licencia" class="form-control"
                                            value="{{ old('es_licencia') }}" required>
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI" @if ('SI' == $persona_extra->es_licencia) selected @endif>SI
                                            </option>
                                            <option value="NO" @if ('NO' == $persona_extra->es_licencia) selected @endif>NO
                                            </option>

                                        </select>
                                    </div>
                                </div>





                            </div>

                            <button class="btn btn-success btn-lg mt-3" type="submit"> Actualizar</button>



                        </form>
                    </div>
                </div>
            </div>



        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/numeros.js') }}"></script>
    <script src="{{ asset('assets/js/letras.js') }}"></script>


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
                        url: '{{ route('getServicios') }}?area_id=' + AreaId,
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
                        '<option value="" selected　@if (old('select2') == '1') selected @endif>Seleccione un servicio.....</option>'
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
@endsection
