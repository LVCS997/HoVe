<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLaboratorio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e tem a role de Laboratório
        if (!auth()->check() || !auth()->user()->CheckRole('laboratorio')) {
            // Redireciona com uma mensagem de erro
            return redirect()->route('solicitacoes.index')->with('error', 'Acesso negado. Apenas laboratórios podem realizar esta ação.');
        }

        // Permite o acesso à rota
        return $next($request);
    }
}
