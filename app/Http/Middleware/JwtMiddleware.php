<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['respuesta' => false,'codigo' => 401, 'mensaje' => 'Token es invalido'], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['respuesta' => false,'codigo' => 401, 'mensaje' => 'Token se expiro'], 401);
            } else {
                return response()->json(['respuesta' => false,'codigo' => 401, 'mensaje' => 'Token de autorización no encontrado'], 401);
            }
        }
        return $next($request);
    }
}
