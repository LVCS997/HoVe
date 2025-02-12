<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

// Rotas de Registro

Route::get('/register/index', function () {  // Rota para mostrar o formulário de registro
    return view('register.index');
});

Route::post('/register/index', function (Request $request) {
    $user = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Criar o Usuário com o papel padrão 'user'
    User::create([
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => Hash::make($user['password']),
        'role' => 'user', // Papel padrão
    ]);

    return redirect('/login/index');
});

// Rotas para Login

Route::get('/login/index', function () {
    return view('login.index');
});

Route::post('/login/index', function (Request $request) {
    // Validação dos dados
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tentativa de autenticação
    if (Auth::attempt($credentials)) {
        // Regenera a sessão para evitar ataques de fixação
        $request->session()->regenerate();

        // Redireciona para a URL pretendida ou para a página inicial
        return redirect()->intended('/');
    }

    // Se a autenticação falhar, retorna para a página de login com erros
    return back()->withErrors([
        'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
    ]);
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login/index');
});






// Rotas para menu
Route::get('/', function () {
    return view('welcome');
});
