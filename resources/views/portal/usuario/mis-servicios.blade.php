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
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Mis Servicios</h4>

                                @can('servicios.registrar')
                                    <a href="{{ route('portal-admin.publicarServicios') }}" class="btn btn-success">REGISTRAR</a>
                                @endcan

                            </div>
                            <hr>

                            <div class="card-body">
                                @can('servicios.registrar')
                                @else
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hola!</strong> Espere ser validado por el area administrativa .
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endcan

                                <div class="job-list-list mb-15">
                                    <div class="list-recent-jobs">



                                        @if ($publicaciones->count() >=1)
                                            @foreach ($publicaciones as $publicacion)
                                                <div class="card-job hover-up wow animate__ animate__fadeIn animated"
                                                    style="visibility: visible; animation-name: fadeIn;">
                                                    <div class="card-job-top">


                                                        <div style="display: flex">
                                                            <h6 class="card-job-top--info-heading"><a
                                                                    href="#">{{ $publicacion->tipoServicio->nombres }}</a>
                                                            </h6>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-7">

                                                                <span class="card-job-top--location text-sm"><i
                                                                        class="fi-rr-marker"></i> San juan de lurigancho
                                                                </span>
                                                                &nbsp;&nbsp;

                                                                &nbsp;&nbsp;
                                                                <span class="card-job-top--post-time text-sm"><i
                                                                        class="fi-rr-clock"></i>
                                                                    {{ $publicacion->created_at }}</span>
                                                            </div>
                                                            <div class="col-lg-5 text-lg-end">
                                                                @if ($publicacion->estado_proceso_id == 2)
                                                                    <span class="badge bg-success">APROBADO</span>
                                                                @else
                                                                    <span class="badge bg-danger">PENDIENTE</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-job-description mt-20">
                                                        {{ $publicacion->descripcion }}
                                                    </div>
                                                    <div class="card-job-bottom mt-25">
                                                        <div class="row">
                                                            <div class="col-lg-10 col-sm-8 col-12">
                                                                <a href="#"
                                                                    class="btn btn-small background-12 mr-5">{{ $publicacion->servicio->nombres }}
                                                                </a>
                                                                {{-- <a href="job-grid-2.html" class="btn btn-small background-blue-light mr-5">Senior</a>
                                                    <a href="job-grid.html" class="btn btn-small background-6 disc-btn">Full time</a> --}}


                                                            </div>
                                                            <div class="col-md-2">
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('portal-admin.editarPublicacion', $publicacion) }}">Editar</a>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            @endforeach
                                        @else
                                               <center>
                                                    NO EXISTEN SERVICIOS REGISTRADOS
                                               </center>

                                            </table>
                                        @endif







                                        {{-- {{ $publicaciones->links() }} --}}
                                        <!-- End item job -->
                                    </div>
                                </div>
                                <div class="content-page">

                                    <div class="col-md-12">
                                        <div class="paginations">
                                            <ul class="pager">
                                                <li
                                                    class="page-item {{ $publicaciones->previousPageUrl() ? '' : 'disabled' }}">
                                                    <a href="{{ $publicaciones->previousPageUrl() }}"
                                                        class="pager-prev"></a>
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
                                                            class="pager-number {{ $page == $publicaciones->currentPage() ? 'active btn btn-warning' : '' }}">{{ $page }}</a>
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

                                                <li
                                                    class="page-next {{ $publicaciones->nextPageUrl() ? '' : 'disabled' }}">
                                                    <a href="{{ $publicaciones->nextPageUrl() }}" class="pager-next"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('succes'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Servicio Publicado!!'
            })
        </script>
    @endif
    @if (session('actualizacion'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Servicio Actualizado!!'
            })
        </script>
    @endif
@endsection
