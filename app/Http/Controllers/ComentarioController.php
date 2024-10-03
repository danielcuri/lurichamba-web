<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\EstadoProceso;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $query = Calificacion::query();
        if ($request->input('search')) {
            $search = $request->input('search');
            $query->where('comentario', 'LIKE', "%$search%");
        }
        if ($request->input('estado')) {
            $estado = $request->input('estado');
            $query->where('estado',  $estado);
        }

        $query->whereNotNull('comentario');
        $estados_procesos = EstadoProceso::get();
        $comentarios = $query->paginate(5);
        $comentarios->appends(['search' => $request->input('search'), 'estado' => $request->input('estado')]);

        return view('comentarios.index', compact('estados_procesos', 'comentarios'));
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
    public function show(string $id)
    {
        //
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
    public function destroy(Calificacion $comentario)
    {
        $comentario->estado = 2;
        $comentario->save();

        return redirect()->route('admin-comentario.index')->with('desactivar', 'ok');
    }

    public function activar(Calificacion $comentario)
    {
        $comentario->estado = 1;
        $comentario->save();
        return redirect()->route('admin-comentario.index')->with('activar', 'ok');
    }
}
