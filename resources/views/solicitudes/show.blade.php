@extends('layouts.panel')


@section('content')
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-7 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ $solicitud->nombres }} <span
                                class="badge {{ $solicitud->estado_proceso_id == 1 ? 'badge-light-warning' : 'badge-light-primary' }}  ms-50">{{ $solicitud->estadosProceso->nombres }}</span>
                        </h4>
                    </div>
                    <div class="card-body my-2 py-25">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2 pb-50">
                                    <p class="card-text">{{ $solicitud->descripcion }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-warning mb-2" role="alert">
                                    <h6 class="alert-heading">Servicio Ofrece</h6>
                                    <div class="alert-body fw-normal">{{ $solicitud->servicio->nombres }}</div>
                                </div>
                                <div class="plan-statistics pt-1">
                                    <div class="">
                                        <h5 class="fw-bolder">Fecha Registrada:
                                        </h5>
                                        <p>{{ $solicitud->fecha_registrada ? \Carbon\Carbon::parse($solicitud->fecha_registrada)->format('d-m-Y') : 'SIN FECHA' }}
                                        </p>
                                        <h5 class="fw-bolder">Fecha Publición: </h5>
                                        <p>{{ $solicitud->fecha_publicacion ? \Carbon\Carbon::parse($solicitud->fecha_publicacion)->format('d-m-Y') : 'DAR PERMISO PUBLICAR' }}
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /User Card -->

            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-5 col-lg-7 col-md-7 order-0 order-md-1">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home-justified"
                                    aria-labelledby="home-tab-justified" aria-expanded="true">
                                    <div class="card">
                                        <h3 class="card-header text-center"> Validar Publicación del Servicio</h3>
                                        <div class="col-12 text-center">

                                            <form action="{{ route('solicitud.validarProcesoPublicacion', $solicitud) }}"
                                                method="POST" class="permiso">
                                                @csrf
                                                @method('PUT')


                                                <button
                                                    class="btn btn-success me-1 mt-1 waves-effect waves-float waves-light {{ $solicitud->estado_proceso_id == 2 ? 'disabled' : '' }}"
                                                    type="submit">
                                                    Publicar Servicio
                                                </button>
                                            </form>
                                        </div>

                                        <div class="col-12 text-center">

                                            <form action="{{ route('solicitud.rechazarProcesoPublicacion', $solicitud) }}"
                                                method="POST" class="pendiente">
                                                @csrf
                                                @method('PUT')


                                                <button class="btn btn-outline-danger cancel-subscription mt-1 waves-effect"
                                                    {{ $solicitud->estado_proceso_id == 1 ? 'disabled' : '' }}>Cancelar
                                                    Publicacion</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Project table -->

                <!-- Invoice table -->

                <!-- /Invoice table -->
            </div>
            <!--/ User Content -->

        </div>

        <div class="modal fade" id="preview-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vista Previo Del Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.permiso').submit(function(e) {
        e.preventDefault()

        Swal.fire({
            title: 'Estas seguro de Publicar el servicio?',
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
            title: 'Estas seguro de Cancelar Publicación?',
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


@endsection
