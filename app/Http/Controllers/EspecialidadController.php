<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth');
        // $this->middleware('can:especialidades.index')->only('index');
        // $this->middleware('can:especialidades.edit')->only('edit', 'update');
        // $this->middleware('can:especialidades.create')->only('create', 'store');
        // $this->middleware('can:especialidades.show')->only('show');
        // $this->middleware('can:especialidades.destroy')->only('destroy','activar');
     }


    public function index(Request $request)
    {
        $query = Especialidad::query();
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nombres', 'LIKE', "%$searchTerm%");
        }
        $especialidades = $query->paginate(5);
        $especialidades->appends(['search' => $request->input('search')]);


        return view('especialidades.index', compact('especialidades'));
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
        $request->validate([
            // 'nombres' => 'required',
            'nombres' => 'required',
        ], [
            // 'nombres.required' => 'Ingrese el nombre de la categoria.',
            'nombres.required' => 'Ingrese el nombre de la Especialidad.',
        ]);
        Especialidad::create($request->all() + [
            // 'user_id' => Auth::user()->id
        ]);
        return redirect()->route('especialidad.index')->with('guardar', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            // 'edit_nombre' => 'required',
            'edit_nombres' => 'required',
        ], [
            // 'edit_nombre.required' => 'Ingrese el nombre de la cobertura.',
            'edit_nombres.required' => 'Ingrese la descripción de la especialidad.',
        ]);

        $especialidad->update([[
            // $especialidad->nombres = $request->edit_nombre,
            $especialidad->nombres = $request->edit_nombres,
        ]]);

        return redirect()->route('especialidad.index')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidad $especialidad)
    {
        $especialidad->estado = 2;
        $especialidad->save();

        return redirect()->route('especialidad.index')->with('desactivar', 'ok');
    }
    public function activar(Especialidad $especialidad)
    {
        $especialidad->estado = 1;
        $especialidad->save();
        return redirect()->route('especialidad.index')->with('activar', 'ok');
    }
}
