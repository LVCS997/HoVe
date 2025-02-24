<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function completarPerfil(User $user)
    {
        // Verifica se o usuário autenticado é o mesmo que está tentando salvar o perfil
        if (auth()->user()->id !== $user->id || auth()->user()->role !== 'veterinario') {
            redirect('register');
        }

        return view('medico.completar-perfil', compact('user'));
    }

    public function salvarPerfil(Request $request, User $user)
    {
        // Verifica se o usuário autenticado é o mesmo que está tentando salvar o perfil
        if (auth()->user()->id !== $user->id || auth()->user()->role !== 'veterinario') {
            redirect('register');
        }

        $request->validate([
            'crmv' => 'required|string|unique:medicos,crmv',
            'especialidade' => 'required|string',
        ]);

        // Criar registro na tabela medicos
        Medico::create([
            'user_id' => $user->id,
            'nome' => $user->name,
            'crmv' => $request->crmv,
            'especialidade' => $request->especialidade,
        ]);

        return redirect()->route('home')->with('success', 'Perfil completado com sucesso!');
    }
}
