<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se ele é um administrador
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Se não for um administrador, redireciona para uma página de erro ou para a home
        return redirect('/')->with('error', 'Você não tem permissão para acessar esta página.');
    }
}
