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
        $credentials = $request->validate([
            'cpf' => 'required', // Usando CPF em vez de email
            'password' => 'required',
        ]);

        // Tentativa de autenticação
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
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
