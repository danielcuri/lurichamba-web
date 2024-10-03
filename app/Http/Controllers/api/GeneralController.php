<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListaPublicacionResource;
use App\Http\Resources\ListaTipoServicioResource;
use App\Models\Calificacion;
use App\Models\Publicacion;
use App\Models\TipoDocumento;
use App\Models\TipoServicio;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function obtenerListadoCategorias()
    {
        try {
            // $user = auth('api')->user();
            $tipo_servicios = TipoServicio::where('estado', 1)->take(6)->get();

            return response()->json([
                'respuesta' => true,
                'codigo' => 200,
                'mensaje' => 'Se cargaron satisfactoriamente los datos.',
                'data' =>  ListaTipoServicioResource::collection($tipo_servicios)
            ], 200);
        } catch (Error $e) {


            return response()->json([
                'respuesta' => false,

                'codigo' => 500,
                'mensaje' => 'Error en el servidor',
            ], 500);
        }
    }



    public function listaPublicaciones(Request $request)
    {
        try {
            $query = Publicacion::query();

            // Filtrar por nombre
            if ($request->has('search')) {
                $nombre = $request->input('search');
                $query->where('nombres', 'like', "%$nombre%");
            }
            if ($request->input('categoria_id')) {
                $tipo_servicio = $request->input('categoria_id');


                $query->where('tipo_servicio_id', $tipo_servicio ?? '');
            }


            // Filtrar por servicio_id
            if ($request->input('servicio') != '') {
                $servicioId = $request->input('servicio');
                $query->where('servicio_id', $servicioId);
            }

            // Filtrar por estado_proceso_id
            $query->where('estado_proceso_id', 2);
            // Filtrar por estado_proceso_id a través de la relación con personas
            $query->whereHas('personas', function ($query) {
                $query->where('estado_proceso_id', '!=', 1);
            });
            // Paginar los resultados
            $publicaciones = $query->paginate(5);
            // $publicaciones->appends(['search' => $request->input('search'), 'servicio' => $request->input('servicio')]);
            $pagination = $query->paginate(5);

            return response()->json([
                'respuesta' => true,
                'codigo' => 200,
                'mensaje' => 'Se cargaron satisfactoriamente los datos.',
                'publicaciones' => ListaPublicacionResource::collection($pagination),
                'links' => $pagination->linkCollection(),
                'meta' => [
                    'current_page' => $pagination->currentPage(),
                    'last_page' => $pagination->lastPage(),
                    'per_page' => $pagination->perPage(),
                    'total' => $pagination->total(),
                    'from' => $pagination->firstItem(),
                    'to' => $pagination->lastItem(),
                    'path' => $pagination->path(),
                    'links' => $pagination->linkCollection() // Esto incluye los enlaces de paginación

                ]
            ], 200);
            // return ListaPublicacionResource::collection($query->paginate(5));
        } catch (Error $e) {


            return response()->json([
                'respuesta' => false,
                'codigo' => 500,
                'mensaje' => 'Error en el servidor',
            ], 500);
        }
    }



    public function guardarComentarioLibre(Request $request)
    {

        $user = auth('api')->user();

        $publicacion_id_input = $request->input('publicacion_id');



        $user_id = $user->id;

        $validador = Validator::make($request->all(), [
            'publicacion_id' => 'required|exists:publicacions,id',

            'comentario' => 'required|string|min:5|max:100',
            'rating' => 'required|integer|between:1,5', // Assuming 'rating' should be an integer between 1 and 5

        ], [
            'comentario.required' => 'El comentario es obligatorio.',
            'comentario.max' => 'El comentario debe tener maximo 100 caracteres.',
            'comentario.min' => 'El comentario debe tener minimo 5 caracteres.',
            'rating.required' => 'La calificación es obligatoria.',
            'rating.integer' => 'La calificación debe ser un número entero.',
            'rating.between' => 'La calificación debe estar entre :min y :max.',
        ]);
        if ($validador->fails()) {
            return response()->json([
                'codigo' => 400,
                'respuesta' => false,
                'errores' => $validador->errors(),
            ], 400);
        }


        $publicacion = Publicacion::where('id', $publicacion_id_input)->first();


        // if ($publicacion <= 0) {
        //     return response()->json([
        //         'codigo' => 400,
        //         'respuesta' => false,
        //         'mensaje' => 'La publicación no existe.',
        //     ], 400);
        // }


        $codigo_aleatorio = Str::random(6);

        if ($user_id == $publicacion->persona_id) {

            return response()->json([
                'codigo' => 400,
                'respuesta' => false,
                'mensaje' => 'No puede comentar tu propia publicación.',
            ], 400);
        }

        $calificacion = new Calificacion();
        $calificacion->cliente_id = $user_id;
        $calificacion->persona_id = $publicacion->persona_id;
        $calificacion->publicacion_id = $publicacion->id;
        $calificacion->codigo_aleatorio = $codigo_aleatorio;

        $calificacion->comentario = $request->input('comentario');
        $calificacion->estado_proceso_id = 2;
        $calificacion->fecha_registrada = Carbon::now();
        $calificacion->valor = $request->input('rating');

        $calificacion->save();

        return response()->json([
            'respuesta' => true,
            'codigo' => 200,
            'mensaje' => 'Se registro su comentario correctamente.',
        ], 200);
    }


    public function obtenerListaTipoDocumentos()
    {
        try {
            // $user = auth('api')->user();
            $tipo_documentos = TipoDocumento::where('estado', 1)->take(6)->get();

            return response()->json([
                'respuesta' => true,
                'codigo' => 200,
                'mensaje' => 'Se cargaron satisfactoriamente los datos.',
                'data' => $tipo_documentos
            ], 200);
        } catch (Error $e) {


            return response()->json([
                'respuesta' => false,

                'codigo' => 500,
                'mensaje' => 'Error en el servidor',
            ], 500);
        }
    }
}
