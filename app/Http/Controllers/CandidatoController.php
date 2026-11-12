<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Pessoa;
use App\Models\Escola;
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
        $escolas = Escola::orderBy('nome')->get();

        return view('adicionarCandidato', compact('escolas')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:pessoas,email',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf',
            'data_nascimento' => 'required|date',
            'cargo' => 'required|string|max:100',
            'escola_id' => 'required|exists:escolas,id',
        ]);

        $pessoa = Pessoa::create($request->only('nome', 'email', 'cpf', 'data_nascimento'));

        Candidato::create([
            'cargo' => $request->cargo,
            'pessoa_id' => $pessoa->id,
            'escola_id' => $request->escola_id,
        ]);

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato adicionado com sucesso.');
    }

    public function edit($id)
    {
        $candidato = Candidato::with('pessoa')->findOrFail($id);
        $escolas = Escola::orderBy('nome')->get();

        return view('editarCandidato', compact('candidato', 'escolas'));
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
            'escola_id' => 'required|exists:escolas,id',
        ]);

        $candidato->pessoa->update($request->only('nome', 'email', 'cpf', 'data_nascimento'));

        $candidato->update([
            'cargo' => $request->cargo,
            'escola_id' => $request->escola_id,
        ]);

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();

        return redirect()->route('gerenciarCandidato')->with('sucesso', 'Candidato excluído com sucesso.');
    }

    public function porEscola(Escola $escola)
    {
        $candidatos = Candidato::daEscola($escola->id)
            ->with('pessoa:id,nome')
            ->get()
            ->map(fn($c) => [
                'id' => $c->id,
                'nome' => $c->pessoa->nome,
                'cargo' => mb_strtolower($c->cargo),
            ]);

        return response()->json($candidatos);
    }
}