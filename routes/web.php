<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;


// Rotas de Registro

// Middleware para verificar se usuário está autenticado e se usuário é administrador do sistema.
Route::middleware(['auth', 'admin'])->group(function () {

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

});

// Rotas para Login

// Rota para exibir o formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para processar o login
Route::post('/login', [LoginController::class, 'login']);

// Rota para logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



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


