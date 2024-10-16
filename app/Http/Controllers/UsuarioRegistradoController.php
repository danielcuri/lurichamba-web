<?php

namespace App\Http\Controllers;

use App\Models\EstadoProceso;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\PersonExtraInformation;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\TipoDocumentacion;
use App\Models\TipoDocumento;
use App\Models\TipoServicio;
use App\Models\TipoUtilidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UsuarioRegistradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:personas-registradas.index')->only('index');
        // $this->middleware('can:personas-registradas.edit')->only('edit', 'update', 'validarProcesoDocumento', 'validarProcesoPersona', 'rechazarProcesoPersona');
        // $this->middleware('can:personas-registradas.create')->only('create', 'store');
        // $this->middleware('can:personas-registradas.show')->only('show');
        // $this->middleware('can:personas-registradas.destroy')->only('destroy', 'activar');
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

        $query->where('estado_proceso_id', 2);

        $personas = $query->orderBy('personas.id', 'desc')->paginate(10);
        $personas->appends(['search' => $request->input('search'), 'estado_proceso_id' => $request->input('estado_proceso_id')]);

        $estados_procesos = EstadoProceso::get();

        return view('portal-usuarios.index', compact('personas', 'estados_procesos'));
    }

    /**
     * Show the form for creating a new resource.
     */

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

        $tipo_documentacions = TipoDocumentacion::where('estado', 1)->get();

        $persona_extra = PersonExtraInformation::where('persona_id', $id)->first();


        return view('portal-usuarios.show', compact('persona', 'roles', 'tipo_utilidades', 'persona_extra', 'tipo_documentacions'));
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

        $persona = Persona::find($id);

        $tipo_documentos = TipoDocumento::where('estado', 1)->get();
        $persona_extra = PersonExtraInformation::where('persona_id', $id)->first();


        $sexos = ['MASCULINO', 'FEMENINO'];

        $distritos = ['LURIGANCHO', 'COMAS'];
        $comunas = ['COMUNA 01', 'COMUNA 02', 'COMUNA 03', 'COMUNA 04', 'COMUNA 05', 'COMUNA 06', 'COMUNA 07', 'COMUNA 08', 'COMUNA 09', 'COMUNA 10', 'COMUNA 11', 'COMUNA 12', 'COMUNA 13', 'COMUNA 14', 'COMUNA 15', 'COMUNA 16', 'COMUNA 17', 'COMUNA 18'];

        $tipo_nucleos = ['URBANIZCION', 'PUEBLO JOVEN', 'UNIDAD VECINAL', 'CONJUNTO HABITACIONAL', 'ASENTAMIENTO', 'COOPERATIVA', 'RESIDENCIAL', 'GRUPO', 'CENTRO POBLADO', 'FUNDO', 'OTROS'];

        $tipo_vias = ['AVENIDA', 'JIRON', 'CALLE', 'PASAJE', 'ALAMEDA', 'MALECON', 'OVALO', 'PARQUE', 'PLAZA', 'CARRETERA', 'BLOCK', 'OTROS'];

        $tipo_organizaciones = ['PERSONA NATURAL SIN NEGOCIO'];

        $grados = ['PPRIMARIA', 'SECUNDARIA', 'TECNICO SUPERIOR', 'UNIVERSITARIO', 'ESTUDIANTE'];

        $tipo_comprobantes = ['RECIBO POR HONORARIOS', 'BOLETA', 'FACTURA', 'NINGUNO'];
        $tipo_emisiones = ['FISICO', 'DIGITAL', 'NINGUNO'];
        $tipo_servicios = TipoServicio::where('estado', 1)->get();

        return view('portal-usuarios.edit', compact(
            'persona',
            'tipo_documentos',
            'sexos',
            'distritos',
            'tipo_organizaciones',
            'comunas',
            'tipo_vias',
            'tipo_nucleos',
            'grados',
            'tipo_comprobantes',
            'tipo_emisiones',
            'tipo_servicios',
            'persona_extra'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los campos
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|max:15|unique:personas,numero_documento,' . $id,
            'numero_celular' => 'required|min:9|max:15',
            'ruc' => 'required|size:11|unique:personas,ruc,' . $id,
            'nombres' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'direccion_fiscal' => 'required|max:255',
            'email' => 'required|email|max:255|unique:personas,email,' . $id,

            'distrito' => 'required',
            'comuna' => 'required',
            'coordenadas_geograficas' => 'required',
            'tipo_nucleo' => 'required',
            'nombre_asentamiento_humano' => 'required',
            'tipo_via' => 'required',
            'nombre_via' => 'required',
            'numeracion' => 'required',
            'tipo_organizacion' => 'required',
            'sexo' => 'required', // Ejemplo con valores posibles para sexo
            'fecha_nacimiento' => 'required|date',
            'es_discapacidad' => 'required',
            'grado_estudios' => 'required',
            'centro_estudios' => 'required',
            'tipo_comprobante' => 'required',
            'tipo_emision' => 'required',
            'es_local_fisico' => 'required',
            'es_licencia' => 'required',
        ], [
            'tipo_documento_id.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'numero_documento.required' => 'El número de documento es obligatorio.',
            'numero_documento.max' => 'El número de documento no debe exceder los 15 caracteres.',
            'numero_documento.unique' => 'El número de documento ya está registrado.',
            'numero_celular.required' => 'El número de celular es obligatorio.',
            'numero_celular.min' => 'El número de celular debe tener al menos 9 caracteres.',
            'numero_celular.max' => 'El número de celular no debe exceder los 15 caracteres.',
            'ruc.required' => 'El RUC es obligatorio.',
            'ruc.size' => 'El RUC debe tener exactamente 11 caracteres.',
            'ruc.unique' => 'El RUC ya está registrado.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'nombres.max' => 'Los nombres no deben exceder los 255 caracteres.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_paterno.max' => 'El apellido paterno no debe exceder los 255 caracteres.',
            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'apellido_materno.max' => 'El apellido materno no debe exceder los 255 caracteres.',
            'direccion_fiscal.required' => 'La dirección fiscal es obligatoria.',
            'direccion_fiscal.max' => 'La dirección fiscal no debe exceder los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'distrito.required' => 'El distrito es obligatorio.',
            'comuna.required' => 'La comuna es obligatoria.',
            'coordenadas_geograficas.required' => 'Las coordenadas geográficas son obligatorias.',
            'tipo_nucleo.required' => 'El tipo de núcleo es obligatorio.',
            'nombre_asentamiento_humano.required' => 'El nombre del asentamiento humano es obligatorio.',
            'tipo_via.required' => 'El tipo de vía es obligatorio.',
            'nombre_via.required' => 'El nombre de la vía es obligatorio.',
            'numeracion.required' => 'La numeración es obligatoria.',
            'tipo_organizacion.required' => 'El tipo de organización es obligatorio.',
            'sexo.required' => 'El sexo es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no es válida.',
            'es_discapacidad.required' => 'El campo de discapacidad es obligatorio.',
            'grado_estudios.required' => 'El grado de estudios es obligatorio.',
            'centro_estudios.required' => 'El centro de estudios es obligatorio.',
            'tipo_comprobante.required' => 'El tipo de comprobante es obligatorio.',
            'tipo_emision.required' => 'El tipo de emisión es obligatorio.',
            'es_local_fisico.required' => 'El campo Si tiene local fisico es obligatorio.',
            'es_licencia.required' => 'El campo Si tiene local licencia es obligatorio.',
        ]);

        $tipo_documento_id = $request->input('tipo_documento_id');
        $numero_documento = $request->input('numero_documento');
        $numero_celular = $request->input('numero_celular');
        $ruc = $request->input('ruc');
        $nombres = $request->input('nombres');
        $apellido_paterno = $request->input('apellido_paterno');
        $apellido_materno = $request->input('apellido_materno');
        $direccion_fiscal = $request->input('direccion_fiscal');
        $email = $request->input('email');

        $persona = Persona::find($id);

        $persona->tipo_documento_id = $tipo_documento_id;
        $persona->numero_documento = $numero_documento;
        $persona->numero_celular = $numero_celular;
        $persona->ruc = $ruc;
        $persona->nombres = $nombres;
        $persona->apellido_paterno = $apellido_paterno;
        $persona->apellido_materno = $apellido_materno;
        $persona->direccion_fiscal = $direccion_fiscal;
        $persona->email = $email;
        $persona->save();

        $distrito = $request->input('distrito');
        $comuna = $request->input('comuna');
        $coordenadas_geograficas = $request->input('coordenadas_geograficas');
        $tipo_nucleo = $request->input('tipo_nucleo');
        $nombre_asentamiento_humano = $request->input('nombre_asentamiento_humano');
        $tipo_via = $request->input('tipo_via');
        $nombre_via = $request->input('nombre_via');
        $numeracion = $request->input('numeracion');
        $tipo_organizacion = $request->input('tipo_organizacion');
        $sexo = $request->input('sexo');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $es_discapacidad = $request->input('es_discapacidad');
        $grado_estudios = $request->input('grado_estudios');
        $centro_estudios = $request->input('centro_estudios');
        $tipo_comprobante = $request->input('tipo_comprobante');
        $tipo_emision = $request->input('tipo_emision');
        $es_local_fisico = $request->input('es_local_fisico');
        $es_licencia = $request->input('es_licencia');


        $persona_extra = PersonExtraInformation::where('persona_id', $id)->first();

        if ($persona_extra) {
            $persona_extra->distrito = $distrito;
            $persona_extra->comuna = $comuna;
            $persona_extra->coordenadas_geograficas = $coordenadas_geograficas;
            $persona_extra->tipo_nucleo = $tipo_nucleo;
            $persona_extra->nombre_asentamiento_humano = $nombre_asentamiento_humano;
            $persona_extra->tipo_via = $tipo_via;
            $persona_extra->nombre_via = $nombre_via;
            $persona_extra->numeracion = $numeracion;
            $persona_extra->tipo_organizacion = $tipo_organizacion;
            $persona_extra->sexo = $sexo;
            $persona_extra->fecha_nacimiento = $fecha_nacimiento;
            $persona_extra->es_discapacidad = $es_discapacidad;
            $persona_extra->grado_estudios = $grado_estudios;
            $persona_extra->centro_estudios = $centro_estudios;
            $persona_extra->tipo_comprobante = $tipo_comprobante;
            $persona_extra->tipo_emision = $tipo_emision;
            $persona_extra->es_local_fisico = $es_local_fisico;
            $persona_extra->es_licencia = $es_licencia;
            $persona_extra->numero_ruc = $ruc;
            $persona_extra->save();
        } else {


            $persona_extrai = new PersonExtraInformation();
            $persona_extrai->distrito = $distrito;
            $persona_extrai->comuna = $comuna;
            $persona_extrai->coordenadas_geograficas = $coordenadas_geograficas;
            $persona_extrai->tipo_nucleo = $tipo_nucleo;
            $persona_extrai->nombre_asentamiento_humano = $nombre_asentamiento_humano;
            $persona_extrai->tipo_via = $tipo_via;
            $persona_extrai->nombre_via = $nombre_via;
            $persona_extrai->numeracion = $numeracion;
            $persona_extrai->tipo_organizacion = $tipo_organizacion;
            $persona_extrai->sexo = $sexo;
            $persona_extrai->fecha_nacimiento = $fecha_nacimiento;
            $persona_extrai->es_discapacidad = $es_discapacidad;
            $persona_extrai->grado_estudios = $grado_estudios;
            $persona_extrai->centro_estudios = $centro_estudios;
            $persona_extrai->tipo_comprobante = $tipo_comprobante;
            $persona_extrai->tipo_emision = $tipo_emision;
            $persona_extrai->es_local_fisico = $es_local_fisico;
            $persona_extrai->es_licencia = $es_licencia;
            $persona_extrai->numero_ruc = $ruc;
            $persona_extra->persona_id = $persona->id;
            $persona_extrai->save();
        }

        return redirect()->route('usuario-registrado.index')->with('persona-actualiza', 'ok');
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

    public function create()
    {


        $tipo_documentos = TipoDocumento::where('estado', 1)->get();


        $sexos = ['MASCULINO', 'FEMENINO'];

        $distritos = ['LURIGANCHO', 'COMAS'];
        $comunas = ['COMUNA 01', 'COMUNA 02', 'COMUNA 03', 'COMUNA 04', 'COMUNA 05', 'COMUNA 06', 'COMUNA 07', 'COMUNA 08', 'COMUNA 09', 'COMUNA 10', 'COMUNA 11', 'COMUNA 12', 'COMUNA 13', 'COMUNA 14', 'COMUNA 15', 'COMUNA 16', 'COMUNA 17', 'COMUNA 18'];

        $tipo_nucleos = ['URBANIZCION', 'PUEBLO JOVEN', 'UNIDAD VECINAL', 'CONJUNTO HABITACIONAL', 'ASENTAMIENTO', 'COOPERATIVA', 'RESIDENCIAL', 'GRUPO', 'CENTRO POBLADO', 'FUNDO', 'OTROS'];

        $tipo_vias = ['AVENIDA', 'JIRON', 'CALLE', 'PASAJE', 'ALAMEDA', 'MALECON', 'OVALO', 'PARQUE', 'PLAZA', 'CARRETERA', 'BLOCK', 'OTROS'];

        $tipo_organizaciones = ['PERSONA NATURAL SIN NEGOCIO'];

        $grados = ['PPRIMARIA', 'SECUNDARIA', 'TECNICO SUPERIOR', 'UNIVERSITARIO', 'ESTUDIANTE'];

        $tipo_comprobantes = ['RECIBO POR HONORARIOS', 'BOLETA', 'FACTURA', 'NINGUNO'];
        $tipo_emisiones = ['FISICO', 'DIGITAL', 'NINGUNO'];
        $tipo_servicios = TipoServicio::where('estado', 1)->get();

        return view(
            'portal-usuarios.create',
            compact(
                'tipo_documentos',
                'sexos',
                'distritos',
                'tipo_organizaciones',
                'comunas',
                'tipo_vias',
                'tipo_nucleos',
                'grados',
                'tipo_comprobantes',
                'tipo_emisiones',
                'tipo_servicios'
            )
        );
    }

    public function getServicios(Request $request)
    {
        $servicios = Servicio::where('tipo_servicio_id', $request->area_id)
            ->get();

        if (count($servicios) > 0) {
            return response()->json($servicios);
        }
    }


    public function guardarPersona(Request $request)
    {


        $tipo_utilidad_id = $request->input('tipo_utilidad_id') ?? 1;
        $aceptacion_termino = $request->input('aceptacion_termino') ?? 1;
        $estado_proceso_id = $request->input('estado_proceso_id') ?? 2;


        $tipo_documento_id = $request->input('tipo_documento_id');
        $numero_documento = $request->input('numero_documento');
        $numero_celular = $request->input('numero_celular');
        $ruc = $request->input('ruc');
        $nombres = $request->input('nombres');
        $apellido_paterno = $request->input('apellido_paterno');
        $apellido_materno = $request->input('apellido_materno');
        $direccion_fiscal = $request->input('direccion_fiscal');
        $email = $request->input('email');
        $password = $request->input('password');








        $distrito = $request->input('distrito');
        $comuna = $request->input('comuna');
        $coordenadas_geograficas = $request->input('coordenadas_geograficas');
        $tipo_nucleo = $request->input('tipo_nucleo');
        $nombre_asentamiento_humano = $request->input('nombre_asentamiento_humano');
        $tipo_via = $request->input('tipo_via');
        $nombre_via = $request->input('nombre_via');
        $numeracion = $request->input('numeracion');
        $tipo_organizacion = $request->input('tipo_organizacion');
        $sexo = $request->input('sexo');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $es_discapacidad = $request->input('es_discapacidad');
        $grado_estudios = $request->input('grado_estudios');
        $centro_estudios = $request->input('centro_estudios');
        $tipo_comprobante = $request->input('tipo_comprobante');
        $tipo_emision = $request->input('tipo_emision');
        $es_local_fisico = $request->input('es_local_fisico');
        $es_licencia = $request->input('es_licencia');




        $persona = new Persona();
        $persona->tipo_utilidad_id = $tipo_utilidad_id;
        $persona->aceptacion_termino = $aceptacion_termino;
        $persona->estado_proceso_id = $estado_proceso_id;
        $persona->tipo_documento_id = $tipo_documento_id;
        $persona->numero_documento = $numero_documento;
        $persona->numero_celular = $numero_celular;
        $persona->ruc = $ruc;
        $persona->nombres = $nombres;
        $persona->apellido_paterno = $apellido_paterno;
        $persona->apellido_materno = $apellido_materno;
        $persona->direccion_fiscal = $direccion_fiscal;
        $persona->email = $email;
        $persona->password = $password;
        $persona->save();
        $persona->roles()->sync([2, 3]);


        $archivo_discapacidad = $request->file('archivo_discapacidad');
        $file_estudio = $request->file('file_estudio');
        $file_certificado_unico = $request->file('file_certificado_unico');
        $file_ficha_ruc = $request->file('file_ficha_ruc');
        $file_licencia = $request->file('file_licencia');




        if ($archivo_discapacidad) {
            $ruta_archivo_discapacidad = Storage::put('public/documento_persona', $archivo_discapacidad);
            $documento_persona_discapacidad = new PersonaDocumento();
            $documento_persona_discapacidad->persona_id = $persona->id;
            $documento_persona_discapacidad->tipo_documentacion_id = 5;
            $documento_persona_discapacidad->url_documento = $ruta_archivo_discapacidad;
            $documento_persona_discapacidad->estado_proceso_id = 2;

            $documento_persona_discapacidad->save();
        }

        if ($file_estudio) {
            $ruta_file_estudio = Storage::put('public/documento_persona', $file_estudio);
            $documento_persona_file_estudio = new PersonaDocumento();
            $documento_persona_file_estudio->persona_id = $persona->id;
            $documento_persona_file_estudio->tipo_documentacion_id = 6;
            $documento_persona_file_estudio->url_documento = $ruta_file_estudio;
            $documento_persona_file_estudio->estado_proceso_id = 2;

            $documento_persona_file_estudio->save();
        }
        if ($file_certificado_unico) {
            $ruta_file_certificado_unico = Storage::put('public/documento_persona', $file_certificado_unico);
            $documento_persona_file_certificado_unico = new PersonaDocumento();
            $documento_persona_file_certificado_unico->persona_id = $persona->id;
            $documento_persona_file_certificado_unico->tipo_documentacion_id = 1;
            $documento_persona_file_certificado_unico->url_documento = $ruta_file_certificado_unico;
            $documento_persona_file_certificado_unico->estado_proceso_id = 2;
            $documento_persona_file_certificado_unico->save();
        }
        if ($file_ficha_ruc) {
            $ruta_file_ficha_ruc = Storage::put('public/documento_persona', $file_ficha_ruc);
            $documento_persona_file_ficha_ruc = new PersonaDocumento();
            $documento_persona_file_ficha_ruc->persona_id = $persona->id;
            $documento_persona_file_ficha_ruc->tipo_documentacion_id = 7;
            $documento_persona_file_ficha_ruc->url_documento = $ruta_file_ficha_ruc;

            $documento_persona_file_ficha_ruc->estado_proceso_id = 2;

            $documento_persona_file_ficha_ruc->save();
        }

        if ($file_licencia) {
            $ruta_file_licencia = Storage::put('public/documento_persona', $file_licencia);
            $documento_persona_file_licencia = new PersonaDocumento();
            $documento_persona_file_licencia->persona_id = $persona->id;
            $documento_persona_file_licencia->tipo_documentacion_id = 8;
            $documento_persona_file_licencia->estado_proceso_id = 2;

            $documento_persona_file_licencia->url_documento = $ruta_file_licencia;
            $documento_persona_file_licencia->save();
        }

        $persona_extra = new PersonExtraInformation();
        $persona_extra->distrito = $distrito;
        $persona_extra->comuna = $comuna;
        $persona_extra->coordenadas_geograficas = $coordenadas_geograficas;
        $persona_extra->tipo_nucleo = $tipo_nucleo;
        $persona_extra->nombre_asentamiento_humano = $nombre_asentamiento_humano;
        $persona_extra->tipo_via = $tipo_via;
        $persona_extra->nombre_via = $nombre_via;
        $persona_extra->numeracion = $numeracion;
        $persona_extra->tipo_organizacion = $tipo_organizacion;
        $persona_extra->sexo = $sexo;
        $persona_extra->fecha_nacimiento = $fecha_nacimiento;
        $persona_extra->es_discapacidad = $es_discapacidad;
        $persona_extra->grado_estudios = $grado_estudios;
        $persona_extra->centro_estudios = $centro_estudios;
        $persona_extra->tipo_comprobante = $tipo_comprobante;
        $persona_extra->tipo_emision = $tipo_emision;
        $persona_extra->es_local_fisico = $es_local_fisico;
        $persona_extra->es_licencia = $es_licencia;
        $persona_extra->persona_id = $persona->id;

        $persona_extra->numero_ruc = $ruc;

        $persona_extra->save();





        ///GUARDAR SERVICIO DE PERSONA

        $nombre_servicio_input = $request->input('nombre_servicio');
        $servicio_id_input = $request->input('servicio_id');
        $descripcion_servicio_input = $request->input('descripcion_servicio');
        $codigo_aleatorio = Str::random(6);
        $slug = Str::slug($nombre_servicio_input);
        $slug_codigo = $slug . "-" . $codigo_aleatorio;
        $servicio = Servicio::where('id', $servicio_id_input)->first();
        $tipo_servicio = TipoServicio::where('id', $servicio->tipo_servicio_id)->first();
        $publicacion = Publicacion::create([
            'codigo_aleatorio' => $codigo_aleatorio,
            'slug' => $slug_codigo,
            'persona_id' => $persona->id,
            'servicio_id' => $servicio_id_input,
            'tipo_servicio_id' => $tipo_servicio->id,
            'nombres' => strtoupper($nombre_servicio_input),
            'descripcion' => strtoupper($descripcion_servicio_input),
            'fecha_registrada' => Carbon::now(),
            'estado_proceso_id' => 2,

            ///SE AGREGO PORQUE AHORA ES DIRECTO
            'fecha_publicacion' => Carbon::now(),
        ]);







        return redirect()->route('usuario-registrado.index')->with('persona-guardada', 'ok');
    }


    public function verServicios(string $id)
    {

        $persona = Persona::find($id);
        $tipo_servicios = TipoServicio::where('estado', 1)->get();
        $servicios = Servicio::where('estado', 1)->get();


        return view('portal-usuarios.servicios.index', compact('persona', 'tipo_servicios', 'servicios'));
    }


    public function guardarServicioPersona(Request $request)
    {

        $persona_id = $request->input('persona_id');
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'nombre_servicio' => 'required',
            'descripcion_servicio' => 'required'
        ], [
            'servicio_id.required' => 'El campo Servicio es requerido',
            'servicio_id.exists' => 'El Servicio seleccionado no es válido',
            'nombre_servicio.required' => 'El campo Nombre es requerido',
            'descripcion_servicio.required' => 'El campo Descripcion es requerido'
        ]);

        $nombre_servicio_input = $request->input('nombre_servicio');
        $servicio_id_input = $request->input('servicio_id');
        $descripcion_servicio_input = $request->input('descripcion_servicio');
        $codigo_aleatorio = Str::random(6);
        $slug = Str::slug($nombre_servicio_input);
        $slug_codigo = $slug . "-" . $codigo_aleatorio;
        $servicio = Servicio::where('id', $servicio_id_input)->first();
        $tipo_servicio = TipoServicio::where('id', $servicio->tipo_servicio_id)->first();
        $publicacion = Publicacion::create([
            'codigo_aleatorio' => $codigo_aleatorio,
            'slug' => $slug_codigo,
            'persona_id' => $persona_id,
            'servicio_id' => $servicio_id_input,
            'tipo_servicio_id' => $tipo_servicio->id,
            'nombres' => strtoupper($nombre_servicio_input),
            'descripcion' => strtoupper($descripcion_servicio_input),
            'fecha_registrada' => Carbon::now(),
            'estado_proceso_id' => 2,

            ///SE AGREGO PORQUE AHORA ES DIRECTO
            'fecha_publicacion' => Carbon::now(),
        ]);







        return redirect()->route('usuario-registrado.servicios', $persona_id)->with('persona-guardada', 'ok');
    }

    public function actualizarPublicacion(Request $request, string $id)
    {
        $publicacion = Publicacion::find($id);

        $request->validate([
            'edit_servicioid' => 'required|exists:servicios,id',
            'edit_nombres' => 'required',
            'edit_descripcion' => 'required'
        ], [
            'servicio.required' => 'El campo Servicio es requerido',
            'servicio.exists' => 'El Servicio seleccionado no es válido',
            'edit_nombres.required' => 'El campo Nombre es requerido',
            'edit_descripcion.required' => 'El campo Descripcion es requerido'
        ]);


        $nombre_servicio_input = $request->input('edit_nombres');
        $servicio_id_input = $request->input('edit_servicioid');
        $descripcion_servicio_input = $request->input('edit_descripcion');


        $codigo_aleatorio = $publicacion->codigo_aleatorio;
        $slug = Str::slug($nombre_servicio_input);
        $slug_codigo = $slug . "-" . $codigo_aleatorio;


        $servicio = Servicio::where('id', $servicio_id_input)->first();
        $tipo_servicio = TipoServicio::where('id', $servicio->tipo_servicio_id)->first();

        $publicacion->update([
            'slug' => $slug_codigo,
            'servicio_id' => $servicio_id_input,
            'tipo_servicio_id' => $tipo_servicio->id,
            'nombres' => strtoupper($nombre_servicio_input),
            'descripcion' => strtoupper($descripcion_servicio_input),
            //SE COMENTO PORQUE NO HAY NINGUN PROCESO DE VALIDACION

            //SE VOLVIO HABILITAR 
            'estado_proceso_id' => 2
        ]);

        return redirect()->route('usuario-registrado.servicios', $publicacion->persona_id)->with('persona-guardada', 'ok');
    }

    public function guardarDocumento(Persona $persona, Request $request)
    {

        $request->validate(
            [
                'tipo_documentacion_id' => 'required', // Campo de archivo requerido

                'documento' => 'required|file|mimes:pdf|max:1024', // Campo de archivo requerido

            ],
            [
                'tipo_documentacion_id.required' => 'Seleccione un Tipo De Documentación',

                'documento.required' => 'El archivo es requerido',
                'documento.mimes' => 'El archivo debe ser de tipo PDF',
                'documento.max' => 'El archivo debe pesar menos de 1MB',

            ]

        );

        $ruta = Storage::put('public/documento_persona', $request->file('documento'));

        $documento_persona = PersonaDocumento::create([
            'persona_id' => $persona->id,
            'tipo_documentacion_id' => $request->input('tipo_documentacion_id'),
            'url_documento' => $ruta,
        ]);


        return redirect()->back()->with('guardar-documento', 'actualizar');
    }

    public function actualizarDocumento(Request $request, PersonaDocumento $documento)
    {
        $request->validate([
            'documento' => 'required|mimes:pdf|max:1024',
        ], [
            'documento.required' => 'El PDF es requerida',
            'documento.mimes' => 'El documento debe ser tipo "pdf"',
            'documento.max' => 'El peso máximo de la foto debe ser de 1MB'
        ]);

        if ($request->file('documento')) {




            $ruta = Storage::put('public/documento_persona', $request->file('documento'));
            // $persona->foto = $ruta;
            // $persona->save();
            if ($documento->url_documento) {
                Storage::delete($documento->url_documento);
                $documento->url_documento = $ruta;
                $documento->save();
            } else {
                $documento->url_documento = $ruta;
                $documento->save();
            }
        }

        return redirect()->back()->with('actualizar-documento', 'actualizar');
    }
}
