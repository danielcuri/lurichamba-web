@section('title', 'Asignar Rol Al Usuario')
@extends('layouts.panel')
@section('header')
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center" style="color: black">
                    <div>
                        <h1>Asignar Rol</h1>
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

                    {!! Form::model($usuario, [
                        'route' => ['usuario.updaterole', $usuario],
                        'method' => 'put',
                        'files' => true,
                        'class' => 'casino',
                    ]) !!}

                    <div class="form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="name" class="form-control" id="name" name="name"
                            value="{{ $usuario->name }}" readonly>
                    </div>

                    @error('roles')
                        <br>
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        <br>
                    @enderror

                    @foreach ($roles as $rol)
                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
                                {{ $rol->name }}
                            </label>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Asignar Rol</button>
                    <a href="{{ route('usuario.index') }}" class="btn btn-danger">
                        Cancelar
                    </a>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>
        $('.casino').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de asignar roles a este Usuario?',

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
@endsection
