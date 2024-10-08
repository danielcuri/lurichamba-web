@extends('layouts.panel')

@section('header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lista de especialidades</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Menu Principal</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('especialidad.index') }}">especialidades</a>
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
                            <h6 class="mb-0">Lista de especialidades</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                {{-- <a href="{{ route('rutas.create') }}" class="dt-button create-new btn btn-primary">

                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19">
                                            </line>
                                            <line x1="5" y1="12" x2="19" y2="12">
                                            </line>
                                        </svg>Registrar</span>
                                </a> --}}


                                <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="modal"
                                    data-bs-target="#addEvent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-plus me-50 font-small-4">
                                        <line x1="12" y1="5" x2="12" y2="19">
                                        </line>
                                        <line x1="5" y1="12" x2="19" y2="12">
                                        </line>
                                    </svg>
                                    <span class="align-middle">Registrar especialidades</span>
                                </button>
                            </div>


                        </div>
                    </div>
                    <div class="card-body">

                        <form id="search-form" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="search-input" class="form-control"
                                    placeholder="Buscar por nombre de la especialidad">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody id="result-table">

                                @foreach ($especialidades as $especialidad)
                                    <tr>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">
                                                {{ $especialidad->id }}
                                            </a>


                                        </td>

                                        <td>
                                            {{ $especialidad->nombres ?? 'No existe descripción.....' }}
                                        </td>
                                        <td>
                                            <button
                                                class="btn {{ $especialidad->estado == '1' ? 'btn-success' : 'btn-danger' }}">
                                                {{ $especialidad->estado == '1' ? 'Habilitado' : 'Deshabilitado' }}

                                            </button>
                                        </td>

                                        <td>

                                            <form action="{{ route('especialidad.destroy', $especialidad) }}"
                                                method="POST" class="desactivar">
                                                @csrf
                                                @method('DELETE')


                                                <a href="#" class="btn btn-primary dt-button create-new"
                                                    data-bs-toggle="modal" data-bs-target="#editEvent"
                                                    data-id="{{ $especialidad->id }}"
                                                    data-nombres="{{ $especialidad->nombres }}">
                                                    <i data-feather='edit'></i>

                                                </a>

                                                {{-- @can('areas.destroy') --}}
                                                <button type="submit"
                                                    class="btn btn-danger {{ $especialidad->estado == '2' ? 'disabled' : '' }}">
                                                    <i data-feather='trash-2'></i>
                                                </button>
                                                {{-- @endcan --}}

                                            </form>


                                        </td>
                                        {{-- @can('areas.destroy') --}}
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <form action="{{ route('especialidad.activar', $especialidad) }}"
                                                    method="POST" class="activar">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        class="btn btn-success {{ $especialidad->estado == '1' ? 'disabled' : '' }}"
                                                        style="">Habilitar</button>
                                                </form>
                                            </ul>
                                        </td>
                                        {{-- @endcan --}}


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando {{ $especialidades->firstItem() }} a {{ $especialidades->lastItem() }} de
                                    {{ $especialidades->total() }} registros
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item {{ $especialidades->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link"
                                                href="{{ $especialidades->previousPageUrl() }}">Anterior</a>
                                        </li>

                                        @if ($especialidades->currentPage() > 3)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $especialidades->url(1) }}">1</a>
                                            </li>
                                            @if ($especialidades->currentPage() > 4)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                        @endif

                                        @foreach ($especialidades->getUrlRange(max($especialidades->currentPage() - 2, 1), min($especialidades->currentPage() + 2, $especialidades->lastPage())) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $especialidades->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($especialidades->currentPage() < $especialidades->lastPage() - 2)
                                            @if ($especialidades->currentPage() < $especialidades->lastPage() - 3)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $especialidades->url($especialidades->lastPage()) }}">{{ $especialidades->lastPage() }}</a>
                                            </li>
                                        @endif

                                        <li class="page-item {{ $especialidades->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link"
                                                href="{{ $especialidades->nextPageUrl() }}">Siguiente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addEvent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Registrar Especialidad</h1>
                            <p></p>
                        </div>


                        <form id="editAddForm" class="row gy-1 pt-75 formguardar"
                            action="{{ route('especialidad.store') }}" method="POST">

                            @csrf


                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-12 mt-1">
                                        <label for="nombre" class="form-label">Nombres</label>

                                        <input class="form-control" type="text" name="nombres" required>
                                    </div>
                                    {{-- <div class="col-md-12 mt-1">
                                        <label for="estado_actividad" class="form-label">Descripción</label>

                                        <textarea class="form-control" name="nombres" id="" cols="10" rows="2" required></textarea>
                                    </div> --}}

                                </div>

                            </div>

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1" id="btnguardar">Guardar</button>
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cerrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @include('especialidades.modal')




    </section>
    <!--/ Basic table -->
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $('.dt-button.create-new').click(function() {


                var id = $(this).data('id');
                var nombres = $(this).data('nombres');


                $('#edit_nombres').val(nombres)

                $('#editEvent').modal('show');
                var actionUrl = "{{ route('especialidad.update', ':id') }}";
                actionUrl = actionUrl.replace(':id', id);
                $('#editActividad').attr('action', actionUrl);

            })
        })
    </script>

    @if (session('guardar'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'success',
                title: 'Se Guardo Satisfactoriamente!!'
            })
        </script>
    @endif
    @if (session('actualizar'))
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
                title: 'Se Actualizo Satisfactoriamente!!'
            })
        </script>
    @endif
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

    <script>
        $('.formguardar').submit(function(e) {
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

    <script>
        $('.formactualizar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de actualizar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Actualizar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
