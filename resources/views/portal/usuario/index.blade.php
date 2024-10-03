@extends('portal.panel')

@section('content')
    <section class="section-box mt-50">

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        @include('portal.usuario.navbar.index')
                    </div>
                    <div class="col-lg-8">
                        <div class="sidebar-shadow">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>Dashboard</h3>

                                </div>

                                <div class="col-md-5">





                                    @if (session('usuario')->tipo_utilidad_id == 2 && session('usuario')->estado_proceso_id != 3)
                                        <button type="button" class="btn btn-default" data-bs-toggle="modal"
                                            data-bs-target="#modalSolicitaOfrecer">
                                            Solicitar Ofrecer
                                            Servicio
                                        </button>
                                    @elseif(session('usuario')->tipo_utilidad_id == 1 && session('usuario')->estado_proceso_id != 4)
                                        @can('servicios.registrar')
                                            <form id="contratar" action="{{ route('portal-admin.solicitarContratarServicio') }}"
                                                method="post" style="float: left;">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-default">Solicitar Contratar
                                                    Servicios</button>

                                            </form>
                                        @endcan
                                    @else
                                    @endif
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. --}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>
                            <hr>
                            <!-- Button trigger modal -->

                            @if (session('usuario')->tipo_utilidad_id == 2 && session('usuario')->estado_proceso_id != 3)
                                <!-- Modal -->
                                <div class="modal fade" id="modalSolicitaOfrecer" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSolicitaOfrecerLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form id="ofrecer" class="contact-form-style"
                                            action="{{ route('portal-admin.guardar-documentos-ofrecer') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalSolicitaOfrecerLabel">Solicitar Ofrecer
                                                        Servicio</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <p>Al solicitar ofrecer servicios, se requiere que se registre el
                                                        Certificado Único Laboral.</p>


                                                    <div class="row wow animate__animated animate__fadeInUp"
                                                        data-wow-delay=".1s">


                                                        <div class="col-md-12 mt-3">


                                                            <label for="" class="form-label">Subir Certificado Único
                                                                laboral. <span><a style="color: red"
                                                                        href="https://www.gob.pe/47089-obtener-tu-certificado-unico-laboral-cul"
                                                                        target="_blank">Descague su certificador único
                                                                        laboral.</a></span></label>



                                                            <input type="file" class="form-control"
                                                                name="otro_documento">
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">GUARDAR</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            @endif


                            <div class="card-body">

                                <div class="row ">

                                    @can('servicios.registrar')
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold">{{ $datos->total }}</h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Portal</h6>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow background-12 ">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold">{{ $datos->aceptadas }}</h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Aceptadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4  col-sm-12">
                                            <div class="card sidebar-shadow background-urgent"
                                                style="background-color: #ffc107">
                                                <div class="card-body text-center">
                                                    <h4 class="text-center font-bold">{{ $datos->pendientes }}</h4>

                                                    <h6 class="mt-1 texto-dash">N° Publicaciones Pendientes</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @if (session('usuario')->tipo_utilidad_id == 1)
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Hola!</strong> Espere ser validado por el area administrativa .
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @else
                                        @endif
                                    @endcan

                                    @can('servicios.registrar')
                                        <div class="col md-12">
                                            <h5>Últimas Publicaciones Recientes:</h5>
                                            <hr>

                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr class="list-group list-group-numbered ">
                                                            <td class="rounded">

                                                                @foreach ($datos->ultimos as $publicacion)
                                                                    <div class="list-group-item">
                                                                        <div class="fw-bold">
                                                                            {{-- {{ $publicacion->servicio->nombres }} - {{$publicacion->descripcion}} --}}
                                                                            {{ $publicacion->nombres }}
                                                                        </div>
                                                                        Fecha Registrada:
                                                                        {{-- {{ $publicacion->fecha_registrada }} --}}
                                                                        {{ \Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d/m/Y H:i:s') }}

                                                                        <span
                                                                            class="badge {{ $publicacion->estado_proceso_id == 2 ? 'bg-success' : 'bg-warning' }}">{{ $publicacion->estado_proceso_id == 2 ? 'Aceptado' : 'Pendiente' }}</span>

                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endcan



                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection

@section('css')
    <style>
        /* .texto-dash {
                                                                                                                                                font-size: 12px;
                                                                                                                                                font-weight: bolder;
                                                                                                                                            } */


        .texto-dash {
            font-size: 11px !important;
            word-wrap: break-word;
            /* Romper palabras cuando sea necesario */

        }

        @media (max-width: 768px) {
            .texto-dash {
                font-size: 10px !important;
                /* Ajustar el tamaño del texto para dispositivos más pequeños */
            }
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>


    @if (session('contratar'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Se envio su solicitud, para Contratar Servicios",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif


    @if (session('ofrecer'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se envio su solicitud, para Ofrecer Servicios",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif




    <script>
        $('#ofrecer').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Solicitar Ofrecer Servicio?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Solicitar Ofrecer Servicio!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>


    <script>
        $('#contratar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Solicitar Contratar Servicios?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Solicitar Contratar Servicio!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
