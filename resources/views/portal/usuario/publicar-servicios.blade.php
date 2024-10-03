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

                            <h3>Registrar mi Servicio</h3>
                            <hr>
                            <div class="card-body">
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
                                <form class="contact-form-style" id="contact-form" action="{{ route('publicar') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="numero_documento" style="font-weight: bold">*
                                                    Tipo de Servicio:</label>
                                                <select name="tipo_servicio" id="select1" class="form-control" required>
                                                    <option value="0" disabled selected>Seleccione un Tipo de Servicio
                                                    </option>
                                                    @foreach ($tipoServicios as $tipoServicio)
                                                        <option value="{{ $tipoServicio->id }}">{{ $tipoServicio->nombres }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3" for="nombres"
                                                    style="font-weight: bold">*
                                                    Servicio:</label>
                                                <select name="servicio" id="select2" class="form-control" required>
                                                    <option value="0" disabled selected>Seleccione un Servicio</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_paterno" style="font-weight: bold">*
                                                    Título de publicación:</label>
                                                <div>
                                                    <span> Ejemplo: Servicio de albañileria especializada ......</span>
                                                </div>
                                                <input name="nombre" placeholder="" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_materno"
                                                style="font-weight: bold">*
                                                Descripción de publicación:</label>
                                            <div>
                                                <span>Ingresar el detalle de lo que va ofrecer.</span>
                                            </div>
                                            <textarea name="descripcion" id="" cols="30" rows="10" required></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button class="btn btn-success submit submit-auto-width"
                                                type="submit">Registrar</button>
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

    <script src="{{ asset('sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            // Escucha el evento de cambio en el elemento con id 'area_id'
            $('#select1').on('change', function() {
                // Captura el valor seleccionado en 'area_id'
                var AreaId = this.value;

                // Vacía el contenido del elemento con id 'sub_area_id'
                $('#select2').html('');

                if (AreaId) {

                    $.ajax({
                        url: '{{ route('getAreas') }}?area_id=' + AreaId,
                        type: 'get',
                        success: function(res) {
                            $.each(res, function(key, value) {
                                $('#select2').append('<option value="' + value.id +
                                    '">' + value.nombres + '</option>');
                            });
                        }
                    });
                } else {
                    // Establece opciones predeterminadas en caso de que no se haya seleccionado una opción en 'area_id'
                    $('#select2').html(
                        '<option value="" selected　@if (old('select2') == '1') selected @endif>Seleccione una Sub Area.....</option>'
                    );
                }
            });
        });
    </script>

    <script>
        $('#contact-form').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Registrar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Registrar!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>
@endsection
