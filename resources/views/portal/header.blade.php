<div class="main-header">
    <div class="header-left">
        <div class="header-logo">
            <a href="/" class="d-flex "><img alt="jobhub"  class="img-logo-responsive"
                
                src="/recursos-sjl/imagenes/lurichamba.png" /></a>
            {{-- <a href="index.html" class="d-flex"><img alt="jobhub" style="width: 190px; height:80px" src="https://web.munisjl.gob.pe/web/images/logo.jpeg" /></a> --}}

            
        </div>
        <div class="header-nav">
           
            <div class="burger-icon burger-icon-white burger-icono-side">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
    </div>
    <div class="header-right">
        @if (session('usuario'))
            
        @else
            <div class="block-signin mr-40 mb-40">
                <a href="{{route('registrate.index')}}" class="btn btn-default hover-up botones-sesiones">Registrate</a>
                <a href="{{ route('portal-login.index') }}" class="btn btn-default btn-shadow ml-10 hover-up botones-sesiones">Iniciar Sesión</a>
            </div>
        @endif
    </div>
</div>