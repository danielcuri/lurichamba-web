@extends('layouts.panel')

@section('header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de Comentarios Publicados</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-comentario.index') }}">Comentarios
                                Publicaciones</a>
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
                            <h6 class="mb-0">Lista de Comentarios
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
                                    <label for="" class="form-label">Estado</label>
                                    <select name="estado" class="form-select" id="estado">
                                        <option value="" selected>Seleccione un estado
                                        </option>



                                        <option value="1" {{ request('estado') == 1 ? 'selected' : '' }}>HABILITADO
                                        </option>
                                        <option value="2" {{ request('estado') == 2 ? 'selected' : '' }}>DESHABILITADO
                                        </option>


                                    </select>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <label for="" class="form-label">Comentario</label>

                                    <input type="text" name="search" id="search-input" class="form-control"
                                        placeholder="Buscar por comentario" value="{{ request('search') }}">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>

                                </div>
                            </div>



                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th>Datos usuario Publicación</th>
                                    <th>Publicación</th>

                                    <th>Descripción Publicacion</th>
                                    <th>Fecha Registrada</th>

                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody id="result-table">

                                @foreach ($comentarios as $comentario)
                                    <tr>
                                        {{-- <td>
                                            <a href="" class="btn btn-success"></a>
                                        </td> --}}
                                        <td>{{ Str::upper($comentario->personas->nombres) }}
                                            {{ Str::upper($comentario->personas->apellido_paterno) }}
                                            {{ Str::upper($comentario->personas->apellido_materno) }}</td>



                                        <td>{{ Str::upper($comentario->publicacion->nombres) }}</td>
                                        <td>{{ Str::upper($comentario->comentario) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($comentario->fecha_registrada)->format('d-m-Y') }}
                                        </td>



                                        <td>
                                            <button
                                                class="btn {{ $comentario->estado == '1' ? 'btn-success' : 'btn-danger' }}">
                                                {{ $comentario->estado == '1' ? 'Habilitado' : 'Deshabilitado' }}

                                            </button>
                                        </td>


                                        <td>

                                            <form action="{{ route('admin-comentario.destroy', $comentario) }}"
                                                method="POST" class="desactivar">
                                                @csrf
                                                @method('DELETE')



                                                {{-- @can('areas.destroy') --}}
                                                <button type="submit"
                                                    class="btn btn-danger {{ $comentario->estado == '2' ? 'disabled' : '' }}">
                                                    <i data-feather='trash-2'></i>
                                                </button>
                                                {{-- @endcan --}}

                                            </form>


                                        </td>

                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <form action="{{ route('admin-comentario.activar', $comentario) }}"
                                                    method="POST" class="activar">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        class="btn btn-success {{ $comentario->estado == '1' ? 'disabled' : '' }}"
                                                        style="">Habilitar</button>
                                                </form>
                                            </ul>
                                        </td>




                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando {{ $comentarios->firstItem() }} a {{ $comentarios->lastItem() }} de
                                    {{ $comentarios->total() }} registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item {{ $comentarios->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link"
                                                href="{{ $comentarios->previousPageUrl() }}">Anterior</a>
                                        </li>

                                        @if ($comentarios->currentPage() > 3)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $comentarios->url(1) }}">1</a>
                                            </li>
                                            @if ($comentarios->currentPage() > 4)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                        @endif

                                        @foreach ($comentarios->getUrlRange(max($comentarios->currentPage() - 2, 1), min($comentarios->currentPage() + 2, $comentarios->lastPage())) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $comentarios->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($comentarios->currentPage() < $comentarios->lastPage() - 2)
                                            @if ($comentarios->currentPage() < $comentarios->lastPage() - 3)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $comentarios->url($comentarios->lastPage()) }}">{{ $comentarios->lastPage() }}</a>
                                            </li>
                                        @endif

                                        <li class="page-item {{ $comentarios->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $comentarios->nextPageUrl() }}">Siguiente</a>
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
