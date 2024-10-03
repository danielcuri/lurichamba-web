<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\NuevaContraseniaMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{



    public function index()
    {
        // Verificar si el usuario ya está autenticado
        if (Auth::guard('personas')->check()) {
            // Si ya está autenticado, redirigir a la página principal
            return redirect('/portal-admin')->with('error', 'Ya estás autenticado.');
        }

        return view('portal.login.index');
    }


    public function login(Request $request)
    {
        // Validar las credenciales del usuario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|regex:/^[a-zA-Z0-9\s\-]+$/',
        ], [
            'email.required' => 'El email es requerido.',

            'email.email' => 'Ingrese un correo valido.',
            'password.required' => 'La contraseña es requerida.',
            'password.regex' => 'La contraseña no debe contener caracteres especiales.',

        ]);

        // Intentar autenticar al usuario
        if (Auth::guard('personas')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // La autenticación fue exitosa, redirigir al usuario a la nueva página
            $usuario = Auth::guard('personas')->user();
            session(['usuario' => $usuario]);

            return redirect()->route('usuario-portal.index');
        } else {
            // La autenticación falló, redirigir de vuelta al formulario de login con un mensaje de error
            return redirect('/portal-login')->with('error', 'Credenciales incorrectas. Por favor, intenta de nuevo.');
        }
    }

    // Método para cerrar sesión del usuario
    public function logout()
    {
        // Cerrar la sesión del usuario utilizando el guard 'personas'
        Auth::guard('personas')->logout();
        Session::flush();

        // Redirigir al usuario a la página de inicio o a donde desees después de cerrar sesión
        return redirect('/portal-login')->with('success', 'Sesión cerrada correctamente.');
    }
    public function ocultarCorreo($correo)
    {
        // Encuentra la posición del arroba
        $posicionArroba = strpos($correo, '@');

        // Extrae los primeros tres caracteres del correo
        $primerosTres = substr($correo, 0, 3);

        // Calcula la cantidad de puntos necesarios
        $cantidadPuntos = $posicionArroba - 3;

        // Crea una cadena de puntos con la cantidad necesaria
        $puntos = str_repeat('X', $cantidadPuntos);

        // Obtiene el dominio del correo electrónico, incluyendo el arroba
        $dominio = substr($correo, $posicionArroba);

        // Combina los tres primeros caracteres con los puntos y el dominio
        $correoModificado = $primerosTres . $puntos . $dominio;

        return $correoModificado;
    }


    public function indexRecuperarCredenciales()
    {
        if (Auth::guard('personas')->check()) {
            // Si ya está autenticado, redirigir a la página principal
            return redirect('/portal-admin/cambiar-credenciales')->with('error', 'Ya estás autenticado.');
        }
        return view('recuperar-credenciales.index');
    }


    public function recuperarCredenciales(Request $request)
    {
        $request->validate([
            'numero_documento' => 'required|digits_between:8,12|integer|exists:personas,numero_documento',
            'email' => 'required|email|exists:personas,email',

        ], [

            'numero_documento.required' => 'No ha ingresado su número de documento.',
            'numero_documento.integer' => 'Su número de documento debe estar completo.',
            'numero_documento.exists' => 'Este N° de documento no se encuentra registrado.',
            'numero_documento.digits' => 'Su numero de documento esta incorrecto.',

            'email.required' => 'No ha ingresado su correo electronico.',
            'email.email' => 'El correo electronico no es valido.',
            'email.exists' => 'Este correo electronico no se encuentra registrado.',


        ]);

        $numero_documento_input = $request->input('numero_documento');

        $email_input = $request->input('email');

        $personas = Persona::where('numero_documento', $numero_documento_input)->where('email', $email_input)->where('estado', 1);

        $personas_cantidad = $personas->count();

        if ($personas_cantidad > 0) {
            $personas_datos = $personas->first();

            $contrasenia_aleatoria = Str::random(10);
            $personas_id = $personas_datos->id;


            $personas_nuevo = Persona::find($personas_id);

            $personas_nuevo->password = $contrasenia_aleatoria;
            $personas_nuevo->save();

            $email = $personas_nuevo->email;
            $emailOculto = $this->ocultarCorreo($email);


            $datos_email = new NuevaContraseniaMail($contrasenia_aleatoria);

            Mail::to($email_input)->queue($datos_email);


            return redirect()->back()->with('enviado', $emailOculto);
        }
    }
}
