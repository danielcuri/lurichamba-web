<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\TipoDocumento;
use App\Models\TipoUtilidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\EntrepreneurNotification;
use Illuminate\Support\Facades\Mail;
class RegistrarController extends Controller
{

    public function index()
    {
        $tipo_documentos = TipoDocumento::where('estado', 1)->get();
        $tipo_utilidad_servicios = TipoUtilidad::where('estado', 1)->get();

        return view('registrate.index', compact('tipo_documentos', 'tipo_utilidad_servicios'));
    }

    public function sendEmailForRequest(Request $request)
    {

        $request->validate([  // Validación de campos REQUERIDOS
            'cellphone' => 'required|digits:9',
            'fullname' => 'required|email',
            'email' => 'required',     
        ], [        
            
            'cellphone.required' => 'No ha ingresado su número de celular',
            'cellphone.integer' => 'Su número esta incorrecto',
            'cellphone.digits' => 'Su número debe tener 9 dígitos',
            'fullname.required' => 'No ha ingresado sus nombres',            
            'email.required' => 'No ha ingresado su correo electronico',
            'email.email' => 'El correo electronico no es valido',
            'email.unique' => 'Este correo electronico ya se encuentra registrado'           

        ]);

        // $user = User::create($request->all());
        $data = $request->all();
        //envio de correo
        $fullName = trim($data['fullname']);
        $email = $data['email'];
        $phoneNumber = $data['cellphone'];

        $datos_email = new EntrepreneurNotification($fullName,$email,$phoneNumber);
        
        Mail::to(env('MAIL_USERNAME'))->queue($datos_email);

        //return redirect()->route('principal.index')->with('guardar', 'Solicitud enviada con exito');
        return redirect()->route('portal-login.index')->with('guardar', 'Usuario creado con éxito');
    }


    public function ofrecerServicio(Request $request)
    {

        $request->validate([  // Validación de campos REQUERIDOS
            'tipo_documento_id' => 'required', // 'nombre_del_campo' => 'validaciones
            'numero_documento' => 'required|digits_between:8,12|integer|unique:personas,numero_documento',
            'numero_celular' => 'required|digits:9|integer',
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'direccion_fiscal' => 'required',
            'file' => 'required|file|mimes:pdf|max:1024', // Campo de archivo requerido
            'email' => 'required|email|unique:personas,email',
            'password' => 'required|min:8|max:18|regex:/^[a-zA-Z0-9\s\-]+$/',
            'aceptacion_termino' => 'accepted',
            // 'ruc' => 'digits:11|integer'
        ], [

            // 'ruc.digits' => 'Ingresar ruc Mínimo 11 digitos.',
            // 'ruc.integer' => 'Ingresar un tipo de dato númerico.',

            'tipo_documento_id.required' => 'No ha seleccionado un tipo de documento',
            'numero_documento.required' => 'No ha ingresado su número de documento',
            'numero_documento.integer' => 'Su número de documento debe estar completo',
            'numero_documento.unique' => 'Este N° de documento ya se encuentra registrado',
            'numero_documento.digits' => 'Su numero de documento esta incorrecto ',
            'numero_celular.required' => 'No ha ingresado su número de celular',
            'numero_celular.integer' => 'Su número esta incorrecto',
            'numero_celular.digits' => 'Su número debe tener 9 dígitos',
            'nombres.required' => 'No ha ingresado sus nombres',
            'apellido_paterno.required' => 'No ha ingresado su apellido paterno',
            'apellido_materno.required' => 'No ha ingresado su apellido materno',
            'direccion_fiscal.required' => 'No ha ingresado la dirección de su domicilio fiscal',
            'file.required' => 'El archivo CERTIFICADO ÚNICO LABORAL es requerido',
            'file.mimes' => 'El archivo CERTIFICADO ÚNICO LABORAL debe ser de tipo PDF',
            'file.max' => 'El archivo CERTIFICADO ÚNICO LABORAL debe pesar menos de 1MB',
            'email.required' => 'No ha ingresado su correo electronico',
            'email.email' => 'El correo electronico no es valido',
            'email.unique' => 'Este correo electronico ya se encuentra registrado',
            'password.required' => 'No ha ingresado su contraseña',
            'password.min' => 'Su contraseña debe tener minimo 8 caracteres y maximo 18 caracteres',
            'password.max' => 'Su contraseña debe tener minimo 8 caracteres y maximo 18 caracteres',
            'password.regex' => 'La contraseña no debe contener caracteres especiales.',

            'aceptacion_termino.accepted' => 'No acepto los Terminos y Condiciones',

        ]);



        // $user = User::create($request->all());
        $persona = Persona::create($request->all() + [
            'tipo_utilidad_id' => 1, // 'tipo_utilidad_id' => '1
        ]);
        $ruta = Storage::put('public/documento_persona', $request->file('file'));

        $documento_persona = PersonaDocumento::create([
            'persona_id' => $persona->id,
            'tipo_documentacion_id' => 1,
            'url_documento' => $ruta,
        ]);

        /// SE SICRONIZA LOS ROLES 2 ofrecedor-inicio Y 3 ofrecedor-validado - SE LE OTORGA TODO EL PERMISO
        $persona->roles()->sync([2, 3]);



        return redirect()->route('portal-login.index')->with('guardar', 'Usuario creado con éxito');
    }


