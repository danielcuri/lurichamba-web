<?php

namespace App\Http\Controllers;

use App\Models\EstadoProceso;
use App\Models\Publicacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('can:solicitudes-publicacion.index')->only('index');
        $this->middleware('can:solicitudes-publicacion.edit')->only('edit', 'update', 'validarProcesoPublicacion','rechazarProcesoPublicacion');
        $this->middleware('can:solicitudes-publicacion.create')->only('create', 'store');
        $this->middleware('can:solicitudes-publicacion.show')->only('show');
        $this->middleware('can:solicitudes-publicacion.destroy')->only('destroy','activar');
    }
    public function index(Request $request)
    {
        $query = Publicacion::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('descripcion','LIKE', "%$search%");
        }

        // Filtro por estado de proceso
        if ($request->has('estado_proceso_id')) {
            $estado_proceso = $request->input('estado_proceso_id');
            $query->where('estado_proceso_id', $estado_proceso);
        }elseif (!$request->has('search')) {
            // Condición para el inicio: estado_proceso_id igual a 1 cuando no hay parámetros de búsqueda
            $query->where('estado_proceso_id', 1);
        }

        $solicitudes = $query->paginate(5);
        $solicitudes->appends(['search' => $request->input('search'), 'estado_proceso_id' => $request->input('estado_proceso_id')]);
        $estados_procesos = EstadoProceso::get();
        
        return view('solicitudes.index', compact('solicitudes','estados_procesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Publicacion $admin_solicitude)
    {
        // $solicitud = Publicacion::find($id);
        $solicitud = $admin_solicitude;

        return view('solicitudes.show', compact('solicitud'));
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

    public function validarProcesoPublicacion(Publicacion $solicitud)
    {

        $solicitud = $solicitud;
        $solicitud->estado_proceso_id = 2;
        $solicitud->fecha_publicacion = Carbon::now();

        $solicitud->save();

        return redirect()->route('solicitud.show', $solicitud)->with('validado', 'ok');
    }

    public function rechazarProcesoPublicacion(Publicacion $solicitud)
    {

        $solicitud = $solicitud;
        $solicitud->estado_proceso_id = 1;
        $solicitud->save();

        return redirect()->route('solicitud.show', $solicitud)->with('rechazado', 'ok');
    }
}
