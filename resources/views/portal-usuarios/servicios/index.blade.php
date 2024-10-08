@extends('layouts.panel')



@section('content')
    <section class="app-user-view-account">
        <div class="row">

            <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header border-bottom p-1">
                            <div class="head-label">
                                <h6 class="fw-bolder">SERVICIOS QUE OFRECE</h6>

                            </div>

                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">


                                    <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="modal"
                                        data-bs-target="#addEvent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19">
                                            </line>
                                            <line x1="5" y1="12" x2="19" y2="12">
                                            </line>
                                        </svg>
                                        <span class="align-middle">Registrar Servicio</span>
                                    </button>
                                </div>


                            </div>

                        </div>
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

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <table class="table datatable-project dataTable no-footer dtr-column"
                                    id="DataTables_Table_0" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled control" rowspan="1" colspan="1"
                                                style="width: 42.5781px; display: none;">
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 165.359px;"> NOMBRE SERVIVIO</th>
                                            <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 204.5px;">CATEGORIA
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 188.766px;">DESCRIPCION SERVICIO</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 188.766px;">Estado</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 188.766px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($persona->publicaciones as $publicacion)
                                            <tr class="odd">
                                                <td>{{ $publicacion->nombres }}</td>
                                                <td>{{ $publicacion->servicio->nombres }}</td>
                                                <td>{{ $publicacion->descripcion }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $publicacion->estado_proceso_id == 1 ? 'badge-light-warning' : 'badge-light-primary' }}  ms-50">{{ $publicacion->estadosProceso->nombres }}</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary dt-button create-new"
                                                        data-bs-toggle="modal" data-bs-target="#editEvent"
                                                        data-id="{{ $publicacion->id }}"
                                                        data-nombres="{{ $publicacion->nombres }}"
                                                        data-descripcion="{{ $publicacion->descripcion }}"
                                                        data-servicioid="{{ $publicacion->servicio_id }}"
                                                        data-tiposervicioid="{{ $publicacion->tipo_servicio_id }}">
                                                        <i data-feather='edit'></i>

                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="addEvent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Registrar Servicio</h1>
                            <p></p>
                        </div>


                        <form id="editAddForm" class="row gy-1 pt-75 formguardar"
                            action="{{ route('usuario-registrado.guardarServicioPersona') }}" method="POST">

                            @csrf


                            <input type="hidden" name="persona_id" value="{{ $persona->id }}">

                            <div class="col-md-12">

                                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="input-style mb-20">
                                            <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento"
                                                style="font-weight: bold">*
                                                Tipo de Servicio:</label>
                                            <select name="tipo_servicio_id" id="select1" class="form-control" required>
                                                <option value="0" disabled selected>Seleccione un Tipo de
                                                    Servicio
                                                </option>
                                                @foreach ($tipo_servicios as $tipoServicio)
                                                    <option value="{{ $tipoServicio->id }}">
                                                        {{ $tipoServicio->nombres }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="input-style mb-20">
                                            <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                                style="font-weight: bold">*
                                                Servicio:</label>
                                            <select name="servicio_id" id="select2" class="form-control" required>
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


                                </div>

                            </div>

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1" id="btnguardar">Guardar</button>
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cerrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('portal-usuarios.servicios.modal')


    </section>
@endsection


@section('scripts')
    <script>
        function mostrarVistaPrevia(button) {
            var url = button.dataset.url;
            var iframe = '<iframe src="' + url + '" width="100%" height="500"></iframe>';
            $('#preview-modal .modal-body').html(iframe);
            $('#preview-modal').modal('show');
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.dt-button.create-new').click(function() {


                var id = $(this).data('id');
                var nombres = $(this).data('nombres');
                var descripcion = $(this).data('descripcion');
                var servicioid = $(this).data('servicioid');
                var tiposervicioid = $(this).data('tiposervicioid');


                $('#edit_nombres').val(nombres)
                $('#edit_descripcion').val(descripcion)
                $('#edit_servicioid').val(servicioid)
                $('#edit_tiposervicioid').val(tiposervicioid)

                $('#editEvent').modal('show');
                var actionUrl = "{{ route('usuario-registrado.actualizarPublicacion', ':id') }}";
                actionUrl = actionUrl.replace(':id', id);
                $('#editActividad').attr('action', actionUrl);

            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            $('#edit_tiposervicioid').on('change', function() {
                // Captura el valor seleccionado en 'area_id'
                var AreaId = this.value;

                // Vacía el contenido del elemento con id 'sub_area_id'
                $('#edit_servicioid').html('');

                if (AreaId) {

                    $.ajax({
                        url: '{{ route('getServicios') }}?area_id=' + AreaId,
                        type: 'get',
                        success: function(res) {
                            $.each(res, function(key, value) {
                                $('#edit_servicioid').append('<option value="' + value
                                    .id +
                                    '">' + value.nombres + '</option>');
                            });
                        }
                    });
                } else {
                    // Establece opciones predeterminadas en caso de que no se haya seleccionado una opción en 'area_id'
                    $('#edit_servicioid').html(
                        '<option value="" selected　@if (old('edit_servicioid') == '1') selected @endif>Seleccione un servicio.....</option>'
                    );
                }
            });
        });
    </script>
    <script>
        $('.permiso').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Dar Permiso Al Portal?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Habilitar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

    <script>
        $('.pendiente').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Pasarlo A Pendiente?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Pasarlo A Pendiente!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
    <script>
        $('.validarDocumento').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de validar Documento?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, validar Documento!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

    <script>
        $('.roles').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Asignar los Roles?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, asignar Roles!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
