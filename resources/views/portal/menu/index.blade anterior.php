@extends('portal.panel')


@section('content')
    <section class="section-box">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="block-banner">
                            <span
                                class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">El
                                mejor lugar para publicar tus servicios
                            </span>
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">La Forma Más Fácil De Ofrecer
                                Tus Servicios</h1>
                            {{-- <div class="banner-description mt-30 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">Cada mes, más de 3 millones de personas que buscan empleo recurren al
                                sitio web en su búsqueda de trabajo, presentando más de 140.000 solicitudes cada día.</div> --}}
                            <div class="form-find mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <form action="/servicio{{ request('search') || request('servicio') ? '?' . http_build_query(request()->except('page')) : '' }}">
                                    <input type="text" name="search" class="form-input input-keysearch mr-10"
                                        placeholder="Puertas, Soldad... " />
                                    

                                    <select name="servicio" id="servicio" class="form-input mr-10 select-active"
                                        style="width: 100%">
                                        <option value="">SELECCIONE UN SERVICIO</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">
                                                {{ $servicio->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default btn-find">Buscar
                                    </button>
                                </form>
                            </div>
                            <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp mt-3"
                                data-wow-delay=".3s">
                                <strong style="font-size: 80px" >RUWANI</strong>
                                <div class="row">

                                    <div class="col-md-5">
                                        <h6 class="text-center"> " El trabajo en tus manos "</h6>
                                    </div>
                                </div>
                                {{-- <a href="#">Designer</a>, <a href="#">Developer</a>, <a href="#">Web</a>,
                                <a href="#">Engineer</a>, <a href="#">Senior</a>, --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-imgs">
                            <img alt="jobhub" src="portal/assets/imgs/banner/banner.png" class="img-responsive shape-1" />
                            <span class="union-icon"><img alt="jobhub" src="portal/assets/imgs/banner/union.svg"
                                    class="img-responsive shape-3" /></span>
                            <span class="congratulation-icon"><img alt="jobhub"
                                    src="portal/assets/imgs/banner/congratulation.svg"
                                    class="img-responsive shape-2" /></span>
                            <span class="docs-icon"><img alt="jobhub" src="portal/assets/imgs/banner/docs.svg"
                                    class="img-responsive shape-2" /></span>
                            <span class="course-icon"><img alt="jobhub" src="portal/assets/imgs/banner/course.svg"
                                    class="img-responsive shape-3" /></span>
                            <span class="web-dev-icon"><img alt="jobhub" src="portal/assets/imgs/banner/web-dev.svg"
                                    class="img-responsive shape-3" /></span>
                            <span class="tick-icon"><img alt="jobhub" src="portal/assets/imgs/banner/tick.svg"
                                    class="img-responsive shape-3" /></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-box wow animate__animated animate__fadeIn mt-70">
        <div class="container">
            <div class="box-swiper">


                {{-- <h4 class="text-center">MUNICIPALIDAD DE SAN JUAN DE LURIGANCHO ES MOMENTO DE CRECER</h4> --}}
                {{-- <div class="swiper-container swiper-group-6">
                    <div class="swiper-wrapper pb-70 pt-5">
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/google.svg" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/airbnb.svg" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/dropbox.svg" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/fedex.svg" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/wallmart.svg" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub"
                                        src="portal/assets/imgs/slider/logo/hubspot.svg" /></a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
            </div>
        </div>
    </div>
    <hr>
    <section class="section-box">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Buscar por categoría
                    </h2>
                    <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Encuentra el tipo de
                        servicio que necesitas. El servicio comienza tan pronto como usted se comunica.</p>
                </div>
                <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <a href="/servicio" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Explorar Más</a>
                </div>
            </div>
            <div class="row mt-70">

                @foreach ($tipo_servicios as $tipo_servicio)
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <a href="/servicio?categoria={{$tipo_servicio->slug}}">
                                    <figure><img alt="jobhub" src="{{ Storage::url($tipo_servicio->icono_url) }}" />
                                    </figure>
                                </a>
                            </div>
                            <h5 class="text-center mt-10 card-heading"><a href="/servicio?categoria={{$tipo_servicio->slug}}">{{ Str::upper($tipo_servicio->nombres) }}</a>
                            </h5>
                            {{-- <p class="text-center text-stroke-40 mt-20">{{ $tipo_servicio->id }} Available Vacancy</p> --}}
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="text-center mt-15">
                            <h3>18,265+</h3>
                        </div>
                        <p class="text-center mt-30 text-stroke-40">Los servicios te están esperando Explora más
                        </p>
                        <div class="text-center mt-30">
                            <div class="box-button-shadow"><a href="/servicio" class="btn btn-default">Explore
                                    más</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-box mt-50 bg-patern">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 col-md-7">
                    <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                        Servicios Recientes</h2>
                    <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp hover-up"
                        data-wow-delay=".1s">Últimos Servicios Publicados.
                    </p>
                </div>
                <div class="col-lg-5 col-md-5 text-lg-end text-start">
                    <a href="/servicio"
                        class="btn btn-border icon-chevron-right wow animate__animated animate__fadeInUp hover-up mt-15"
                        data-wow-delay=".1s">Ver más</a>
                </div>
            </div>
            <div class="row mt-70">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-3">
                        <div class="swiper-wrapper pb-70 pt-5">


                            @foreach ($publicaciones_recientes as $publicaciones_reciente)
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-6 col-6 text-start text-success font-bold">
                                                    <span>{{ $publicaciones_reciente->personas->nombres }}
                                                        {{ $publicaciones_reciente->personas->apellido_paterno }}</span>
                                                </div>
                                                <div class="col-lg-6 col-6 text-end">
                                                    <span>{{ \Carbon\Carbon::parse($publicaciones_reciente->fecha_registrada)->format('d-m-Y') }}</span>
                                                </div>
                                            </div>
                                            <h5 class="mt-15 heading-md font-semibold"><a
                                                    href="{{ route('servicio-portal.show', $publicaciones_reciente) }}">{{ $publicaciones_reciente->nombres }}</a>
                                            </h5>
                                            <div class="card-2-bottom mt-50">
                                                <div class="row">
                                                    <div class="col-lg-9 col-8">
                                                        <a href="{{ route('servicio-portal.show', $publicaciones_reciente) }}"
                                                            class="btn btn-default btn-shadow hover-up">Ver Servicio</a>
                                                    </div>
                                                    <div class="col-lg-3 text-end col-4">
                                                        <a href="#" class="mt-10 display-block mr-20"><img
                                                                alt="publicaciones_recientehub"
                                                                src="portal/assets/imgs/theme/icons/bookmark.svg" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination swiper-pagination3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-60">
        <div class="container">
            <div class="box-newsletter">
                <h5 class="text-md-newsletter">Registrate Ahora</h5>
                <h6 class="text-lg-newsletter">Para Publicar Tus Servicios.</h6>
                <div class="box-form-newsletter mt-30">
                    <form class="form-newsletter" action="{{ route('registrate.index') }}" method="GET">

                        <input type="email" name="email" class="input-newsletter" value=""
                            placeholder="portal.servicios.sjl@gmail.com" required />
                        <button class="btn btn-default font-heading icon-send-letter" type="submit">Registrarse</button>
                    </form>
                </div>
            </div>
            <div class="box-newsletter-bottom">
                <div class="newsletter-bottom"></div>
            </div>
        </div>
    </section>
@endsection
