<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    // Exibir formulário para completar perfil
    public function completarPerfil(User $user)
    {
        return view('medico.completar-perfil', compact('user'));
    }

    // Salvar informações do perfil
    public function salvarPerfil(Request $request, User $user)
    {

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
