<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    protected function redirectTo($request)
    {
        return route('login'); // Redirige al inicio de sesión si no está autenticado
    }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect($this->redirectTo($request));
        }

        // Condición solo para rutas de administración de categorías
        if (
            $request->is('categorias/create') ||
            $request->is('categorias/*/edit') ||
            ($request->is('categorias') && $request->isMethod('post')) ||
            ($request->is('categorias/*') && $request->isMethod('delete'))
        ) {
            // Verifica si el usuario autenticado es el administrador (ID: 4)
            if (Auth::user()->id !== 4) {
                return redirect()->route('dashboard')->with('error', 'No tienes acceso: no eres el administrador.');
            }
        }

        return $next($request);
    }
}
