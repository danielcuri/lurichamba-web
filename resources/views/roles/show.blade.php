@section('title', 'Editar Roles')

@extends('layouts.panel')

@section('header')
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Ver Rol</h1>
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
                            placeholder="Ingrese El Nombre" value="{{ $role->name }}" disabled>
                        @error('name')
                            <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                        @enderror
                    </div>

                    <label class="form-label" for="pwd"><strong> Elegir Permisos:</strong></label>

                    @error('permissions')
                        <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                    @enderror

                    @php
                        $chunks = $permissions->chunk(ceil($permissions->count() / 10));
                        $headers = ['MÓDULO USUARIOS', 'MÓDULO ROLES', 'MÓDULO TP. ORGANIZACION', 'MÓDULO RESOLUCIONES', 'MÓDULO EMPRESAS', 'MÓDULO ZONAS', 'MÓDULO PARADEROS', 'MÓDULO PERSONAS', 'MÓDULO VEHICULOS', 'MENU PRINCIPAL'];
                    @endphp

                    <div class="row">
                        @foreach ($chunks as $key => $chunk)
                            <div class="col-md-4">
                                <br>
                                <h6 class="btn btn-primary" style="font-size: 10px">{{ $headers[$key] }}</h6>
                                <br>
                                <br>
                                @foreach ($chunk as $permission)
                                    <div class="form-group">

                                        <label style="position:relative;">
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'disabled', 'style' => '']) !!}

                                            {{ $permission->description }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <br>

                    <a href="{{ route('role.index') }}" class="btn btn-danger" style="float: right">
                        Volve a Lista de Roles
                    </a> 
                    {!! Form::close() !!}
                </div>



            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $('.formulario').submit(function(e) {
                e.preventDefault()

                Swal.fire({
                    title: '¿Estas seguro de actualizar este rol?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {


                        this.submit()

                    }
                })

            })
        </script>
    @endsection
