<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleitor;
use App\Models\Escola;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class EleitorController extends Controller
{
    public function autenticar(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'senha' => 'required|string',
        ]);

        $eleitor = Eleitor::whereHas('pessoa', function ($query) use ($request) {
            $query->where('cpf', $request->cpf);
        })->first();

        if (!$eleitor || !Hash::check($request->senha, $eleitor->senha)) {
            return back()->withErrors(['login' => 'CPF ou senha inválidos.']);
        }

        if ($eleitor->votou) {
            return back()->withErrors(['login' => 'Este eleitor já votou.']);
        }

        session(['eleitor_id' => $eleitor->id]);

        return redirect()->route('escolhaChapa');
    }
    public function index()
    {
        $eleitores = Eleitor::with('pessoa', 'escola')->get();
        return view('gerenciarEleitores', compact('eleitores'));
    }

    public function create()
    {
        $escolas = Escola::all();
        return view('adicionarEleitor', compact('escolas'));
    }

    public function store(Request $request)
    {
        $alfabeto = 'abcdefghjkmnpqrstuvwxyz23456789';
        $senhaPlana = '';
        for ($i = 0; $i < 8; $i++) {
            $senhaPlana .= $alfabeto[random_int(0, strlen($alfabeto) - 1)];
        }

        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:pessoas,email',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf',
            'dataNascimento' => 'required|date',
            'matricula' => 'nullable|required_if:tipo,professor,aluno|string|unique:eleitores,matricula',
            'tipo' => 'required|string|in:professor,aluno,responsavel',
            'escola_id' => 'required|exists:escolas,id',
        ]);

        $pessoa = Pessoa::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->dataNascimento,
        ]);

        Eleitor::create([
            'matricula' => $request->matricula,
            'tipo' => $request->tipo,
            'senha' => Hash::make($senhaPlana),
            'votou' => false,
            'pessoa_id' => $pessoa->id,
            'escola_id' => $request->escola_id,
        ]);

        return redirect()->route('gerenciarEleitores')
            ->with('senha_gerada', $senhaPlana)
            ->with('sucesso', 'Eleitor cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $eleitor = Eleitor::with('pessoa')->findOrFail($id);
        $escolas = Escola::all();
        return view('editarEleitor', compact('eleitor', 'escolas'));
    }

    public function update(Request $request, $id)
    {
        $eleitor = Eleitor::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:pessoas,email,' . $eleitor->pessoa_id,
            'cpf' => 'required|string|size:11|unique:pessoas,cpf,' . $eleitor->pessoa_id,
            'dataNascimento' => 'required|date',
            'matricula' => 'nullable|required_if:tipo,professor,aluno|string|unique:eleitores,matricula,' . $eleitor->id,
            'tipo' => 'required|string|in:professor,aluno,responsavel',
            'escola_id' => 'required|exists:escolas,id',
        ]);

        $eleitor->pessoa->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->dataNascimento,
        ]);

        $eleitor->update([
            'matricula' => $request->matricula,
            'tipo' => $request->tipo,
            'escola_id' => $request->escola_id,
        ]);

        return redirect()->route('gerenciarEleitores')->with('sucesso', 'Eleitor atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $eleitor = Eleitor::findOrFail($id);
        $eleitor->delete();

        return redirect()->route('gerenciarEleitores')->with('sucesso', 'Eleitor excluído com sucesso.');
    }

}

