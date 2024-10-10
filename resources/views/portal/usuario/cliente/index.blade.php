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
                                <h3>Lista de Servicios Solicitados</h3>

                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="result-table"
                                        class="table table-responsive  datatables-basic dtr-column collapsed ">
                                        <thead>
                                            <tr>
                                                <th>Datos de Contratado</th>
                                                <th>Publicacion</th>
                                                <th>Ver Publicacion</th>
                                                <th>Estado</th>


                                            </tr>
                                        </thead>
                                        <tbody id="result-table">

                                            @if ($calificaciones->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="text-center"> No hay Solicitudes de comentarios.</td>
                                                </tr>
                                            @else
                                                @foreach ($calificaciones as $calificacion)
                                                    <tr>


                                                        <td>
                                                            {{ $calificacion->personas->nombres ?? '' }}
                                                            {{ $calificacion->personas->apellido_paterno ?? '' }}
                                                            {{ $calificacion->personas->apellido_paterno ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $calificacion->publicacion->nombres ?? 'No hay comentario' }}

                                                        </td>
                                                        <td>
                                                            <a href="{{ route('servicio-portal.show', $calificacion->publicacion->slug) }}"
                                                                class="btn btn-success" target="_blank"> Ver </a>

                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn {{ $calificacion->estado_proceso_id == '1' ? 'btn-warning' : 'btn-success' }}">
                                                                {{ $calificacion->estado_proceso_id == '1' ? $calificacion->estadosProceso->nombres : $calificacion->estadosProceso->nombres }}

                                                            </button>
                                                        </td>




                                                    </tr>
                                                @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="content-page">

                                <div class="col-md-12">
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
                                                        class="pager-number {{ $page == $calificaciones->currentPage() ? 'active btn btn-warning' : '' }}">{{ $page }}</a>
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
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
