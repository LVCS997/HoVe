<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('login.index');
    }

    // Método para processar o login
    public function login(Request $request)
    {

        // Validação dos dados
        $request->validate([
            'cpf' => 'required|string',
            'password' => 'required|string',
        ]);

        // Remove a formatação do CPF
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);

        $credentials = [
            'cpf' => $cpf,
            'password' => $request->password
        ];


        // Tentativa de autenticação
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verificar se é um veterinário e se ainda não completou o perfil
            if ($user->role === 'veterinario' && !$user->medico) {
                return redirect()->route('medico.completar-perfil', $user->id);
            }

            return redirect()->intended('/');
        }

        // Se a autenticação falhar, retorna para a página de login com erros
        return back()->withErrors([
            'cpf' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    // Método para logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function username()
    {
        return 'cpf'; // Define que o campo de login será o CPF
    }
}
