<?php

namespace App\Http\Controllers;

use App\Models\EstadoProceso;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\TipoUtilidad;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioRegistradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:personas-registradas.index')->only('index');
        $this->middleware('can:personas-registradas.edit')->only('edit', 'update', 'validarProcesoDocumento','validarProcesoPersona','rechazarProcesoPersona');
        $this->middleware('can:personas-registradas.create')->only('create', 'store');
        $this->middleware('can:personas-registradas.show')->only('show');
        $this->middleware('can:personas-registradas.destroy')->only('destroy','activar');
    }

   
    public function index(Request $request)
    {
        $query = Persona::query();

        // Filtro por nombres
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('nombres', 'LIKE', "%$searchTerm%")
                    ->orWhereRaw("CONCAT(nombres,' ',apellido_paterno, ' ', apellido_materno) LIKE ?", ["%$searchTerm%"]);
            });
        }


        // Filtro por estado de proceso
        if ($request->has('estado_proceso_id')) {
            $estadoProcesoId = $request->input('estado_proceso_id');
            $query->where('estado_proceso_id', $estadoProcesoId);
        } elseif (!$request->has('search')) {
            // Condición para el inicio: estado_proceso_id igual a 1 cuando no hay parámetros de búsqueda
            $query->where('estado_proceso_id', 1);
        }

        $personas = $query->paginate(5);
        $personas->appends(['search' => $request->input('search'), 'estado_proceso_id' => $request->input('estado_proceso_id')]);

        $estados_procesos = EstadoProceso::get();

        return view('portal-usuarios.index', compact('personas', 'estados_procesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $persona = Persona::find($id);
        $roles = Role::where('guard_name', 'personas')->get();
        $tipo_utilidades = TipoUtilidad::get();

        return view('portal-usuarios.show', compact('persona', 'roles', 'tipo_utilidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updaterol(Request $request, string $id)
    {
        $persona = Persona::find($id);

        $request->validate([
            // 'roles' => 'required',
            'tipo_utilidad_id' => 'required'

        ]);
        
        $persona->estado_proceso_id = 2;
        $persona->tipo_utilidad_id = $request->input('tipo_utilidad_id');
        $persona->save();


        $persona->roles()->sync($request->roles);

        return redirect()->route('usuario-registrado.show', $persona->id);
    }

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

    public function validarProcesoDocumento(string $id)
    {

        $documento_persona = PersonaDocumento::find($id);
        $documento_persona->estado_proceso_id = 2;
        $documento_persona->save();

        return redirect()->route('usuario-registrado.show', $documento_persona->persona_id)->with('validado-documento', 'ok');
    }

    public function validarProcesoPersona(string $id)
    {

        $persona = Persona::find($id);
        $persona->estado_proceso_id = 2;
        $persona->save();

        $persona->roles()->sync([2, 3]);

        return redirect()->route('usuario-registrado.show', $persona->id)->with('validado-persona', 'ok');
    }


    public function rechazarProcesoPersona(string $id)
    {

        $persona = Persona::find($id);
        $persona->estado_proceso_id = 1;
        $persona->save();
        $persona->roles()->sync([2]);

        return redirect()->route('usuario-registrado.show', $persona->id)->with('validado-persona', 'ok');
    }

}
