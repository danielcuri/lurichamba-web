@extends('layouts.panel')

@section('header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de Solicitudes Publicaciones</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('solicitud.index') }}">Solicitudes Publicaciones</a>
                        </li>
                        <li class="breadcrumb-item active">Lista
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
                <button
                    class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light"
                    type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg></button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check-square me-1">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-message-square me-1">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-mail me-1">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg><span class="align-middle">Email</span></a><a class="dropdown-item"
                        href="app-calendar.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-calendar me-1">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg><span class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">



                    <div class="card-header border-bottom p-1">

                        <div class="head-label">
                            <h6 class="mb-0">Lista de Usuarios Registrados
                            </h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">

                            </div>


                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <div class="alert alert-primary" role="alert">
                            <div class="alert-body"><strong>Good Morning!</strong> Start your day with some alerts.</div>
                        </div> --}}

                        @if ($errors->any())
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                <ul class="error-list">
                                    @foreach ($errors->all() as $error)
                                        <li class="">{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close mb-2" data-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="search-form" class="mb-3">
                            <div class="row">
                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Estado de procesos</label>
                                    <select name="estado_proceso_id" class="form-select" id="estado_proceso_id">
                                        <option value="" selected disabled>Seleccione un estado proceso
                                        </option>
                                        @foreach ($estados_procesos as $estados_proceso)
                                            <option value="{{ $estados_proceso->id }}"
                                                {{ request('estado_proceso_id') == $estados_proceso->id ? 'selected' : '' }}>
                                                {{ $estados_proceso->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Nombre de Servicio</label>

                                    <input type="text" name="search" id="search-input" class="form-control"
                                        placeholder="Buscar por nombre del servicio">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>

                                </div>
                            </div>



                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th>Persona</th>
                                    
                                    <th>Descripción Publicacion</th>
                                    <th>Fecha Registrada</th>

                                    <th>Ver Publicación</th>
                                    <th>Estado Proceso</th>
                                    <th>Estado</th>

                                </tr>
                            </thead>
                            <tbody id="result-table">

                                @foreach ($solicitudes as $solicitud)
                                    <tr>
                                        {{-- <td>
                                            <a href="" class="btn btn-success"></a>
                                        </td> --}}
                                        <td>{{ Str::upper($solicitud->personas->nombres) }} {{ Str::upper($solicitud->personas->apellido_paterno) }}
                                            {{ Str::upper($solicitud->personas->apellido_materno) }}</td>
                   
                                        <td>{{ Str::upper($solicitud->nombres) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($solicitud->fecha_registrada)->format('d-m-Y') }}</td>

                                        <td class="">

                                            <a href="{{ route('solicitud.show', $solicitud) }}"
                                                class="btn btn-warning " style="">

                                                <i data-feather='eye'></i>
                                                Ver Publicacion</a>
                                        </td>
                                        <td class="">
                                            {{ $solicitud->estadosProceso->nombres }}
                                        </td>

                                        <td>
                                            <button
                                                class="btn {{ $solicitud->estado == '1' ? 'btn-success' : 'btn-danger' }}">
                                                {{ $solicitud->estado == '1' ? 'Habilitado' : 'Deshabilitado' }}

                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando {{ $solicitudes->firstItem() }} a {{ $solicitudes->lastItem() }} de
                                    {{ $solicitudes->total() }} registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item {{ $solicitudes->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $solicitudes->previousPageUrl() }}">Anterior</a>
                                        </li>

                                        @if ($solicitudes->currentPage() > 3)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $solicitudes->url(1) }}">1</a>
                                            </li>
                                            @if ($solicitudes->currentPage() > 4)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                        @endif

                                        @foreach ($solicitudes->getUrlRange(max($solicitudes->currentPage() - 2, 1), min($solicitudes->currentPage() + 2, $solicitudes->lastPage())) as $page => $url)
                                            <li class="page-item {{ $page == $solicitudes->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($solicitudes->currentPage() < $solicitudes->lastPage() - 2)
                                            @if ($solicitudes->currentPage() < $solicitudes->lastPage() - 3)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $solicitudes->url($solicitudes->lastPage()) }}">{{ $solicitudes->lastPage() }}</a>
                                            </li>
                                        @endif

                                        <li class="page-item {{ $solicitudes->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $solicitudes->nextPageUrl() }}">Siguiente</a>
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
    <!--/ Basic table -->
@endsection
