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
                            <h3>Mi Perfil</h3>
                            <hr>
                            <div>

                            </div>
                            @isset($validator)
                                <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                    <ul class="error-list">
                                        @foreach ($validator->errors()->all() as $error)
                                            <li class="">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close mb-2" data-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endisset
                            <div class="card-body">
                                <form class="contact-form-style" id="contact-form"
                                    action="{{ route('portal-admin.perfilActualizar') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                                    style="font-weight: bold">*
                                                    Nombres:</label>
                                                <input class="form-control" id="nombres" type="text" name="nombres"
                                                    placeholder="Jesus" autocomplete="new-username"
                                                    value="{{ $datosPersonales->nombres }}" onkeypress="return soloLetrasTildesNombreCampo(event)" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_paterno" style="font-weight: bold">*
                                                    Apellido Paterno:</label>

                                                <input name="apellido_paterno" placeholder="Ingrese Su Apellido Paterno"
                                                    type="text" value="{{ $datosPersonales->apellido_paterno }}" onkeypress="return soloLetrasTildesNombreCampo(event)"/>


                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_materno" style="font-weight: bold">*
                                                    Apellido Materno:</label>

                                                <input name="apellido_materno" placeholder="Ingrese Su Apellido Materno"
                                                    type="text" value="{{ $datosPersonales->apellido_materno }}" onkeypress="return soloLetrasTildesNombreCampo(event)"/>


                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="direccion_fiscal" style="font-weight: bold">*
                                                    Dirección Fiscal:</label>
                                                <input name="direccion_fiscal" placeholder="Ingrese Su Domicilio Fiscal"
                                                    type="text" id="direccion_fiscal"
                                                    value="{{ $datosPersonales->direccion_fiscal }}" />

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <button class="btn btn-success submit submit-auto-width"
                                                type="submit">Actualizar</button>
                                        </div>
                                    </div>
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
    <script src="{{ asset('assets/js/numeros.js') }}"></script>
    <script src="{{ asset('assets/js/letras.js') }}"></script>
@endsection
