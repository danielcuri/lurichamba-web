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

                            <h3>Editar mi Servicio</h3>
                            <hr>
                            <div class="card-body">
                                
                                @if ($errors->any())
                                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                                <ul class="error-list">
                                                    @foreach ($errors->all() as $error)
                                                    <li class="">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-close mb-2" data-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                @endif
                                <form class="contact-form-style" id="contact-form" action="{{ route('actualizarPublicacion', $publicacion) }}"
                                    method="POST">
                                @csrf
                                @method('put')
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="numero_documento" style="font-weight: bold">*
                                                    Tipo de Servicio:</label>
                                                <select name="tipo_servicio" id="select1" class="form-control" required>
                                                    <option value="{{$publicacion->tipo_servicio_id}}" readonly selected>{{$publicacion->tipoServicio->nombres}}
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
                                                    <option value="{{$publicacion->servicio_id}}" readonly selected>{{$publicacion->servicio->nombres}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="apellido_paterno" style="font-weight: bold">*
                                                    Asunto:</label>
                                                <input name="nombre" placeholder="" type="text" required value="{{$publicacion['nombres']}}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <label class="form-label text-lg font-weight-bold mr-3" for="apellido_materno"
                                                style="font-weight: bold">*
                                                Descripcion</label>
                                            <textarea name="descripcion" id="" cols="30" rows="10" required>{{$publicacion['descripcion']}}</textarea>
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="{{asset('sweetalert2.all.min.js')}}"></script>

    <script src="{{asset('jquery-3.6.4.min.js')}}"></script>
    
    <script>
        $('#contact-form').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Estas seguro de Actualizar?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Actualizar!!!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {


                    this.submit()

                }
            })

        })
    </script>

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
@endsection
