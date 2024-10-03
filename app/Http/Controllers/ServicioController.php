<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\TipoServicio;
use App\Rules\UniqueServicioNombre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:servicios.index')->only('index');
        $this->middleware('can:servicios.edit')->only('edit', 'update', 'actualizarImagen');
        $this->middleware('can:servicios.create')->only('create', 'store');
        $this->middleware('can:servicios.show')->only('show');
        $this->middleware('can:servicios.destroy')->only('destroy','activar');
    }

    public function index(Request $request)
    {
        $tipoServicios = TipoServicio::where('estado', 1)->get();
        $query = Servicio::query();
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nombres', 'LIKE', "%$searchTerm%");
        }
        $servicios = $query->paginate(5);
        $servicios->appends(['search' => $request->input('search')]);
        return view('servicios.index', compact('servicios', 'tipoServicios'));
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
        $request->validate([
            'nombres' => ['required', new UniqueServicioNombre($request->tipo_servicio_id)],
            'tipo_servicio_id' => 'required',
            'slug' => 'required',
            'icono_url' => 'image'

        ], [
            'tipo_servicio_id.required' => 'Selecciones un Tipo De Servicio.',
            'nombres.required' => 'Ingrese la descripción del servicio.',
            'slug.required' => 'Es requerido El Slug',
            'icono_url.image' => 'El Icono deber ser una imagen'

        ]);


        $servicio = Servicio::create($request->all() + [
            // 'user_id' => Auth::user()->id
        ]);

        if ($request->file('icono_url')) {

            $ruta = Storage::put('public/servicios', $request->file('icono_url'));

            $servicio->icono_url = $ruta;
            $servicio->save();
        }

        return redirect()->route('servicio.index')->with('guardar', 'ok');
    }
    public function actualizarImagen(Request $request, Servicio $admin_servicio)
    {

        if ($request->file('icono_url')) {
            $ruta = Storage::put('public/servicios', $request->file('icono_url'));
            if ($admin_servicio->icono_url) {
                Storage::delete($admin_servicio->icono_url);
                $admin_servicio->icono_url = $ruta;
                $admin_servicio->save();
            } else {
                $admin_servicio->icono_url = $ruta;
                $admin_servicio->save();
            }
        }

        return redirect()->route('servicio.index')->with('actualizarFoto', 'ok');
    }
    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('portal.servicios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $admin_servicio)
    {
        $request->validate([
            // 'edit_nombre' => 'required',
            'edit_nombres' => ['required', new UniqueServicioNombre($request->edit_tipo_servicio_id)],
            'edit_tipo_servicio_id' => 'required',
            // 'edit_slug' => 'required|unique:servicios,slug,' . $admin_servicio->id,
            'edit_slug' => 'required',




        ], [
            // 'edit_nombre.required' => 'Ingrese el nombre de la cobertura.',
            'edit_nombres.required' => 'Ingrese la descripción de la especialidad.',
            'edit_tipo_servicio_id.required' => 'Selecciones un Tipo De Servicio.',
            'edit_slug.required' => 'Es requerido El Slug',
            'edit_slug.unique' => 'El nombre del Tipo Servicio no debe repetirse'
        ]);

        $admin_servicio->update([[
            // $servicio->nombres = $request->edit_nombre,
            $admin_servicio->tipo_servicio_id = $request->edit_tipo_servicio_id,
            $admin_servicio->nombres = $request->edit_nombres,
            $admin_servicio->slug = $request->edit_slug,
        ]]);

        return redirect()->route('servicio.index')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $admin_servicio)
    {
        $admin_servicio->estado = 2;
        $admin_servicio->save();

        return redirect()->route('servicio.index')->with('desactivar', 'ok');
    }

    public function activar(Servicio $admin_servicio)
    {
        $admin_servicio->estado = 1;
        $admin_servicio->save();
        return redirect()->route('servicio.index')->with('activar', 'ok');
    }
}
