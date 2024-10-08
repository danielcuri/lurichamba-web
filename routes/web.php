<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\PortalAdministracionController;
use App\Http\Controllers\PortalServicioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioRegistradoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [InicioController::class, 'index'])->name('principal.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/politicas-y-privacidad', [InicioController::class, 'politicasPrivacidad'])->name('portal.politicasPrivacidad');
Route::get('/terminos-y-condiciones', [InicioController::class, 'terminosCondiciones'])->name('portal.terminosCondiciones');


Route::get('admin-comentarios', [ComentarioController::class, 'index'])->name('admin-comentario.index');
Route::post('admin-comentarios/{comentario}/activar', [ComentarioController::class, 'activar'])->name('admin-comentario.activar');
Route::delete('admin-comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('admin-comentario.destroy');



Route::post('/portal-logout', [LoginController::class, 'logout'])->name('portal.logout');
Route::post('/portal-login', [LoginController::class, 'login'])->name('portal.login');
Route::get('/portal-login', [LoginController::class, 'index'])->name('portal-login.index');

Route::get('/portal-credenciales', [LoginController::class, 'indexRecuperarCredenciales'])->name('portal-credenciales.index');
Route::post('/portal-credenciales', [LoginController::class, 'RecuperarCredenciales'])->name('portal-credenciales.enviar');



Route::get('portal-admin/lista-clientes', [PortalAdministracionController::class, 'indexClientes'])->name('portal-admin.indexClientes');
Route::post('portal-admin/registrar-clientes', [PortalAdministracionController::class, 'guardarClientes'])->name('portal-admin.guardarClientes');
Route::get('portal-admin/registrar-clientes', [PortalAdministracionController::class, 'agregaClientes'])->name('portal-admin.agregaClientes');

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

Route::get('portal-admin/cliente-comentarios', [PortalAdministracionController::class, 'indexClienteComentarios'])->name('portal-admin.indexClienteComentarios');
Route::put('portal-admin/{cliente_comentario}/cliente-comentarios', [PortalAdministracionController::class, 'agregarClienteComentarios'])->name('portal-admin.clienteComentarios');
Route::post('portal-admin/cliente-comentarios/{publicacion}', [PortalAdministracionController::class, 'agregarClienteComentariosLibre'])->name('portal-admin.clienteComentariosLibre');

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


Route::get('portal-admin/cambiar-credenciales', [PortalAdministracionController::class, 'cambiarCredenciales'])->name('portal-admin.cambiarCredenciales');
Route::get('portal-admin/update-credenciales', [PortalAdministracionController::class, 'updateCredenciales'])->name('portal-admin.updateCredenciales');
Route::put('portal-admin/subir-foto', [PortalAdministracionController::class, 'subirFoto'])->name('portal-admin.subirFoto');

Route::get('portal-admin/mis-documentos', [PortalAdministracionController::class, 'misDocumentos'])->name('portal-admin.misDocumentos');
Route::get('portal-admin/registrar-documentos', [PortalAdministracionController::class, 'registrarDocumentos'])->name('portal-admin.registrar-documentos');
Route::post('portal-admin/guardar-documentos', [PortalAdministracionController::class, 'guardarDocumentos'])->name('portal-admin.guardar-documentos');
Route::post('portal-admin/guardar-documentos-ofrecer', [PortalAdministracionController::class, 'guardarDocumentoOfrecerServicio'])->name('portal-admin.guardar-documentos-ofrecer');

Route::get('portal-admin/editar-documentos/{documento}', [PortalAdministracionController::class, 'editarDocumentos'])->name('portal-admin.editar-documentos');

Route::put('portal-admin/actualizar-documentos/{documento}', [PortalAdministracionController::class, 'actualizarDocumentos'])->name('portal-admin.actualizar-documentos');


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


Route::get('portal-admin/mis-servicios', [PortalAdministracionController::class, 'misServicios'])->name('portal-admin.misservicios');

Route::get('portal-admin/editar-publicacion/{publicacion}', [PortalAdministracionController::class, 'editarPublicacion'])->name('portal-admin.editarPublicacion');
Route::put('portal-admin/actualizar-publicacion/{publicacion}', [PortalAdministracionController::class, 'actualizarPublicacion'])->name('actualizarPublicacion');
Route::get('portal-admin/publicar-servicios', [PortalAdministracionController::class, 'publicarServicios'])->name('portal-admin.publicarServicios');  // @ @ @ @ @ @ @ @ @ @ @ @ @
// Route::post('portal-admin/publicar-servicios', [PortalAdministracionController::class, 'publicarServicios'])->name('portal-admin.publicarServicios');  // @ @ @ @ @ @ @ @ @ @ @ @ @



Route::put('portal-admin/contratar-servicio', [PortalAdministracionController::class, 'actualizarContratarServicio'])->name('portal-admin.solicitarContratarServicio');
Route::put('portal-admin/ofrecer-servicio', [PortalAdministracionController::class, 'actualizarOfrecerServicio'])->name('portal-admin.solicitarOfrecerServicio');

Route::post('portal-admin/perfil-editar', [PortalAdministracionController::class, 'perfilEditar'])->name('portal-admin.perfilEditar');
Route::put('portal-admin/perfil-actualizar', [PortalAdministracionController::class, 'perfilActualizar'])->name('portal-admin.perfilActualizar');
Route::get('portal-admin/perfil', [PortalAdministracionController::class, 'perfil'])->name('portal-admin.perfil');
Route::resource('portal-admin', PortalAdministracionController::class)->names('usuario-portal');


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


Route::resource('servicio', PortalServicioController::class)->names('servicio-portal');
Route::get('menu-principal', [MenuPrincipalController::class, 'index'])->name('menu-principal.index');
Route::post('especialidad/{especialidad}/activar', [EspecialidadController::class, 'activar'])->name('especialidad.activar');
Route::resource('especialidad', EspecialidadController::class)->names('especialidad');

Route::put('tipo-servicio/actualizar-imagen/{tipo_servicio}', [TipoServicioController::class, 'actualizarImagen'])->name('tipo-servicio.actualizarImagen');
Route::post('tipo-servicio/{tipo_servicio}/activar', [TipoServicioController::class, 'activar'])->name('tipo-servicio.activar');
Route::resource('tipo-servicio',    TipoServicioController::class)->names('tipo-servicio');

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

Route::get('registrate', [RegistrarController::class, 'index'])->name('registrate.index');
Route::post('registrate', [RegistrarController::class, 'ofrecerServicio'])->name('registrate.ofrecerServicio');
Route::post('registrar', [RegistrarController::class, 'contratarServicio'])->name('registrar.contratarServicio');

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

Route::put('admin-servicio/actualizar-imagen/{admin_servicio}', [ServicioController::class, 'actualizarImagen'])->name('servicio.actualizarImagen');
Route::post('admin-servicio/{admin_servicio}/activar', [ServicioController::class, 'activar'])->name('servicio.activar');
Route::resource('admin-servicio',    ServicioController::class)->names('servicio');


Route::post('admin-usuarios-registrados/guardar', [UsuarioRegistradoController::class, 'guardarPersona'])->name('usuario-registrado.guardarPersona');
Route::post('admin-usuarios-registrados/guardar-servicio', [UsuarioRegistradoController::class, 'guardarServicioPersona'])->name('usuario-registrado.guardarServicioPersona');


Route::put('admin-usuarios-registrados/{publicacion}/update-servicio', [UsuarioRegistradoController::class, 'actualizarPublicacion'])->name('usuario-registrado.actualizarPublicacion');

Route::put('admin-usuarios-registrados/{usuario_registrado}/updaterol', [UsuarioRegistradoController::class, 'updaterol'])->name('usuario-registrado.updaterole');
Route::put('admin-usuarios-registrados/{usuario_registrado}/rechazar-persona', [UsuarioRegistradoController::class, 'rechazarProcesoPersona'])->name('usuario-registrado.rechazarProcesoPersona');
Route::put('admin-usuarios-registrados/{usuario_registrado}/validar-persona', [UsuarioRegistradoController::class, 'validarProcesoPersona'])->name('usuario-registrado.validarProcesoPersona');
Route::put('admin-usuarios-registrados/{usuario_registrado}/validar-documento', [UsuarioRegistradoController::class, 'validarProcesoDocumento'])->name('usuario-registrado.validarProcesoDocumento');
Route::get('admin-usuarios-registrados/{usuario_registrado}/servicios', [UsuarioRegistradoController::class, 'verServicios'])->name('usuario-registrado.servicios');
Route::resource('admin-usuarios-registrados',    UsuarioRegistradoController::class)->names('usuario-registrado');

Route::put('admin-solicitudes/{solicitud}/rechazar-persona', [SolicitudController::class, 'rechazarProcesoPublicacion'])->name('solicitud.rechazarProcesoPublicacion');
Route::put('admin-solicitudes/{solicitud}/validar-persona', [SolicitudController::class, 'validarProcesoPublicacion'])->name('solicitud.validarProcesoPublicacion');
///RUTA DE SOLICITUDES DE PUBLICACION DE SERVICIOS
Route::resource('admin-solicitudes', SolicitudController::class)->names('solicitud');

Route::get('/usuario/{usuario}/editarol', [UserController::class, 'editrol'])->name('usuario.roles');
Route::put('usuario/{usuario}/updaterol', [UserController::class, 'updaterol'])->name('usuario.updaterole');
Route::resource('role', RoleController::class);
Route::resource('usuario', UserController::class)->names('usuario');


Route::get('get-areas', [PortalAdministracionController::class, 'getAreas'])->name('getAreas');

Route::post('publicar', [PortalAdministracionController::class, 'publicarServicio'])->name('publicar');

Route::get('sorteo',[InicioController::class, 'sorteoIndex']);
Route::get('get-servicios', [UsuarioRegistradoController::class, 'getServicios'])->name('getServicios');
