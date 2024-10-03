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
                            <h4>Actualizar Credenciales</h4>
                            <hr>
                            <div>

                            </div>
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
                            <div class="card-body">
                                <form class="contact-form-style" id="contact-form" action="{{ route('portal-admin.updateCredenciales') }}"
                                    method="get">
                                    @csrf
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <!-- <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3"
                                                    for="numero_documento" style="font-weight: bold">*Contraseña Anterior:</label>
                                                <input name="antigua_contrasena" placeholder="Ingrese su Contraseña anterior"
                                                    type="text" value="" required/>
                                            </div>
                                        </div> -->

                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*Contraseña Anterior:</label>
                                            <div class="input-group form-password-toggle mb-2">
                                            <input type="password" name="antigua_contrasena" class="form-control" id="password" placeholder="Ingrese su anterior Contraseña" aria-describedby="basic-default-password" required>
                                            <span class="input-group-text cursor-pointer" onclick="togglePassword()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-small-4">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </span>
                                         </div>




                                        <!-- <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*Contraseña Nueva:</label>
                                                <input name="nueva_contrasena" placeholder="Ingrese su Contraseña nueva"type="text" value="" required/>
                                            </div>
                                        </div> -->


                                        <label class="form-label text-lg font-weight-bold mr-3" for="numero_documento" style="font-weight: bold">*Contraseña Nueva:</label>
                                            <div class="input-group form-password-toggle mb-2">
                                            <input type="password" name="nueva_contrasena" class="form-control" id="password1" placeholder="Ingrese su nueva Contraseña" aria-describedby="basic-default-password" required>
                                            <span class="input-group-text cursor-pointer" onclick="togglePassword1()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-small-4">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </span>
                                         </div>
                            
                                        <div class="col-lg-12 col-md-12">
                                            <button class="btn btn-success submit submit-auto-width"
                                                type="submit">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-shadow">
                            <h4>Subir Foto</h4>
                            <hr>
                            <div>

                            </div>
                            <div class="card-body" style="height: 295px; overflow: hidden;">
                                <form class="contact-form-style" id="contact-form" action="{{ route('portal-admin.subirFoto') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">                           
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20" style="display: flex; align-items: flex-start;">
                                                <div style="flex: 1;">
                                                    <label class="form-label text-lg font-weight-bold mr-3" for="foto" style="font-weight: bold">* Foto:</label>
                                                    <input class="form-control" type="file" name="foto" id="foto" accept="image/*" onchange="previewImage(event)" required>
                                                    <button class="btn btn-success submit submit-auto-width" type="submit" style="margin-top: 25px;">Actualizar</button>
                                                </div>
                                                <div style="flex: 1; text-align: center;">
                                                    <img id="preview" class="img-preview" src="#" alt="Vista previa de la imagen"  style="display:none; width: 120px; margin-left: 70px; ">
                                                    <p id="nombreImagen"></p>
                                                </div>
                                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('succes'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
        
            })
            Toast.fire({
                icon: 'success',
                title: 'Credenciales Actualizados!!'
            })
        </script>
    @endif

    @if (session('fail'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
        
            })
            Toast.fire({
                icon: 'error',
                title: 'La Contraseña Anterior no coincide!!'
            })
        </script>
    @endif

    <script>
        function previewImage(event) {
            var input = event.target;
    
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').style.display = 'block';
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script> 


<!-- SCRIPT DE CLAVE -->
<script>
    function togglePassword() {
        var passwordInput = $("#password");

        if (passwordInput.attr("type") === "text") {
            passwordInput.attr("type", "password");
        } else {
            passwordInput.attr("type", "text");
        }
    }

    function togglePassword1() {
        var passwordInput = $("#password1");

        if (passwordInput.attr("type") === "text") {
            passwordInput.attr("type", "password");
        } else {
            passwordInput.attr("type", "text");
        }
    }
</script>



@endsection
