<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PersonaAuthMiddleware
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado en la tabla 'personas'
        if (Auth::guard('personas')->check()) {
            auth()->shouldUse('personas'); // Cambio temporal al guard 'personas'
            return $next($request);
        }

        // Si no está autenticado, redirigir al formulario de inicio de sesión
        return redirect('/portal-login')->with('error', 'Acceso no autorizado.');
    }
}
