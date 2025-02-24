<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsVeterinario
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verifica se o usuário é um veterinário
        if (Auth::user()->role !== 'veterinario') {
            abort(403, 'Acesso não autorizado.');
        }

        // Verifica se o usuário está tentando acessar seu próprio perfil
        $userId = $request->route('user')->id;
        if (Auth::user()->id !== $userId) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
