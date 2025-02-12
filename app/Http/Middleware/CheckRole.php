<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verifica se o usuário está autenticado e tem o papel necessário
        if (!auth()->check() || auth()->user()->role !== $role) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
