<?php

namespace App\Http\Controllers;

use App\Models\PersonaDocumento;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipoServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('can:tipo-servicios.index')->only('index');
        // $this->middleware('can:tipo-servicios.edit')->only('edit', 'update','actualizarImagen');
        // $this->middleware('can:tipo-servicios.create')->only('create', 'store');
        // $this->middleware('can:tipo-servicios.show')->only('show');
        // $this->middleware('can:tipo-servicios.destroy')->only('destroy','activar');
    }
    public function index(Request $request)
    {

        $query = TipoServicio::query();
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nombres', 'LIKE', "%$searchTerm%");
        }
        $tipoServicios = $query->paginate(5);
        $tipoServicios->appends(['search' => $request->input('search')]);


        return view('tipo-servicios.index', compact('tipoServicios'));
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
            'slug' => 'required|unique:tipo_servicios,slug',
            'icono_url' => 'image'

        ], [
            // 'nombres.required' => 'Ingrese el nombre de la categoria.',
            'nombres.required' => 'Ingrese el nombre del Tipo Servicio.',
            'slug.required' => 'Es requerido El Slug',
            'slug.unique' => 'El nombre del Tipo Servicio no debe repetirse',
            'icono_url.image' => 'El Icono deber ser una imagen'


        ]);


        $tipo_servicio = TipoServicio::create($request->all() + [
            // 'icono_url' => $ruta
        ]);

        if ($request->file('icono_url')) {
            $ruta = Storage::put('public/tipo_servicios', $request->file('icono_url'));
            $tipo_servicio->icono_url = $ruta;
            $tipo_servicio->save();
        }



        return redirect()->route('tipo-servicio.index')->with('guardar', 'ok');
    }

    public function actualizarImagen(Request $request, TipoServicio $tipo_servicio)
    {



        if ($request->file('icono_url')) {
            $ruta = Storage::put('public/tipo_servicios', $request->file('icono_url'));

            if ($tipo_servicio->icono_url) {
                Storage::delete($tipo_servicio->icono_url);
                $tipo_servicio->icono_url = $ruta;
                $tipo_servicio->save();
            } else {
                $tipo_servicio->icono_url = $ruta;
                $tipo_servicio->save();
            }
        }

        return redirect()->route('tipo-servicio.index')->with('actualizarFoto', 'ok');
    }
    /**
     * Display the specified resource.
     */
    public function show(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoServicio $tipo_servicio)
    {
        $request->validate([
            // 'edit_nombre' => 'required',
            'edit_nombres' => 'required',
            'edit_slug' => 'required|unique:tipo_servicios,slug,' . $tipo_servicio->id,

        ], [
            // 'edit_nombre.required' => 'Ingrese el nombre de la cobertura.',
            'edit_nombres.required' => 'Ingrese la descripción de la especialidad.',
            'edit_slug.required' => 'Es requerido El Slug',
            'edit_slug.unique' => 'El nombre del Tipo Servicio no debe repetirse'

        ]);

        $tipo_servicio->update([[
            // $tipo_servicio->nombres = $request->edit_nombre,
            $tipo_servicio->nombres = $request->edit_nombres,
            $tipo_servicio->slug = $request->edit_slug,

        ]]);

        return redirect()->route('tipo-servicio.index')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoServicio $tipo_servicio)
    {
        $tipo_servicio->estado = 2;
        $tipo_servicio->save();

        return redirect()->route('tipo-servicio.index')->with('desactivar', 'ok');
    }


    public function activar(TipoServicio $tipo_servicio)
    {
        $tipo_servicio->estado = 1;
        $tipo_servicio->save();
        return redirect()->route('tipo-servicio.index')->with('activar', 'ok');
    }
}
