@section('title', 'Editar Roles')
@extends('layouts.panel')
@section('header')
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Editar Roles</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($role, [
                        'route' => ['role.update', $role],
                        'method' => 'put',
                        'files' => true,
                        'class' => 'formulario',
                    ]) !!}

                    <div class="form-group">
                        <label class="form-label" for="pwd">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ingrese El Nombre" value="{{ $role->name }}">
                        @error('name')
                            <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                        @enderror
                    </div>

                    <label class="form-label" for="pwd"><strong> Elegir Permisos:</strong></label>

                    @error('permissions')
                        <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                    @enderror


                    @php
                        $chunks = $permissions->chunk(ceil($permissions->count() / 7));
                        $headers = ['MÓDULO USUARIOS', 'MÓDULO NOTIFICADORES', 'MÓDULO DE CARGOS', 'MÓDULO DE ROLES', 'TIPO DE DOCUMENTOS', 'ESTADO DE NOTIFICACON', 'REPORTES'];
                    @endphp

                    <div class="row">
                        @foreach ($chunks as $key => $chunk)
                            <div class="col-md-4">
                                <br>
                                <h6 class="btn btn-primary" style="font-size: 10px">{{ $headers[$key] }}</h6>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    {!! Form::checkbox('check_all_' . $key, 1, null, ['class' => 'check-all', 'data-column' => $key]) !!}
                                                </th>
                                                <th>Seleccionar todos los permisos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chunk as $permission)
                                                <tr>
                                                    <td>
                                                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'data-column' => $key]) !!}
                                                    </td>
                                                    <td>{{ $permission->description }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('role.index') }}" class="btn btn-danger">
                        Cancelar
                    </a> {!! Form::close() !!}
                </div>



            </div>
        </div>
    @endsection

    @section('scripts')

        <script>
            $('.formulario').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Estás seguro de actualizar?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Guardar!',
                    cancelButtonText: 'Cancelar',
                    theme: 'dark', // Agregar la opción de tema oscuro
                }).then((result) => {
                    if (result.value) {
                        this.submit();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Manejador de eventos para los checkboxes "Marcar Todo"
                $('.check-all').change(function() {
                    var column = $(this).data('column');
                    var checked = $(this).is(':checked');
                    $('table:eq(' + column + ') tbody tr td input[type="checkbox"]').prop('checked', checked);
                });

                // Manejador de eventos para los checkboxes de cada fila
                $('table tbody tr td input[type="checkbox"]').change(function() {
                    var column = $(this).data('column');
                    var checked = $(this).is(':checked');
                    var all_checked = true;
                    var all_unchecked = true;
                    $('table:eq(' + column + ') tbody tr').each(function() {
                        if ($(this).find('td:eq(' + column + ') input[type="checkbox"]').is(
                                ':checked')) {
                            all_unchecked = false;
                        } else {
                            all_checked = false;
                        }
                    });
                    $('table:eq(' + column + ') thead th:eq(0) input[type="checkbox"]').prop('checked',
                        all_checked);
                    $('table:eq(' + column + ') thead th:eq(0) input[type="checkbox"]').prop('indeterminate', (!
                        all_checked && !all_unchecked));
                });
            });
        </script>
    @endsection
