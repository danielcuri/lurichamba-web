<div class="mobile-header-wrapper-inner">
    <div class="mobile-header-top">
        <div class="user-account">


            @if (session('usuario'))

                @if (session('usuario'))
                    <img src="{{session('usuario')->profile_photo_path ? Storage::url(session('usuario')->profile_photo_path) : '/portal/assets/imgs/avatar/ava_1.png' }}" alt="jobhub" />
                @else
                    <img src="{{ asset('/portal/assets/imgs/avatar/ava_1.png') }}" alt="jobhub" />
                @endif

                <div class="content">
                    <h6 class="user-name">

                        @if (session('usuario'))
                            {{ session('usuario')->nombres }}
                        @else
                            No estás autenticado.
                        @endif

                        <span class="text-brand">, SJL</span>
                    </h6>
                    <p class="font-xs text-muted">
                        @if (session('usuario'))
                            {{ session('usuario')->email }}
                        @else
                            No estás autenticado.
                        @endif
                    </p>
                </div>
            @else
                No estás autenticado.
            @endif


        </div>
        <div class="burger-icon burger-icon-white">
            <span class="burger-icon-top"></span>
            <span class="burger-icon-mid"></span>
            <span class="burger-icon-bottom"></span>
        </div>
    </div>
    <div class="mobile-header-content-area">
        <div class="perfect-scroll">

            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="">
                            <a class="active" href="/">Inicio</a>

                        </li>
                        <li class="">
                            <a href="{{ route('servicio-portal.index') }}">Servicios</a>

                        </li>
                        <li class="has-children">
                            <a href="#">Municipalidad</a>
                            <ul class="sub-menu">
                                <li><a href="https://web.munisjl.gob.pe/web/convocatorias.php?anio=6"
                                        target="_blank">Convocatorias</a></li>
                                <li><a href="https://web.munisjl.gob.pe/web/mas_noticias.php"
                                        target="_blank">Noticias</a></li>
                                <li><a href="https://web.munisjl.gob.pe/web/contacto" target="_blank">Sedes</a></li>
                                {{-- <li class="hr"><span></span></li>
                                <li><a href="employers-single.html">Employers Single 01</a></li>
                                <li><a href="employers-single-2.html">Employers Single 02</a></li> --}}
                            </ul>
                        </li>
                        {{-- <li class="">
                            <a href="#">Preguntas Frecuentes</a>

                        </li> --}}

                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            @if (session('usuario'))
                <div class="mobile-account">
                    <h6 class="mb-10">Tu Cuenta</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a {{ Request::is('portal-admin') ? 'active' : '' }} aria-current="page"
                                href="{{ route('usuario-portal.index') }}">Dashboard</a></li>
                        <li><a {{ Request::is('portal-admin/perfil') ? 'active' : '' }}
                                href="{{ route('portal-admin.perfil') }}">Perfil</a></li>                    
                        <li>
                            <form action="{{ route('portal.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-default mr-10">Cerrar Sesión</button>

                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="mobile-account">
                    <h6 class="mb-10">Iniciar</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a {{ Request::is('portal-admin') ? 'active' : '' }} aria-current="page"
                                href="{{ route('portal.login') }}">Iniciar Sesión</a></li>
                        <li><a {{ Request::is('portal-admin/perfil') ? 'active' : '' }}
                                href="{{ route('registrate.index') }}">Registrate</a></li>


                        </li>
                    </ul>
                </div>
            @endif

            
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-25">Síguenos en</h6>
                <a href="https://www.facebook.com/MunicipalidadSJL/" target="_blank"><img src="{{ asset('portal/assets/imgs/theme/icons/icon-facebook.svg') }}" alt="jobhub" /></a>
                <a href="https://twitter.com/municipiosjl" target="_blank"><img src="{{ asset('portal/assets/imgs/theme/icons/icon-twitter.svg') }}" alt="jobhub" /></a>
                <a href="https://www.instagram.com/munisanjuandelurigancho/?hl=es-la" target="_blank"><img src="{{ asset('portal/assets/imgs/theme/icons/icon-instagram.svg') }}" alt="jobhub" /></a>
                <a href="https://www.youtube.com/channel/UC5EE8thKejZt08v_t1VVwJQ/featured?view_as=subscriber" target="_blank"><img src="{{ asset('portal/assets/imgs/theme/icons/icon-youtube.svg') }}" alt="jobhub" /></a>
            </div>
            <div class="site-copyright" id="copyright-mobile"></div>
            
            <script>
                // Obtiene el año actual
                var year = new Date().getFullYear();
                // Coloca el año actual en el elemento con id "copyright"
                document.getElementById("copyright-mobile").innerHTML = "Copyright " + year + " © MUNISJL. <br />Reservados todos los derechos";
            </script>
            




        </div>




    </div>
</div>
