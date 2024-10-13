<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\Test;
use App\Mail\EntrepreneurNotification;
use Illuminate\Support\Facades\Mail;
class AutenticacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'registrarse', 'verifyCode','sendEmailEntrepreneur']]);
        // $this->middleware('JwtMiddleware', ['except' => ['login', 'register']]); // Reemplaza 'auth:api' con 'JwtMiddleware'

    }


    public function login(Request $request)
    {

        $validador = Validator::make($request->all(), [
            'email' => 'required|email|min:3|max:100|exists:personas,email',
            'password' => 'required|min:5|max:100',

        ], [
            'email.exists' => 'El email no existe.',

            'email.required' => 'El email es obligatorio.',
            'email.max' => 'El email debe tener maximo 100 caracteres.',
            'email.min' => 'El email debe tener minimo 3 caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.max' => 'La contraseña debe tener maximo 100 caracteres.',
            'password.min' => 'La contraseña debe tener minimo 3 caracteres.',
        ]);


        if ($validador->fails()) {
            return response()->json([
                'codigo' => 400,
                'respuesta' => false,
                'errores' => $validador->errors(),
            ], 400);
        }

        $email_input = $request->input('email');

        $persona_contrata = Persona::where('email', $email_input)->whereIn('tipo_utilidad_id', [2, 3])->count();

        if ($persona_contrata <= 0) {
            return response()->json([
                'codigo' => 400,
                'respuesta' => false,
                'mensaje' => 'El usuario no tiene acceso.'
            ], 400);
        }



        $credentials = $request->only('email', 'password');





        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['respuesta' => false, 'codigo' => 401, 'mensaje' => 'Credenciales no válidas'], 401);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['respuesta' => false, 'codigo' => 401, 'mensaje' => 'Token caducado'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['respuesta' => false, 'codigo' => 401, 'mensaje' => 'Token inválido'], 401);
        } catch (JWTException $e) {
            return response()->json(['respuesta' => false, 'codigo' => 401, 'mensaje' => 'Error al procesar el token'], 500);
        }
        $user = auth('api')->user();




        return response()->json([
            'respuesta' => true,
            'data' =>
            array_merge($user->toArray(), [
                'mensaje' => 'Inicio de sesión satisfactorio.',
                'profile_photo_path' => $user->profile_photo_path ? Storage::url($user->profile_photo_path) : null,

                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]),
            'codigo' => 200
        ]);
    }


    public function me()
    {


        $user = auth('api')->user();

        return response()->json($user);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'respuesta' => true,
            'codigo' => 200,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }


    public function registrarse(Request $request)
    {
        try {
            $validador = Validator::make($request->all(), [  // Validación de campos REQUERIDOS
                'tipo_documento_id' => 'required', // 'nombre_del_campo' => 'validaciones
                // 'numero_documento' => 'required|digits_between:8,12|integer|unique:personas,numero_documento',

                'numero_documento' => [
                    'required',
                    Rule::when(function ($request) {
                        // Verificar el tipo de documento seleccionado
                        return $request->tipo_documento_id == 1;
                    }, ['digits:8']),
                    Rule::when(function ($request) {
                        // Verificar el tipo de documento seleccionado
                        return $request->tipo_documento_id == 2;
                    }, ['digits:12']),
                    Rule::when(function ($request) {
                        // Verificar el tipo de documento seleccionado
                        return $request->tipo_documento_id == 3;
                    }, ['digits_between:9,15']),


                    // Agrega otras reglas de validación según sea necesario
                    // Rule::unique('personas', 'numero_documento'),

                    function ($attribute, $value, $fail) use ($request) {
                        $personas = Persona::where('numero_documento', strval($value))->count();
                        if ($personas > 0) {
                            $fail('El numero de documento ya se encuentra registrado.');
                        }
                    },

                ],


                'numero_celular' => 'required|digits:9',
                'nombres' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'direccion_fiscal' => 'required',
                // 'file' => 'required|file|mimes:pdf|max:1024', // Campo de archivo requerido
                'email' => 'required|email|unique:personas,email',
                'password' => 'required|min:8|max:18|regex:/^[a-zA-Z0-9\s\-]+$/',
                'aceptacion_termino' => 'required',
            ], [
                'tipo_documento_id.required' => 'No ha seleccionado un tipo de documento',

                'numero_documento.required' => 'El número de documento es obligatorio.',
                'numero_documento.digits' => 'El número de documento debe tener :digits dígitos.',
                'numero_documento.digits_between' => 'El número de documento debe tener entre :min y :max dígitos.',



                'numero_celular.required' => 'No ha ingresado su número de celular',
                'numero_celular.digits' => 'Su número debe tener 9 dígitos',
                'nombres.required' => 'No ha ingresado sus nombres',
                'apellido_paterno.required' => 'No ha ingresado su apellido paterno',
                'apellido_materno.required' => 'No ha ingresado su apellido materno',
                'direccion_fiscal.required' => 'No ha ingresado la dirección de su domicilio fiscal',

                'email.required' => 'No ha ingresado su correo electronico',
                'email.email' => 'El correo electronico no es valido',
                'email.unique' => 'Este correo electronico ya se encuentra registrado',
                'password.required' => 'No ha ingresado su contraseña',
                'password.min' => 'Su contraseña debe tener minimo 8 caracteres y maximo 18 caracteres',
                'password.max' => 'Su contraseña debe tener minimo 8 caracteres y maximo 18 caracteres',
                'password.regex' => 'La contraseña no debe contener caracteres especiales.',

                'aceptacion_termino.required' => 'No acepto los Terminos y Condiciones',

            ]);

            // Validate the request
            if ($validador->fails()) {
                return response()->json([
                    'codigo' => 422,
                    'respuesta' => false,
                    'errores' => $validador->errors(),
                ], 422);
            }

            $data = $request->all();
            $data['tipo_utilidad_id'] = 2;           

            $persona = Persona::create($data);
          

             $persona->roles()->sync([4]);

            return response()->json([
                'respuesta' => true,
                'codigo' => 200,
                'mensaje' => 'Se registro correctamente.'
            ], 200);
        } catch (Error $e) {

            return response()->json([
                'respuesta' => false,
                'codigo' => 500,
                'mensaje' => 'Error en el servidor',
            ], 500);
        }
    }
    public function sendEmailEntrepreneur(Request $request){
        try {
            $validador = Validator::make($request->all(), [ 
                'numero_celular' => 'required|digits:9',
                'nombres' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',               
                'email' => 'required|email|unique:personas,email',               
                'aceptacion_termino' => 'required'
            ], [             
                'numero_celular.required' => 'No ha ingresado su número de celular',
                'numero_celular.digits' => 'Su número debe tener 9 dígitos',
                'nombres.required' => 'No ha ingresado sus nombres',
                'apellido_paterno.required' => 'No ha ingresado su apellido paterno',
                'apellido_materno.required' => 'No ha ingresado su apellido materno',
                'email.required' => 'No ha ingresado su correo electronico',
                'email.email' => 'El correo electronico no es valido',
                'email.unique' => 'Este correo electronico ya se encuentra registrado',
                'aceptacion_termino.required' => 'No acepto los Terminos y Condiciones'

            ]);

            // Validate the request
            if ($validador->fails()) {
                return response()->json([
                    'codigo' => 422,
                    'respuesta' => false,
                    'errores' => $validador->errors(),
                ], 422);
            }

            $data = $request->all();
            //envio de correo
            $fullName = trim($data['nombres'] . ' ' . $data['apellido_paterno'] . ' ' . $data['apellido_materno']);
            $email = $data['email'];
            $phoneNumber = $data['numero_celular'];

            $datos_email = new EntrepreneurNotification($fullName,$email,$phoneNumber);
            $email = "paulo.gmsumma@gmail.com";
            Mail::to($email)->send($datos_email);
          
            return response()->json([
                'respuesta' => true,
                'codigo' => 200,
                'mensaje' => 'Se registro correctamente.',
                'body' =>$data
            ], 200);
        } catch (Error $e) {

            return response()->json([
                'respuesta' => false,
                'codigo' => 500,
                'mensaje' => 'Error en el servidor',
            ], 500);
        }
    }
}
