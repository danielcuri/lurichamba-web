<div class="modal fade" id="editEvent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Editar Servicio</h1>
                    <p></p>
                </div>


                <form id="editActividad" class="row gy-1 pt-75 formactualizar"
                    action="{{ route('tipo-servicio.update', 2) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label for="" class="form-label">Tipo Servicio</label>
                                <select name="edit_tipo_servicio_id" id="edit_tipo_servicio_id" class="form-select"
                                    required style="width: 100%">
                                    <option value="">SELECCIONE UN TIPO SERVICIO</option>
                                    @foreach ($tipoServicios as $tipoServicio)
                                        <option value="{{ $tipoServicio->id }}">
                                            {{ $tipoServicio->nombres }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo_servicio_id')
                                    <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-1">
                                <label for="estado_actividad" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombres" name="edit_nombres"
                                    required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="pwd">Slug :</label>
                                <input type="text" class="form-control" id="edit_slug" name="edit_slug"
                                    placeholder="Ingrese El Slug" readonly value="{{ old('slug') }}">

                            </div>
                            {{-- <div class="col-md-12 mt-1">
                                <label for="estado_actividad" class="form-label">Descripción</label>
                                <textarea class="form-control" name="edit_descripcion" id="edit_descripcion" cols="10" rows="2" required></textarea>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1" id="btnactualizar">Actualizar</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
