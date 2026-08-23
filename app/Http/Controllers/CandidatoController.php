<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Eleicao;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::with('pessoa')->get();
        return view('gerenciarCandidato', compact('candidatos'));
    }

    public function create()
    {
        $eleicoes = Eleicao::all();
        return view('adicionarCandidato', compact('eleicoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:pessoas,email',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf',
            'data_nascimento' => 'required|date',
            'cargo' => 'required|string|max:100',
            'numero' => 'required|integer',
            'proposta' => 'required|string',
            'eleicao_id' => 'required|exists:eleicoes,id',
        ]);

        $pessoa = Pessoa::create($request->only('nome', 'email', 'cpf', 'data_nascimento'));

        Candidato::create([
            'cargo' => $request->cargo,
            'numero' => $request->numero,
            'proposta' => $request->proposta,
            'eleicao_id' => $request->eleicao_id,
            'pessoa_id' => $pessoa->id,
        ]);

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato adicionado com sucesso.');
    }

    public function edit($id)
    {
        $candidato = Candidato::with('pessoa')->findOrFail($id);
        $eleicoes = Eleicao::all();
        return view('editarCandidato', compact('candidato', 'eleicoes'));
    }

    public function update(Request $request, $id)
    {
        $candidato = Candidato::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:pessoas,email,' . $candidato->pessoa_id,
            'cpf' => 'required|string|size:11|unique:pessoas,cpf,' . $candidato->pessoa_id,
            'data_nascimento' => 'required|date',
            'cargo' => 'required|string|max:100',
            'numero' => 'required|integer',
            'proposta' => 'required|string',
            'eleicao_id' => 'required|exists:eleicoes,id',
        ]);

        $candidato->pessoa->update($request->only('nome', 'email', 'cpf', 'data_nascimento'));

        $candidato->update([
            'cargo' => $request->cargo,
            'numero' => $request->numero,
            'proposta' => $request->proposta,
            'eleicao_id' => $request->eleicao_id,
        ]);

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato excluído com sucesso.');
    }
}