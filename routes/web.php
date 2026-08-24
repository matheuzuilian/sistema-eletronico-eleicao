<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleitorController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleicaoController;
use App\Http\Controllers\EscolaController;
use App\Http\Middleware\AdminAutenticado;
use App\Http\Controllers\ChapaController;

// Público
Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/autenticar', [EleitorController::class, 'autenticar'])->name('autenticar');

Route::get('/loginAdm', fn() => view('loginAdm'))->name('loginAdm');
Route::post('/autenticarAdm', [AdministradorController::class, 'autenticar'])->name('autenticarAdm');
Route::post('/logoutAdm', [AdministradorController::class, 'logout'])->name('logoutAdm');

// Área do eleitor (exige login de eleitor)
Route::middleware('eleitor.autenticado')->group(function () {
    Route::middleware('eleitor.autenticado')->group(function () {
        Route::get('/escolhaChapa', [VotoController::class, 'escolhaChapa'])->name('escolhaChapa');
        Route::post('/confirmarVotoChapa', [VotoController::class, 'confirmarVotoChapa'])->name('confirmarVotoChapa');
        Route::post('/registrarVoto', [VotoController::class, 'registrarVoto'])->name('registrarVoto');
        Route::get('/votoRegistrado', fn() => view('votoRegistrado'))->name('votoRegistrado');
    });
});

// Área do administrador (exige login de admin)
Route::middleware('admin.autenticado')->group(function () {
    Route::get('/opcaoAdm', fn() => view('opcaoAdm'))->name('opcaoAdm');

    Route::get('/gerenciarCandidato', [CandidatoController::class, 'index'])->name('gerenciarCandidato');
    Route::get('/adicionarCandidato', [CandidatoController::class, 'create'])->name('adicionarCandidato');
    Route::post('/adicionarCandidato', [CandidatoController::class, 'store'])->name('adicionarCandidato.store');
    Route::get('/editarCandidato/{id}', [CandidatoController::class, 'edit'])->name('editarCandidato');
    Route::put('/editarCandidato/{id}', [CandidatoController::class, 'update'])->name('editarCandidato.update');
    Route::delete('/excluirCandidato/{id}', [CandidatoController::class, 'destroy'])->name('excluirCandidato');
    Route::get('/inicioVotacao', [EleicaoController::class, 'create'])->name('inicioVotacao');
    Route::post('/inicioVotacao', [EleicaoController::class, 'store'])->name('inicioVotacao.store');
    Route::get('/gerenciarEscola', [EscolaController::class, 'index'])->name('gerenciarEscola');
    Route::get('/adicionarEscola', [EscolaController::class, 'create'])->name('adicionarEscola');
    Route::post('/adicionarEscola', [EscolaController::class, 'store'])->name('adicionarEscola.store');
    Route::get('/editarEscola/{id}', [EscolaController::class, 'edit'])->name('editarEscola');
    Route::put('/editarEscola/{id}', [EscolaController::class, 'update'])->name('editarEscola.update');
    Route::delete('/excluirEscola/{id}', [EscolaController::class, 'destroy'])->name('excluirEscola');

    Route::get('/gerenciarChapa', [ChapaController::class, 'index'])->name('gerenciarChapa');
    Route::get('/adicionarChapa', [ChapaController::class, 'create'])->name('adicionarChapa');
    Route::post('/adicionarChapa', [ChapaController::class, 'store'])->name('adicionarChapa.store');
    Route::get('/editarChapa/{id}', [ChapaController::class, 'edit'])->name('editarChapa');
    Route::put('/editarChapa/{id}', [ChapaController::class, 'update'])->name('editarChapa.update');
    Route::delete('/excluirChapa/{id}', [ChapaController::class, 'destroy'])->name('excluirChapa');

    // Ainda pendentes (views existem, controllers não):
    Route::get('/relatorio', fn() => view('gerarRelatorio'))->name('relatorio');
    Route::get('/gerarRelatorio', fn() => view('gerarRelatorio'))->name('gerarRelatorio');
    Route::get('/gerenciarEleitores', [EleitorController::class, 'index'])->name('gerenciarEleitores');
    Route::get('/adicionarEleitor', [EleitorController::class, 'create'])->name('adicionarEleitor');
    Route::post('/adicionarEleitor', [EleitorController::class, 'store'])->name('adicionarEleitor.store');
    Route::get('/editarEleitor/{id}', [EleitorController::class, 'edit'])->name('editarEleitor');
    Route::put('/editarEleitor/{id}', [EleitorController::class, 'update'])->name('editarEleitor.update');
    Route::delete('/excluirEleitor/{id}', [EleitorController::class, 'destroy'])->name('excluirEleitor');
});