<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mostrar formulário para trocar senha
    public function showChangePasswordForm(User $user)
    {
        return view('users.change-password', compact('user'));
    }

    // Processar a troca de senha
    public function updatePassword(Request $request, User $user)
    {
        // Validação da nova senha
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Atualizar a senha do usuário
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Senha atualizada com sucesso!');
    }
}
