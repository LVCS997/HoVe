<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsVeterinarioForExame
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verifica se o usuário é um veterinário
        if (Auth::user()->role !== 'admin') {
            if (Auth::user()->role !== 'veterinario') {
                abort(403, 'Você não tem permissão para acessar esta parte do site.');
            }
        }

        return $next($request);
    }
}
