@extends('portal.panel')

@section('content')
    <div class="breacrumb-cover">
        <div class="container">
            <ul class="breadcrumbs mt-4">
                <li><a href="{{ route('servicio-portal.index') }}">Inicio</a></li>
                <li>Detalle Servicio</li>
            </ul>
        </div>
    </div>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="employers-header-2">
                        <div class="heading-image-rd online" style="background: #F1A405;border-radius:6.5rem">
                            <a href="#">
                                {{-- <figure><img alt="jobhub"
                                        src="{{ asset('portal/assets/imgs/page/employers/employer-12.png') }}"></figure> --}}


                                <figure><img alt="jobhub"
                                        src="{{ $publicacion->servicio->tipoServicio->icono_url ? Storage::url($publicacion->servicio->tipoServicio->icono_url) : '/recursos-sjl/imagenes/ICONO-USUARIO_100X100.png' }}">
                                </figure>
                            </a>
                        </div>
                        <div class="heading-main-info">
                            <h4>{{ $publicacion->nombres }}</h4>
                            <div class="head-info-profile">
                                {{-- <span class="text-small mr-20"><i class="fi-rr-marker text-mutted"></i> Chicago, US</span> --}}
                                <span class="text-small mr-20"><i class="fi-rr-briefcase text-mutted"></i>
                                    {{ $publicacion->servicio->nombres }} /
                                    {{ $publicacion->tipoServicio->nombres }}</span>
                                <span class="text-small"><i class="fi-rr-clock text-mutted"></i>
                                    {{ \Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d-m-Y') }}</span>

                                <div class="rate-reviews-small">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $promedioValoraciones)
                                            <span><img src="{{ asset('portal/assets/imgs/theme/icons/star.svg') }}"
                                                    alt="jobhub" /></span>
                                        @else
                                            <span><img src="{{ asset('portal/assets/imgs/theme/icons/star-grey.svg') }}"
                                                    alt="jobhub" /></span>
                                        @endif
                                    @endfor
                                    <span class="ml-10 text-muted text-small">({{ $promedioValoraciones ?? 0 }}.00)</span>
                                </div>





                            </div>

                            <div class="d-flex justify-content-end">

                                <a href="tel:+51{{ $publicacion->personas->numero_celular }}"
                                    class="btn btn-default">Contactame</a>


                                <a href="https://wa.me/{{ $publicacion->personas->numero_celular }}?text=Hola!%20¿Cómo%20estás?%20Estoy%20interesado%20en%20el%20servicio%20{{ $publicacion->nombres }}.%20¿Podrías%20proporcionarme%20más%20información%20al%20respecto,%20por%20favor?"
                                    class="btn" target="_blank"
                                    style="background: #25D366;color:white;font-size:20px;margin-left:6px">
                                    <i class="fa fa-whatsapp my-floata"></i>
                                    <b style="font-size: 18px">WhatsApp</b>
                                </a>

                            </div>

                        </div>
                    </div>

                    <div class="content-single">
                        <h4 class="mb-20">Detalle Servicio</h4>
                        <p>
                            {{ $publicacion->descripcion }}
                        </p>

                        <div class="divider"></div>




                    </div>



                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($calificaciones_pendientes)
                        @foreach ($calificaciones_pendientes as $calificacion_pendiente)
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('portal-admin.clienteComentarios', $calificacion_pendiente) }}"
                                        class="registrar-comentario" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">

                                            <div class="col-md-12 mt-3">
                                                <label for="" class="form-label fw-bold">Ingrese un
                                                    Comentario</label>
                                                <textarea class="form-control" name="comentario" id="" cols="100" rows="300" required></textarea>
                                            </div>
                                            <div class="col-md-12 mt-3">

                                                <div style="float: right;">
                                                    <label for="" class="form-label fw-bold">Calificación:</label>
                                                    <span class="rateYo"
                                                        data-rating="{{ $calificacion_pendiente['rating'] }}">
                                                    </span>
                                                    <input type="hidden" class="rating-input" name="rating"
                                                        value="2">

                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-success mt-2" style="float: right">Publicar
                                                    Comentario</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                    @endif


                    <div class="card mt-2">
                        <div class="card-body">
                            @if ($calificaciones->isEmpty())
                                <h5 class="text-center">No hay comentarios en esta publicacion.</h5>
                            @else
                                <h4>Reseñas de los clientes con el Servicio</h4>
                                <hr>
                                <ul class="list-group list-group-flush">
                                    @foreach ($calificaciones as $calificacion)
                                        <li class="list-group-item">

                                            <p class="fw-bold">{{ Str::upper($calificacion->clientes->nombres) }}
                                                {{ Str::upper($calificacion->clientes->apellido_paterno) }}</p>

                                            <div class="rate-reviews-small">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $calificacion->valor)
                                                        <span><img
                                                                src="{{ asset('portal/assets/imgs/theme/icons/star.svg') }}"
                                                                alt="jobhub" /></span>
                                                    @else
                                                        <span><img
                                                                src="{{ asset('portal/assets/imgs/theme/icons/star-grey.svg') }}"
                                                                alt="jobhub" /></span>
                                                    @endif
                                                @endfor
                                                <span
                                                    class="ml-10 text-muted text-small">({{ $calificacion->valor }}.00)</span>
                                            </div>
                                            <p>{{ $calificacion->comentario }}
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="col-md-6">
                                    <div class="paginations">
                                        <ul class="pager">
                                            <li
                                                class="page-item {{ $calificaciones->previousPageUrl() ? '' : 'disabled' }}">
                                                <a href="{{ $calificaciones->previousPageUrl() }}" class="pager-prev"></a>
                                            </li>

                                            @if ($calificaciones->currentPage() > 3)
                                                <li class="page-item">
                                                    <a href="{{ $calificaciones->url(1) }}" class="pager-number">1</a>
                                                </li>
                                                @if ($calificaciones->currentPage() > 4)
                                                    <li class="page-number disabled">
                                                        <span class="pager-number">...</span>
                                                    </li>
                                                @endif
                                            @endif

                                            @foreach ($calificaciones->getUrlRange(max($calificaciones->currentPage() - 2, 1), min($calificaciones->currentPage() + 2, $calificaciones->lastPage())) as $page => $url)
                                                <li
                                                    class="page-number {{ $page == $calificaciones->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $url }}"
                                                        class="pager-number {{ $page == $calificaciones->currentPage() ? 'btn btn-warning' : '' }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            @if ($calificaciones->currentPage() < $calificaciones->lastPage() - 2)
                                                @if ($calificaciones->currentPage() < $calificaciones->lastPage() - 3)
                                                    <li class="page-number disabled">
                                                        <span class="pager-number">...</span>
                                                    </li>
                                                @endif
                                                <li class="page-number">
                                                    <a href="{{ $calificaciones->url($calificaciones->lastPage()) }}"
                                                        class="pager-number">{{ $calificaciones->lastPage() }}</a>
                                                </li>
                                            @endif

                                            <li class="page-next {{ $calificaciones->nextPageUrl() ? '' : 'disabled' }}">
                                                <a href="{{ $calificaciones->nextPageUrl() }}" class="pager-next"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>



                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-shadow">
                        <h5 class="font-bold">Descripción general</h5>
                        <div class="sidebar-list-job mt-10">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Servicio</span>
                                        <strong class="small-heading">{{ $publicacion->servicio->nombres }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-user"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Creador</span>
                                        <strong class="small-heading">{{ $publicacion->personas->nombres }} <br>
                                            {{ $publicacion->personas->apellido_paterno }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-call-outgoing"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Celular</span>
                                        <strong class="small-heading">+51
                                            ({{ $publicacion->personas->numero_celular }})<br>
                                        </strong>
                                    </div>
                                </li>

                                {{-- <i class="fi fi-rs-call-outgoing"></i> --}}

                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Año</span>
                                        <strong
                                            class="small-heading">{{ \Carbon\Carbon::parse($publicacion->fecha_registrada)->format('Y') }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Publicado</span>
                                        <strong
                                            class="small-heading">{{ \Carbon\Carbon::parse($publicacion->fecha_registrada)->format('d-m-Y') }}</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-list-job mt-10">
                            <a href="tel:+51{{ $publicacion->personas->numero_celular }}"
                                class="btn btn-default mr-10">Contactame</a>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">



                </div>


            </div>
        </div>
    </section>

@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(".rateYo").each(function(index, element) {
                var $rateYo = $(element);
                var $ratingInput = $rateYo.closest('.card').find(
                    '.rating-input'); // Assuming the input has a class 'rating-input'

                $rateYo.rateYo({
                    rating: 2, // Set a default value (you can adjust this)
                    fullStar: true,
                    onSet: function(rating, rateYoInstance) {
                        $ratingInput.val(
                            rating); // Set the selected rating value in the input field
                    }
                });
            });
        });
    </script>
    <script>
        $('.registrar-comentario').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de guardar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Guardar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
