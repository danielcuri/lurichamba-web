    <div class="sidebar-shadow">
        <h5 class="font-bold text-center">Mi Información</h5>
        <hr>
        <div class="text-center" style="border-radius: 20px 0 20px 0;">

            @if (session('usuario')->profile_photo_path)
                <img src="{{ Storage::url(session('usuario')->profile_photo_path) }}" alt="Image"
                    style="border-radius: 20px 0 20px 0;
            margin-bottom: 10px;
            box-shadow: 0px 5px 20px 3px rgba(230, 233, 249, 0.9); width: 150px "
                    class="rounded-circle shadow-4">
            @else
                <img src="{{ asset('/sinfoto.png') }}" alt="jobhub" />
            @endif


            <div class="avatar-mane">

                @if (session('usuario'))
                    <p>Bienvenido, {{ session('usuario')->nombres }}
                    </p>
                @else
                    <p>No estás autenticado.</p>
                @endif

            </div>
        </div>

        <div class="sidebar-list-job mt-10">

            <ul class="nav nav-pills nav-justified flex-column">


                <li class="nav-item">
                    <a class="nav-link {{ Request::is('portal-admin') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('usuario-portal.index') }}">Dashboard</a>
                </li>

                @can('perfil.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/perfil')|Request::is('portal-admin/perfil-editar')  ? 'active' : '' }}"
                            href="{{ route('portal-admin.perfil') }}">Perfil</a>
                    </li>
                @endcan

                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Bandeja</a>
                </li> --}}

                @can('servicios.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/mis-servicios') || Request::is('portal-admin/publicar-servicios') || Request::is('portal-admin/editar-publicacion/*') ? 'active' : '' }}"
                            href="{{ route('portal-admin.misservicios') }}">Servicios</a>
                    </li>
                @endcan

                @can('documentos.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/mis-documentos') || Request::is('portal-admin/registrar-documentos') ? 'active' : '' }}"
                            href="{{ route('portal-admin.misDocumentos') }}">Mis Documentos</a>
                    </li>
                @endcan


                @can('comentarios-contrata.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/cliente-comentarios') ? 'active' : '' }}"
                            href="{{ route('portal-admin.indexClienteComentarios') }}">Comentarios Pendientes</a>
                    </li>
                @endcan

                @can('clientes.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/lista-clientes') ||Request::is('portal-admin/registrar-clientes') ? 'active' : '' }}"
                            href="{{ route('portal-admin.indexClientes') }}">Clientes</a>
                    </li>
                @endcan

                @can('credenciales.index')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portal-admin/cambiar-credenciales') ? 'active' : '' }}"
                            href="{{ route('portal-admin.cambiarCredenciales') }}">Actualizar Credenciales y Foto de Perfil</a>
                    </li>
                @endcan


            </ul>
        </div>

        <div class="sidebar-list-job mt-10 text-center">

            <form action="{{ route('portal.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-default mr-10">Cerrar Sesión</button>

            </form>

        </div>


    </div>
