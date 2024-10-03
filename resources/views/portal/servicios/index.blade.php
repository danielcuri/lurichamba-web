@extends('portal.panel')

@section('content')
    <section class="section-box-2">
        <div class="box-head-single none-bg">
            <div class="container">
                <h4>Hay {{ $cantidad_publicaciones }} servicios
                    <br />¡Aquí para ti!
                </h4>
                <div class="row mt-15 mb-40">
                    <div class="col-lg-7 col-md-9">
                        <span class="text-mutted">Descubra todos los servicios que puede contactar
                        </span>
                    </div>
                    <div class="col-lg-5 col-md-3 text-lg-end text-start">
                        <ul class="breadcrumbs mt-sm-15">
                            <li><a href="{{ route('principal.index') }}">Inicio</a></li>
                            <li class="text-mutted"><a style="color: darkgray" class="text-mutted"
                                    href="{{ route('servicio-portal.index') }}">Servicios</a></li>
                        </ul>
                    </div>
                </div>
                <form action="">

                    <div class="box-shadow-bdrd-15 box-filters">

                        <div class="row">

                            <div class="col-md-11">
                                <div class="">
                                    {{-- <form class="form-search-job"> --}}
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="input-search-job" placeholder="Construccion" />
                                    {{-- </form> --}}
                                </div>

                            </div>
                            <div class="col-md-1">
                                <div class="job-fillter">

                                    <div class="box-button-find">
                                        <button type="submit" class="btn btn-default float-right">Buscar</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>
    <section class="section-box mt-80">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job mt-15 mb-10">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span class="text-small">Mostrando <strong> {{ $publicaciones->firstItem() }} </strong>
                                        a <strong>{{ $publicaciones->lastItem() }}
                                        </strong>de {{ $publicaciones->total() }}</span> servicios.

                                </div>
                                <div class="col-lg-5 text-lg-end mt-sm-15">
                                    <div class="display-flex2">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-list mb-15">
                            <div class="list-recent-jobs">

                                @foreach ($publicaciones as $publicacion)
                                    <div class="card-job hover-up wow animate__animated animate__fadeIn">
                                        <div class="card-job-top">
                                            <div class="card-job-top--image" style="background:#F1A405">
                                                <figure><img alt="jobhub"
                                                        src="{{ $publicacion->servicio->tipoServicio->icono_url ? Storage::url($publicacion->servicio->tipoServicio->icono_url) : '/recursos-sjl/imagenes/ICONO-USUARIO_100X100.png' }}" />
                                                </figure>
                                            </div>
                                            <div class="card-job-top--info">
                                                <h6 class="card-job-top--info-heading"><a
                                                        href="{{ route('servicio-portal.show', $publicacion) }}">{{ $publicacion->nombres }}</a>
                                                </h6>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <a href=""><span
                                                                class="card-job-top--company">{{ $publicacion->personas->nombres ?? '' }}
                                                                {{ $publicacion->personas->apellido_paterno ?? '' }}</span></a>

                                                        <span class="card-job-top--type-job text-sm"><i
                                                                class="fi-rr-briefcase"></i> </span>
                                                        <span class="card-job-top--post-time text-sm"><i
                                                                class="fi-rr-clock"></i>
                                                            {{ $publicacion->fecha_publicacion ? \Carbon\Carbon::parse($publicacion->fecha_publicacion)->format('d-m-Y') : $publicacion->fecha_publicacion }}
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-5 text-lg-end">
                                                        <span
                                                            class="card-job-top--price">{{ $publicacion->servicio->nombres }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-job-description mt-20">
                                            {{ $publicacion->descripcion }}
                                        </div>
                                        <div class="card-job-bottom mt-25">
                                            <div class="row">
                                                <div class="col-lg-9 col-sm-8 col-12">
                                                    <a href="{{ route('servicio-portal.show', $publicacion->id) }}"
                                                        class="btn btn-small background-12 btn-pink mr-5">{{ $publicacion->servicio->nombres }}</a>

                                                    <a href="{{ route('servicio-portal.show', $publicacion->id) }}"
                                                        class="btn btn-small background-blue-light mr-5">{{ $publicacion->tipoServicio->nombres }}</a>

                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none">
                                                    <span><img src="portal/assets/imgs/theme/icons/shield-check.svg"
                                                            alt="jobhub"></span>
                                                    <span class="ml-5"><img
                                                            src="portal/assets/imgs/theme/icons/bookmark.svg"
                                                            alt="jobhub"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach






                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="paginations">
                                <ul class="pager">
                                    <li class="page-item {{ $publicaciones->previousPageUrl() ? '' : 'disabled' }}">
                                        <a href="{{ $publicaciones->previousPageUrl() }}" class="pager-prev"></a>
                                    </li>

                                    @if ($publicaciones->currentPage() > 3)
                                        <li class="page-item">
                                            <a href="{{ $publicaciones->url(1) }}" class="pager-number">1</a>
                                        </li>
                                        @if ($publicaciones->currentPage() > 4)
                                            <li class="page-number disabled">
                                                <span class="pager-number">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    @foreach ($publicaciones->getUrlRange(max($publicaciones->currentPage() - 2, 1), min($publicaciones->currentPage() + 2, $publicaciones->lastPage())) as $page => $url)
                                        <li
                                            class="page-number {{ $page == $publicaciones->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}"
                                                class="pager-number {{ $page == $publicaciones->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($publicaciones->currentPage() < $publicaciones->lastPage() - 2)
                                        @if ($publicaciones->currentPage() < $publicaciones->lastPage() - 3)
                                            <li class="page-number disabled">
                                                <span class="pager-number">...</span>
                                            </li>
                                        @endif
                                        <li class="page-number">
                                            <a href="{{ $publicaciones->url($publicaciones->lastPage()) }}"
                                                class="pager-number">{{ $publicaciones->lastPage() }}</a>
                                        </li>
                                    @endif

                                    <li class="page-next {{ $publicaciones->nextPageUrl() ? '' : 'disabled' }}">
                                        <a href="{{ $publicaciones->nextPageUrl() }}" class="pager-next"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">


                    <form action="">




                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-15">Nombre Servicio</h5>
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control form-icons"
                                            placeholder="Nombre Servicio" />
                                        <i class="fi-rr-search"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-15">Servicio</h5>
                                    <div class="form-group select-style select-style-icon">

                                        <select name="servicio" id="servicio"
                                            class="form-control form-icons select-active"  style="width: 100%">
                                            <option value="">SELECCIONE UN SERVICIO</option>
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}" {{ request('servicio') == $servicio->id ? 'selected' : '' }}>
                                                    {{ $servicio->nombres }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fi-rr-briefcase"></i>
                                    </div>
                                </div>

                                <div class="buttons-filter">
                                    <button class="btn btn-default" type="submit">Aplicar Filtro</button>
                                    <a class="btn" href="{{ route('servicio-portal.index') }}">Resetear
                                        Filtro</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="sidebar-with-bg background-primary bg-sidebar pb-80">
                        <h5 class="medium-heading text-white mb-20 mt-20">Anunciar un servicio?</h5>
                        <p class="text-body-999 text-white mb-30">Anuncie sus servicios a millones de usuarios mensuales.
                            Anunciar un Servicio</p>
                        <a href="{{ route('registrate.index') }}"
                            class="btn btn-border icon-chevron-right btn-white-sm">Registrate</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('sweetalert2.all.min.js') }}}}"></script>

    @if (session('desactivar'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Deshabilito Satisfactoriamente!!'
            })
        </script>
    @endif

    @if (session('activar'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Habilito Satisfactoriamente!!'
            })
        </script>
    @endif
    <script>
        $('.activar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Habilitar?',
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
        $('.desactivar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Deshabilitar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deshabilitar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
