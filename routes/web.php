<?php

use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SolicitacaoExameController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;


// Rotas de Registro

// Middleware para verificar se utilizador está autenticado e se utilizador é administrador do sistema.
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/register', function () {  // Rota para mostrar o formulário de registro
        return view('register.index');
    })->name('register');

    Route::post('/register', function (Request $request) {

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|unique:users', // CPF único e com no máximo 14 caracteres
            'password' => 'required|string|min:8|confirmed', // Senha com confirmação
            'role' => 'required|string|in:admin,laboratorio,veterinario,atendente,user', // Papel válido
        ]);

        // Remove a formatação do CPF
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);

        $credentials = [
            'name' => $request['name'],
            'cpf' => $cpf,
            'password' => $request['password'],
            'role' => $request['role']
        ];


        // Criar o Usuário
        $user = User::create($credentials);

        // Se o usuário for um veterinário, redirecionar para completar o perfil
        if ($user->role === 'veterinario') {
            return redirect()->route('medico.completar-perfil', $user->id);
        }

        return redirect('/register')->with('success', 'Usuário registrado com sucesso!');
    });

});

Route::get('/medico/completar-perfil/{user}', [MedicoController::class, 'completarPerfil'])->name('medico.completar-perfil');
Route::post('/medico/completar-perfil/{user}', [MedicoController::class, 'salvarPerfil'])->name('medico.salvar-perfil');


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
    })->name('home');

    Route::get('/owners/buscar-por-cpf', [OwnerController::class, 'buscarPorCpf'])->name('owners.buscar-por-cpf');

    Route::get('/buscar-pets', [PetController::class, 'buscarPorCpf'])->name('pets.buscarPorCpf');

    Route::get('/pets/buscar-por-cpf', [PetController::class, 'buscarPetPorCpf'])->name('pets.buscar-pet-por-cpf');

// Rotas para Owner
    Route::resource('owners', OwnerController::class);

// Rotas para Pet
    Route::resource('pets', PetController::class);


    Route::get('/solicitacoes', [SolicitacaoExameController::class, 'index'])->name('solicitacoes.index');
    Route::get('/solicitacoes/create', [SolicitacaoExameController::class, 'create'])->name('solicitacoes.create');
    Route::post('/solicitacoes', [SolicitacaoExameController::class, 'store'])->name('solicitacoes.store');
    Route::get('/solicitacoes/{id}', [SolicitacaoExameController::class, 'show'])->name('solicitacoes.show');


    Route::put('/solicitacoes/{id}/status', [SolicitacaoExameController::class, 'updateStatus'])->name('solicitacoes.updateStatus');



    // Rota para exibir o formulário de upload (GET)
    Route::get('/solicitacoes/{id}/upload-pdf', [SolicitacaoExameController::class, 'showUploadForm'])
        ->name('solicitacoes.showUploadForm')
        ->middleware('auth');

    // Rota para processar o upload do PDF (POST)
    Route::post('/solicitacoes/{id}/upload-pdf', [SolicitacaoExameController::class, 'uploadPdf'])
        ->name('solicitacoes.uploadPdf')
        ->middleware('auth');

    // Rota para baixar o PDF

    Route::get('/solicitacoes/{id}/view-pdf', [SolicitacaoExameController::class, 'viewPdf'])
        ->name('solicitacoes.viewPdf')
        ->middleware('auth');


});


