<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\Publicacion;
use App\Models\TipoDocumento;
use App\Models\TipoServicio;
use App\Models\Servicio;
use App\Models\TipoDocumentacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Providers\BroadcastServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Str;

class PortalAdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $persona;
    protected $publicacion;
    protected $personaDocumento;
    protected $tipoServicios;

    // public function __construct()
    // {
    //     $this->middleware('persona.auth');
    // }

    public function __construct(Persona $persona, Publicacion $publicacion, PersonaDocumento $personaDocumento, TipoServicio $tipoServicios)
    {
        $this->middleware('persona.auth');


        $this->persona = $persona;
        $this->publicacion = $publicacion;
        $this->personaDocumento = $personaDocumento;
        $this->tipoServicios = $tipoServicios;



        ///OFRECEDOR
        $this->middleware('can:perfil.index')->only('perfil', 'perfilEditar', 'perfilActualizar');
        $this->middleware('can:servicios.index')->only('misServicios');
        $this->middleware('can:credenciales.index')->only('cambiarCredenciales', 'updateCredenciales');
        $this->middleware('can:documentos.index')->only('misDocumentos', 'registrarDocumentos', 'guardarDocumentos');
        $this->middleware('can:foto.update')->only('subirFoto');


        //OFRECEDOR  - VALIDADO
        $this->middleware('can:servicios.registrar')->only('getAreas', 'publicarServicios', 'editarPublicacion', 'actualizarPublicacion');
        $this->middleware('can:comentarios-ofrecedor.registrar')->only('indexClientes', 'agregaClientes', 'guardarClientes');

        //CONTRATATADOR VALIDADO
        $this->middleware('can:comentarios-contrata.index')->only('indexClienteComentarios');
        $this->middleware('can:comentarios-contrata.registrar')->only('agregarClienteComentarios');
    }


    public function index(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;

        $datos = $this->publicacion->traerPublicaciones($user);

        return view('portal.usuario.index', compact('datos'));
    }


    public function actualizarOfrecerServicio(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $persona = $this->persona->encontrarPersona($id);

        $persona->update([
            'estado_proceso_id' => 3
        ]);
        // $persona->roles()->sync([2]);
        session(['usuario' => $persona]);

        return redirect()->route('usuario-portal.index')->with('ofrecer', 'ofrecer');
    }

    public function actualizarContratarServicio(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $persona = $this->persona->encontrarPersona($id);

        $persona->update([
            'estado_proceso_id' => 4
        ]);
        session(['usuario' => $persona]);

        return redirect()->route('usuario-portal.index')->with('contratar', 'contratar');
    }




    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    ///PERFIL METODOS
    public function perfil(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $datosPersonales = $this->persona->encontrarPersona($id);

        return view('portal.usuario.perfil', compact('datosPersonales'));
    }

    public function perfilEditar(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $datosPersonales = $this->persona->encontrarPersona($id);

        return view('portal.usuario.perfil-editar', compact('datosPersonales'));
    }

    public function perfilActualizar(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $datosPersonales = $this->persona->encontrarPersona($id);

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|max:40|regex:/^[^\d]+$/',
            'apellido_paterno' => 'required|max:30|regex:/^[^\d]+$/',
            'apellido_materno' => 'required|max:30|regex:/^[^\d]+$/',
            'direccion_fiscal' => 'required|max:80'
        ], [
            'nombres.required' => 'El campo nombre es requerido',
            'nombres.regex' => 'El campo nombre no puede contener números.',

            'apellido_paterno.required' => 'El campo apellido paterno es requerido',
            'apellido_paterno.min' => 'El campo apellido paterno debe tener maximo 30 caracteres.',
            'apellido_paterno.regex' => 'El campo apellido paterno no puede contener números.',

            'apellido_materno.required' => 'El campo apellido materno es requerido',
            'apellido_materno.min' => 'El campo apellido materno debe tener maximo 30 caracteres.',
            'apellido_materno.regex' => 'El campo apellido materno no puede contener números.',

            'direccion_fiscal.required' => 'El campo direccion fiscal es requerido',
            'direccion_fiscal.min' => 'El campo direccion debe tener maximo 80 caracteres.',

            // 'nombres.alpha_spaces' => 'El campo nombre no puede llevar números',
            // 'apellido_paterno.alpha_spaces' => 'El campo Apellido Paterno no puede llevar números',
            // 'apellido_materno.alpha_spaces' => 'El campo Apellido Materno no puede llevar números'
            // 'nombres.alpha_spaces' => 'El campo nombre no puede llevar números ni caracteres especiales',
            // 'apellido_paterno.alpha_spaces' => 'El campo Apellido Paterno no puede llevar números ni caracteres especiales',
            // 'apellido_materno.alpha_spaces' => 'El campo Apellido Materno no puede llevar números ni caracteres especiales'
        ]);

        if ($validator->fails()) {
            return view('portal.usuario.perfil-editar', compact('datosPersonales', 'validator'));
        }

        $datosPersonales->update([
            'nombres' => $request->nombres,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'direccion_fiscal' => $request->direccion_fiscal
        ]);

        session(['usuario' => $datosPersonales]);

        return redirect()->route('portal-admin.perfil');
    }



    // SERVICIOS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    public function misServicios(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;

        // $query = Publicacion::query();
        // $publicaciones = $query->where('persona_id', $user)->orderBy('id', 'desc')->paginate(3);
        //$publicaciones = Publicacion::paginate(1);
        $publicaciones = Publicacion::where('persona_id', $user)->orderby('updated_at')->paginate(4);

        foreach ($publicaciones as $publicacion) {
            $publicacion->fecha_publicacion = Carbon::parse($publicacion->fecha_publicacion)->format('H:i:s');
        }
        // dd($user); // Puedes descomentar esto si necesitas verificar el valor de $user

        return view('portal.usuario.mis-servicios', compact('publicaciones'));
    }

    public function publicarServicios(Request $request)
    {
        $tipoServicios = $this->tipoServicios->traerTipoServicios();

        return view('portal.usuario.publicar-servicios', compact('tipoServicios'));
    }

    public function editarPublicacion(Publicacion $publicacion)
    {
        $tipoServicios = $this->tipoServicios->traerTipoServicios();

        return view('portal.usuario.servicio-editar', compact('tipoServicios', 'publicacion'));
    }


    public function actualizarPublicacion(Request $request, Publicacion $publicacion)
    {
        $request->validate([
            'servicio' => 'required|exists:servicios,id',
            'nombre' => 'required',
            'descripcion' => 'required'
        ], [
            'servicio.required' => 'El campo Servicio es requerido',
            'servicio.exists' => 'El Servicio seleccionado no es válido',
            'nombre.required' => 'El campo Nombre es requerido',
            'descripcion.required' => 'El campo Descripcion es requerido'
        ]);
        $codigo_aleatorio = $publicacion->codigo_aleatorio;
        $slug = Str::slug($request->input('nombre'));
        $slug_codigo = $slug . "-" . $codigo_aleatorio;

        $servicio = $request->input('servicio');

        $servicio = Servicio::where('id', $request->input('servicio'))->first();

        $tipo_servicio = TipoServicio::where('id', $servicio->tipo_servicio_id)->first();

        $publicacion->update([
            'slug' => $slug_codigo,
            'servicio_id' => $request->servicio,
            'tipo_servicio_id' => $tipo_servicio->id,
            'nombres' => $request->nombre,
            'descripcion' => $request->descripcion,
            //SE COMENTO PORQUE NO HAY NINGUN PROCESO DE VALIDACION

            //SE VOLVIO HABILITAR 
            'estado_proceso_id' => 1
        ]);

        return redirect()->route('portal-admin.misservicios')->with('actualizacion', 'Servicio Actualizado');
    }


    public function getAreas(Request $request)
    {
        $areaSjl = Servicio::where('tipo_servicio_id', $request->area_id)
            ->get();

        if (count($areaSjl) > 0) {
            return response()->json($areaSjl);
        }
    }

    public function publicarServicio(Request $request)
    {
        $request->validate([
            'servicio' => 'required|exists:servicios,id',
            'nombre' => 'required',
            'descripcion' => 'required'
        ], [
            'servicio.required' => 'El campo Servicio es requerido',
            'servicio.exists' => 'El Servicio seleccionado no es válido',
            'nombre.required' => 'El campo Nombre es requerido',
            'descripcion.required' => 'El campo Descripcion es requerido'
        ]);

        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;
        $codigo_aleatorio = Str::random(6);
        $slug = Str::slug($request->input('nombre'));
        $slug_codigo = $slug . "-" . $codigo_aleatorio;

        $servicio = $request->input('servicio');

        $servicio = Servicio::where('id', $request->input('servicio'))->first();

        $tipo_servicio = TipoServicio::where('id', $servicio->tipo_servicio_id)->first();



        $guardar = Publicacion::create([

            'codigo_aleatorio' => $codigo_aleatorio,
            'slug' => $slug_codigo,
            'persona_id' => $user,
            'servicio_id' => $request->input('servicio'),
            'tipo_servicio_id' => $tipo_servicio->id,
            'nombres' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'fecha_registrada' => Carbon::now(),
            ///SE AGREGO PORQUE AHORA ES DIRECTO
            'fecha_publicacion' => Carbon::now(),

        ]);

        return redirect()->route('portal-admin.misservicios')->with('succes', 'Servicio Publicado');
    }

    //CIERRA MIS SERVICIOS


    //ABRE MIS DOCUMENTOS
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    public function misDocumentos(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;
        $documentos = $this->personaDocumento->traerDocumentos($id);

// return $id;
        $cantidad_documento_otros = PersonaDocumento::where('tipo_documentacion_id', 4)
            ->where('persona_id', $id)->where('estado', 1)->count();


        
        return view('portal.usuario.mis-documentos', compact('documentos', 'cantidad_documento_otros'));
    }



    public function registrarDocumentos(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;
        $cantidad_documento_otros = PersonaDocumento::where('tipo_documentacion_id', 4)
        ->where('persona_id', $id)->where('estado', 1)->count();


        $tipo_documentacions = TipoDocumentacion::where('estado', 1)->get();



        if($cantidad_documento_otros < 1){
            return view('portal.usuario.registrar-documentos', compact('tipo_documentacions'));
        }


        return redirect()->back();






    }
    public function guardarDocumentos(Request $request)
    {

        $request->validate(
            [
                'otro_documento' => 'required|file|mimes:pdf|max:1024', // Campo de archivo requerido

            ],
            [
                'otro_documento.required' => 'El archivo es requerido',
                'otro_documento.mimes' => 'El archivo debe ser de tipo PDF',
                'otro_documento.max' => 'El archivo debe pesar menos de 1MB',

            ]

        );


        $tipo_documentacions = TipoDocumentacion::where('estado', 1)->get();
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;
        $ruta = Storage::put('public/documento_persona', $request->file('otro_documento'));

        $documento_persona = PersonaDocumento::create([
            'persona_id' => $id,
            'tipo_documentacion_id' => 4,
            'url_documento' => $ruta,
        ]);

        return redirect()->route('portal-admin.misDocumentos')->with('guardar', 'DOCUMENTO GUARDADO!!');
    }



    public function guardarDocumentoOfrecerServicio(Request $request)
    {

        $request->validate(
            [
                'otro_documento' => 'required|file|mimes:pdf|max:1024', // Campo de archivo requerido

            ],
            [
                'otro_documento.required' => 'El archivo es requerido',
                'otro_documento.mimes' => 'El archivo debe ser de tipo PDF',
                'otro_documento.max' => 'El archivo debe pesar menos de 1MB',

            ]

        );
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;


        $ruta = Storage::put('public/documento_persona', $request->file('otro_documento'));

        $documento_persona = PersonaDocumento::create([
            'persona_id' => $id,
            'tipo_documentacion_id' => 1,
            'url_documento' => $ruta,
        ]);

        $persona = $this->persona->encontrarPersona($id);

        $persona->update([
            'estado_proceso_id' => 3
        ]);
        // $persona->roles()->sync([2]);
        session(['usuario' => $persona]);


        return redirect()->back()->with('ofrecer', 'ofrecer');
    }

    public function editarDocumentos(Request $request, PersonaDocumento $documento)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $cantidad_documento_otros = PersonaDocumento::where('id', $documento->id)
            ->where('persona_id', $id)->where('estado', 1)->count();

        if ($cantidad_documento_otros <= 0) {
            return redirect()->route('portal-admin.misDocumentos');
        }

        return view('portal.usuario.editar-documentos', compact('documento'));
    }

    public function actualizarDocumentos(Request $request, $documento)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;


        $cantidad_documento_otros = PersonaDocumento::where('id', $documento)
            ->where('persona_id', $id)->where('estado', 1)->count();


        if ($cantidad_documento_otros <= 0) {

            return redirect()->route('portal-admin.misDocumentos');
        }




        // $persona = $this->persona->encontrarPersona($id);

        $documento_persona = PersonaDocumento::find($documento);

        if ($request->file('otro_documento')) {

            $request->validate([
                'otro_documento' => 'required|mimes:pdf|max:1024',
            ], [
                'otro_documento.required' => 'El PDF es requerida',
                'otro_documento.mimes' => 'El documento debe ser tipo "pdf"',
                'otro_documento.max' => 'El peso máximo de la foto debe ser de 1MB'
            ]);


            $ruta = Storage::put('public/documento_persona', $request->file('otro_documento'));
            // $persona->foto = $ruta;
            // $persona->save();
            if ($documento_persona->url_documento) {
                Storage::delete($documento_persona->url_documento);
                $documento_persona->url_documento = $ruta;
                $documento_persona->save();
            } else {
                $documento_persona->url_documento = $ruta;
                $documento_persona->save();
            }
        }

        return redirect()->route('portal-admin.misDocumentos');
    }



    /////CREDENCIALES ABRE
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    public function cambiarCredenciales()
    {

        return view('portal.usuario.cambiar-credenciales');
    }

    public function updateCredenciales(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $persona = $this->persona->encontrarPersona($id);

        $password = $sessionID->password;

        if (Hash::check($request->antigua_contrasena, $password)) {

            $request->validate([
                'nueva_contrasena' => 'required|min:8|max:18|regex:/^[a-zA-Z0-9\s\-]+$/',
                'antigua_contrasena' => 'required|min:8|max:18|regex:/^[a-zA-Z0-9\s\-]+$/'
            ], [
                'nueva_contrasena.required' => 'El campo nueva contraseña es requerido',
                'nueva_contrasena.regex' => 'La contraseña anterior no debe contener caracteres especiales.',

                'antigua_contrasena.required' => 'El campo antigua contraseña es requerido',
                'nueva_contrasena.min' => 'El campo nueva contraseña debe tener 8 digitos como mínimo',
                'nueva_contrasena.max' => 'El campo nueva contraseña debe tener 16 digitos como máximo',
                'nueva_contrasena.regex' => 'La contraseña nueva no debe contener caracteres especiales.',

            ]);

            $persona->update([
                'password' => $request->nueva_contrasena
            ]);
            session(['usuario' => $persona]);

            return redirect()->route('portal-admin.cambiarCredenciales')->with('succes', 'mensaje');
        } else {

            return redirect()->route('portal-admin.cambiarCredenciales')->with('fail', 'mensaje');
        }
    }

    public function subirFoto(Request $request)
    {

        $sessionID = $request->session()->get('usuario');
        $id = $sessionID->id;

        $persona = $this->persona->encontrarPersona($id);

        if ($request->file('foto')) {

            $request->validate([
                'foto' => 'required|mimes:jpeg,jpg,png|max:512',
            ], [
                'foto.required' => 'La foto es requerida',
                'foto.mimes' => 'La foto debe ser tipo "jpeg, jpg ó png"',
                'foto.max' => 'El peso máximo de la foto debe ser de 512kb'
            ]);

            $ruta = Storage::put('public/fotospersonas', $request->file('foto'));
            // $persona->foto = $ruta;
            // $persona->save();
            if ($persona->profile_photo_path) {
                Storage::delete($persona->profile_photo_path);
                $persona->profile_photo_path = $ruta;
                $persona->save();
            } else {
                $persona->profile_photo_path = $ruta;
                $persona->save();
            }
        }
        session(['usuario' => $persona]);

        return redirect()->route('portal-admin.cambiarCredenciales');
    }


    //////CIERRRA 



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
    public function destroy(string $id)
    {
        //
    }


    // METODOS DE MODULO DE PORTAL DE ADMINISTRACION DE CLIENTE
    public function indexClienteComentarios(Request $request)
    {

        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;
        $calificaciones = Calificacion::where('cliente_id', $user)->where('estado', 1)->paginate(5, ['*'], 'calificaciones_page');

        return view('portal.usuario.cliente.index', compact('calificaciones'));
    }



    public function agregarClienteComentarios(Request $request, Calificacion $cliente_comentario)
    {
        $request->validate([
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



        $calificacion = ($cliente_comentario);

        $calificacion->comentario = $request->input('comentario');
        $calificacion->estado_proceso_id = 2;
        $calificacion->fecha_registrada = Carbon::now();
        $calificacion->valor = $request->input('rating');

        $calificacion->save();

        return redirect()->back()->with('success', 'Se guardo su comentario.');
    }


    public function agregarClienteComentariosLibre(Request $request, Publicacion $publicacion)
    {

        if (session('usuario')) {
            $request->validate([
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

            $codigo_aleatorio = Str::random(6);

            $sessionID = $request->session()->get('usuario');
            $user_id = $sessionID->id;


            if ($user_id == $publicacion->persona_id) {
                return redirect()->back()->with('error-comentario', 'No puede comentar su propia publicación.');
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

            return redirect()->back()->with('success', 'Se guardo su comentario.');
        } else {
            return redirect()->back()->with('error', 'Inicie Sesión, Por favor.');
        }
    }

    // METODOS DE MODULO DE PORTAL DE ADMINISTRACION DE OFRECEDOR PARA 
    //COMENTARIOS DEL CLIENTE

    public function indexClientes(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;

        $calificaciones = Calificacion::where('persona_id', $user)->where('estado', 1)->whereNotNull('comentario')
            ->paginate(10, ['*'], 'calificaciones_page');

        $clientes = Calificacion::join('personas as p', 'calificacions.cliente_id', '=', 'p.id')
            ->where('calificacions.estado', 1)->where('calificacions.persona_id', $user)
            ->groupBy('calificacions.cliente_id')
            ->select('calificacions.cliente_id')
            ->paginate(10);



        // dd($clientes->clientes->nombres);



        return view('portal.usuario.lista-cliente', compact('calificaciones', 'clientes'));
    }

    public function agregaClientes(Request $request)
    {
        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;


        ////LISTA DE COMBO DE SUS PUBLICACIONES
        $misPublicaciones = Publicacion::where('persona_id', $user)->where('estado_proceso_id', 2)->where('estado', 1)->get();


        return view('portal.usuario.registrar-cliente', compact('misPublicaciones'));
    }


    ////GUARDAR CLIENTE PARA DAR ACCESP A COMENTAR
    /*public function guardarClientes(Request $request)
    {

        $request->validate([
            'servicio' => 'required',
            'cliente_documento' => 'required|exists:personas,numero_documento',
        ], [
            'servicio.required' => 'Seleccione un Servicio Publicador',
            'cliente_documento.required' => 'Ingrese el documento del cliente.',
            'cliente_documento.exists' => 'El numero de documento no está registrado.',
        ]);

        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;


        $cliente_id = Persona::where('numero_documento', $request->input('cliente_documento'))->first();

        if ($user == $cliente_id->id) {

            return redirect()->back()->with('error', 'No se puede agregar usted mismo.');
        }

        $codigo_aleatorio = Str::random(6);



        Calificacion::create([
            'persona_id' =>  $user,
            'cliente_id' => $cliente_id->id,
            'publicacion_id' => $request->input('servicio'),
            'codigo_aleatorio' => $codigo_aleatorio,
        ]);






        return redirect()->route('portal-admin.indexClientes')->with('success', 'Se guardo Satisfactoriamente');
    }*/


    ///GUARDAR CLIENTE NADA MAS
    public function guardarClientes(Request $request)
    {

        $request->validate([
            // 'servicio' => 'required',
            'cliente_documento' => 'required|exists:personas,numero_documento',
        ], [
            // 'servicio.required' => 'Seleccione un Servicio Publicador',
            'cliente_documento.required' => 'Ingrese el documento del cliente.',
            'cliente_documento.exists' => 'El numero de documento no está registrado.',
        ]);

        $sessionID = $request->session()->get('usuario');
        $user = $sessionID->id;


        $cliente_id = Persona::where('numero_documento', $request->input('cliente_documento'))->first();


        $personas_cantidad = Calificacion::where('persona_id', $user)->where('cliente_id', $cliente_id->id)->count();

        if ($personas_cantidad > 0) {

            return redirect()->back()->with('error-registrado', 'Ya se encuentra registrado el cliente.');
        }

        if ($user == $cliente_id->id) {

            return redirect()->back()->with('error', 'No se puede agregar usted mismo.');
        }

        $codigo_aleatorio = Str::random(6);



        Calificacion::create([
            'persona_id' =>  $user,
            'cliente_id' => $cliente_id->id,
            // 'publicacion_id' => $request->input('servicio'),
            'codigo_aleatorio' => $codigo_aleatorio,
        ]);






        return redirect()->route('portal-admin.indexClientes')->with('success', 'Se guardo Satisfactoriamente');
    }
}
