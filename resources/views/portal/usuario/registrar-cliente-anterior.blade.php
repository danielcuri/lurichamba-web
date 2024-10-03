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
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <h3>Registrar Clientes</h3>
                            
                            <hr>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <form action="{{ route('portal-admin.guardarClientes') }}" class="registrar" method="POST">
                                    @csrf

                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-15">Servicio</h5>
                                        <div class="form-group select-style select-style-icon">

                                            <select name="servicio" id="servicio" class="form-control " required
                                                style="width: 100%">
                                                <option value="">SELECCIONE UN PUBLICACION SERVICIO</option>
                                                @foreach ($misPublicaciones as $misPublicacion)
                                                    <option value="{{ $misPublicacion->id }}">
                                                        {{ $misPublicacion->nombres }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- <i class="fi-rr-briefcase"></i> --}}
                                        </div>
                                    </div>

                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-15">Cliente</h5>
                                        <div class="form-group ">
                                            <input type="text" class="form-control" name="cliente_documento"
                                                maxlength="12" minlength="8" placeholder="Ingrese el número de DNI" required>

                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"> Registrar</button>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>



@endsection

@section('scripts')
    <script src="{{asset('sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('assets/js/numeros.js') }}"></script>
    <script src="{{ asset('assets/js/letras.js') }}"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: "No se puede registrar usted mismo.!",
                icon: "error"
            });
        </script>
    @endif
    @if (session('error-registrado'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "Ya se encuentra registrado el número de documento.!",
            icon: "error"
        });
    </script>
@endif

    <script>
        $('.registrar').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Guardar?',
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
@endsection
