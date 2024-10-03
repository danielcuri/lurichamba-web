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

                            <h4>REGISTRAR OTROS DOCUMENTOS</h4>

                            <hr>

                            <div class="card-body">
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
                                <form class="contact-form-style" id="contact-form"
                                    action="{{ route('portal-admin.guardar-documentos') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">


                                        <div class="col-md-12">
                                            <label for="" class="form-label">Subir Otros Documentos</label>
                                            <input type="file" class="form-control" name="otro_documento">
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-success" type="submit">Guardar Documentación</button>

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
