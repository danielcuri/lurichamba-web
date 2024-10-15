<div class="modal fade" id="modalEditDoc" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-event">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Editar Documento</h1>
                    <p></p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
                        <i class="icon-alert"></i>
                        <p><b>¡Ups! Algo salió mal..</b> Por favor verifique las siguientes
                            validaciones :</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form id="editActualizarDoc" class="row gy-1 pt-75"
                    action="{{ route('usuario-registrado.actualizarDocumento', 2) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12 mt-1">
                                <label for="" class="form-label fw-bolder">Archivo</label>
                                <input type="file" class="form-control" id="edit_documento" name="documento">
                            </div>



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
