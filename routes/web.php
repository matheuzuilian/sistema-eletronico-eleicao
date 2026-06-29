<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/loginAdm', function () {
    return view('loginAdm');
})->name('loginAdm');

Route::get('/escolhaDiretor', function () {
    return view('escolhaDiretor');
})->name('escolhaDiretor');

Route::get('/loginAdm', function () {
    return view('loginAdm');
})->name('loginAdm');

Route::get('/confirmarVotoDiretor', function () {
    return view('confirmarVotoDiretor');
})->name('confirmarVotoDiretor');

Route::get('/escolhaCoordenador', function () {
    return view('escolhaCoordenador');
})->name('escolhaCoordenador');

Route::get('/confirmarVotoCoordenador', function () {
    return view('confirmarVotoCoordenador');
})->name('confirmarVotoCoordenador');

Route::get('/votoRegistrado', function () {
    return view('votoRegistrado');
})->name('votoRegistrado');

Route::get('/opcaoAdm', function () {
    return view('opcaoAdm');
})->name('opcaoAdm');

Route::get('/adicionarCandidato', function () {
    return view('adicionarCandidato');
})->name('adicionarCandidato');

Route::get('/relatorio', function () {
    return view('gerarRelatorio');
})->name('relatorio');

Route::get('/gerenciarEleitores', function () {
    return view('gerenciarEleitores');
})->name('gerenciarEleitores');

Route::get('/adicionarEleitor', function () {
    return view('adicionarEleitor');
})->name('adicionarEleitor');

Route::get('/editarEleitor', function () {
    return view('gerenciarEleitores');
})->name('editarEleitor');

Route::get('/excluirEleitor', function () {
    return view('gerenciarEleitores');
})->name('excluirEleitor');

Route::get('/inicioVotacao', function () {
    return view('inicioVotacao');
})->name('inicioVotacao');

Route::get('/gerenciarCandidato', function () {
    return view('gerenciarCandidato');
})->name('gerenciarCandidato');

Route::get('/editarCandidato', function () {
    return view('gerenciarCandidato');
})->name('editarCandidato');

Route::get('/excluirCandidato', function () {
    return view('gerenciarCandidato');
})->name('excluirCandidato');

Route::get('/gerarRelatorio', function () {
    return view('gerarRelatorio');
})->name('gerarRelatorio');