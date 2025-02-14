<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;


// Rotas de Registro

Route::get('/register', function () {  // Rota para mostrar o formulário de registro
    return view('register.index');
})->name('register');

Route::post('/register', function (Request $request) {
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

    return redirect('/login');
});

// Rotas para Login

Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::post('/login', function (Request $request) {
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
    return redirect('/login');
});



Route::middleware(['auth'])->group(function () {


// Rotas para menu
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/owners/buscar-por-cpf', [OwnerController::class, 'buscarPorCpf'])->name('owners.buscar-por-cpf');

// Rotas para Owner
    Route::resource('owners', OwnerController::class);

// Rotas para Pet
    Route::resource('pets', PetController::class);


});