    public function contratarServicio(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required',
            'numero_documento1' => 'required|digits_between:8,12|integer|unique:personas,numero_documento',
            'numero_celular1' => 'required|integer',
            'nombres1' => 'required|max:40',
            'apellido_paterno1' => 'required|max:30',
            'apellido_materno1' => 'required|max:30',
            'direccion_fiscal1' => 'required|max:80',
            'email' => 'required|email|unique:personas,email',
            'password' => 'required|min:8|max:16',
            'aceptacion_termino1' => 'accepted',
            'ruc' => 'nullable|digits:11|integer'
        ], [
            'ruc.digits' => 'Ingresar Mínimo 11 digitos.',
            'ruc.integer' => 'Ingresar un tipo de dato númerico.',
            'tipo_documento_id.required' => 'No ha seleccionado un tipo de documento',
            'numero_documento1.required' => 'No ha ingresado su número de documento',
            'numero_documento1.integer' => 'Su número de documento debe estar completo',
            'numero_documento1.unique' => 'Este N° de documento ya se encuentra registrado',
            'numero_documento1.digits' => 'Su numero de documento esta incorrecto ',
            'numero_celular1.required' => 'No ha ingresado su número de celular',
            'numero_celular1.integer' => 'Su número está incorrecto',
            'nombres1.required' => 'No ha ingresado sus nombres',
            'nombres1.max' => 'El nombre debe tener como maximo 40 caracteres.',
            'apellido_paterno1.required' => 'No ha ingresado su apellido paterno',
            'apellido_paterno1.max' => 'El apellido paterno debe tener como maximo 30 caracteres.',
            'apellido_materno1.required' => 'No ha ingresado su apellido materno',
            'apellido_materno1.max' => 'El apellido materno debe tener como maximo 30 caracteres.',
            'direccion_fiscal1.required' => 'No ha ingresado la dirección de su domicilio fiscal',
            'email.required' => 'No ha ingresado su correo electrónico',
            'email.email' => 'El correo electrónico no es válido',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado',
            'password.required' => 'No ha ingresado su contraseña',
            'password.min' => 'Su contraseña debe tener mínimo 8 caracteres y máximo 16 caracteres',
            'password.max' => 'Su contraseña debe tener mínimo 8 caracteres y máximo 16 caracteres',
            'aceptacion_termino1.accepted' => 'No acepto los Términos y Condiciones',
        ]);

        $persona = Persona::create([

            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'numero_documento' => $request->input('numero_documento1'),
            'numero_celular' => $request->input('numero_celular1'),
            'nombres' => $request->input('nombres1'),
            'apellido_paterno' => $request->input('apellido_paterno1'),
            'apellido_materno' => $request->input('apellido_materno1'),
            'direccion_fiscal' => $request->input('direccion_fiscal1'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'aceptacion_termino' => $request->input('aceptacion_termino1'),
            'ruc' => $request->input('ruc'),



            'tipo_utilidad_id' => 2,
        ]);


        $persona->roles()->sync([4]);

        return redirect()->route('portal-login.index')->with('guardar', 'Usuario creado con éxito');
    }
}
