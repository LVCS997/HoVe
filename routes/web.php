<?php

use App\Http\Controllers\ExameClinicoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SolicitacaoExameController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get("/pdf1", function () {
    return view("exame-clinico.pdf-1");
});

Route::get("/pdf1/get", function () {

    // Gera o PDF a partir da view
    $pdf = Pdf::loadView('exame-clinico.pdf-1');

    // Define o nome do arquivo PDF
    $fileName = 'requisicao_exame.pdf';

    // Faz o download do PDF
    return $pdf->download($fileName);


});


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
        if (auth()->user()->role === 'veterinario') {
            return redirect()->route('medico.completar-perfil', $user->id);
        }else{
            return redirect()->route('register')->with('success', 'Usuário registrado com sucesso!');
        }
    });

    // Listar todos os usuários
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Mostrar formulário para trocar senha
    Route::get('/users/{user}/change-password', [UserController::class, 'showChangePasswordForm'])->name('users.change-password');

    // Processar a troca de senha
    Route::post('/users/{user}/change-password', [UserController::class, 'updatePassword'])->name('users.update-password');

});


// ROTAS DO MÉDICO

Route::middleware(['auth', 'veterinario'])->group(function () {

    // MOSTRA FORMULÁRIO PÓS REGISTRO
    Route::get('/medico/completar-perfil/{user}', [MedicoController::class, 'completarPerfil'])
        ->name('medico.completar-perfil');
    // CUIDA DO PROCESSO DE PÓS REGISTRO
    Route::post('/medico/completar-perfil/{user}', [MedicoController::class, 'salvarPerfil'])
        ->name('medico.salvar-perfil');
});

// ROTA EXAME

Route::middleware(['auth', 'veterinario.exame'])->group(function () {
    // MOSTRA FORMULÁRIO DE CRIAÇÃO DO EXAME CLÍNICO GERAL
    Route::get('/pets/{pet}/exame-clinico/create', [ExameClinicoController::class, 'create'])
        ->name('exame-clinico.create');
//CUIDA DO PROCESSO DE CRIAÇÃO DO EXAME CLÍNICO GERAL
    Route::post('/pets/{pet}/exame-clinico', [ExameClinicoController::class, 'store'])
        ->name('exame-clinico.store');
//MOSTRA EXAME CLÍNICO GERAL
    Route::get('/exame-clinico/{exameClinico}', [ExameClinicoController::class, 'show'])
        ->name('exame-clinico.show');
    // Mostra o histórico clínico de um pet
    Route::get('/pets/{pet}/historico-clinico', [PetController::class, 'historicoClinico'])
        ->name('pets.historico-clinico');
    // Baixar Prontuário em PDF
    Route::get('/exame-clinico/{exameClinico}/pdf', [ExameClinicoController::class, 'downloadPdf'])
        ->name('exame-clinico.pdf');
});

// Rotas para Login

// Rota para exibir o formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para processar o login
Route::post('/login', [LoginController::class, 'login']);

// Rota para logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {

    // Rota para os créditos
    Route::get('/creditos', function () {
        return view('creditos.index');
    })->name('creditos');

// Rotas para menu
    Route::get('/', function () {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('owners.index');
        }
        return view('welcome');
    })->name('home');

    Route::get('/owners/buscar-por-cpf', [OwnerController::class, 'buscarPorCpf'])->name('owners.buscar-por-cpf');

    Route::get('/buscar-pets', [PetController::class, 'buscarPorCpf'])->name('pets.buscarPorCpf');

    Route::get('/pets/buscar-por-cpf', [PetController::class, 'buscarPetPorCpf'])->name('pets.buscar-pet-por-cpf');

// Rotas para Owner
    Route::resource('owners', OwnerController::class);

// Rotas para Pet
    Route::resource('pets', PetController::class);
    Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');

    Route::get('/solicitacoes', [SolicitacaoExameController::class, 'index'])->name('solicitacoes.index')->middleware('veterinario.exame');
    Route::get('/solicitacoes/create', [SolicitacaoExameController::class, 'create'])->name('solicitacoes.create')->middleware('veterinario.exame');
    Route::post('/solicitacoes', [SolicitacaoExameController::class, 'store'])->name('solicitacoes.store')->middleware('veterinario.exame');
    Route::get('/solicitacoes/{id}', [SolicitacaoExameController::class, 'show'])->name('solicitacoes.show')->middleware('veterinario.exame');




});


