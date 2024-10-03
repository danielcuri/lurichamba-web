<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\TipoServicio;
use Illuminate\Http\Request;

class PortalServicioController extends Controller
{

    public function index(Request $request)
    {
        $query = Publicacion::query();

        // Filtrar por nombre
        if ($request->has('search')) {
            $nombre = $request->input('search');
            $query->where('nombres', 'like', "%$nombre%");
        }
        if ($request->input('categoria')) {
            $tipo_servicio = $request->input('categoria');
            $id_tipo_servicio = TipoServicio::where('slug', $tipo_servicio)->first();


            $query->where('tipo_servicio_id', $id_tipo_servicio->id ?? '');
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
        $publicaciones->appends(['search' => $request->input('search'), 'servicio' => $request->input('servicio')]);

        // Obtener la lista de servicios
        $servicios = Servicio::where('estado', 1)->get();


        $cantidad_publicaciones = Publicacion::where('estado_proceso_id', 2)->whereHas('personas', function ($query) {
            $query->where('estado_proceso_id', '!=', 1);
        })->count();

        // return $cantidad_publicaciones;

        return view('portal.servicios.index', compact('servicios', 'publicaciones', 'cantidad_publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portal.servicios.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Publicacion $servicio)
    {
        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id ?? '';

        $publicacion = $servicio;
        // $publicacion = Publicacion::find($id);


        $calificaciones = Calificacion::where('publicacion_id', $publicacion->id)->where('estado_proceso_id', 2)->where('estado', 1)->paginate(2, ['*'], 'calificaciones_page');

        $calificaciones_pendientes = Calificacion::where('publicacion_id', $publicacion->id)->where('estado_proceso_id', 1)->where('cliente_id', $user)->where('estado', 1)->get();


        $promedioValoraciones = round($publicacion->calificaciones->where('estado_proceso_id', 2)->where('estado', 1)->avg('valor'));

        // dd($promedioValoraciones);


        // dd($promedioValoraciones);





        return view('portal.servicios.show', compact('publicacion', 'calificaciones', 'calificaciones_pendientes', 'promedioValoraciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
