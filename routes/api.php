<?php

use App\Http\Controllers\api\AutenticacionController;
use App\Http\Controllers\api\GeneralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AutenticacionController::class, 'login']);
    Route::post('logout', [AutenticacionController::class, 'logout']);
    Route::post('refresh', [AutenticacionController::class, 'refresh']);
    Route::post('me', [AutenticacionController::class, 'me']);
    Route::post('registrar', [AutenticacionController::class, 'registrarse']);
    Route::post('verificar-codigo', [AutenticacionController::class, 'verifyCode']);
});


Route::group([   
    'prefix' => 'categoria'
], function ($router) {
    Route::get('lista', [GeneralController::class, 'obtenerListadoCategorias']);
});

Route::group([   
    'prefix' => 'tipo-documento'
], function ($router) {
    Route::get('lista', [GeneralController::class, 'obtenerListaTipoDocumentos']);
});


Route::group([    
    'prefix' => 'publicacion'
], function ($router) {
    
    Route::get('lista', [GeneralController::class, 'listaPublicaciones']);
    Route::post('guardar-comentario/', [GeneralController::class, 'guardarComentarioLibre']);
});
