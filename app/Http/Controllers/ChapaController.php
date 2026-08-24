<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Chapa;
use App\Models\Eleicao;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChapaController extends Controller
{
    private function candidatoJaEmChapa($candidatoId, $ignorarChapaId = null)
    {
        return Chapa::where(function ($q) use ($candidatoId) {
                $q->where('diretor_id', $candidatoId)
                  ->orWhere('coordenador1_id', $candidatoId)
                  ->orWhere('coordenador2_id', $candidatoId);
            })
            ->when($ignorarChapaId, fn ($q) => $q->where('id', '!=', $ignorarChapaId))
            ->exists();
    }

    private function candidatosDisponiveis($cargo, $eleicaoId, $ignorarChapaId = null)
    {
        $ocupados = Chapa::when($ignorarChapaId, fn ($q) => $q->where('id', '!=', $ignorarChapaId))
            ->get()
            ->flatMap(fn ($c) => [$c->diretor_id, $c->coordenador1_id, $c->coordenador2_id])
            ->filter()
            ->unique();

        return Candidato::with('pessoa')
            ->where('eleicao_id', $eleicaoId)
            ->where('cargo', $cargo)
            ->whereNotIn('id', $ocupados)
            ->get();
    }

    public function index()
    {
        $chapas = Chapa::with('eleicao', 'diretor.pessoa', 'coordenador1.pessoa', 'coordenador2.pessoa')->get();
        return view('gerenciarChapa', compact('chapas'));
    }

    public function create()
    {
        $eleicoes = Eleicao::all();
        return view('adicionarChapa', compact('eleicoes'));
    }

    // Chamado via AJAX/reload ao escolher a eleição no formulário, para popular os selects
    public function candidatosPorEleicao(Request $request)
    {
        $eleicaoId = $request->query('eleicao_id');

        return response()->json([
            'diretores' => $this->candidatosDisponiveis('diretor', $eleicaoId)
                ->map(fn ($c) => ['id' => $c->id, 'nome' => $c->pessoa->nome]),
            'coordenadores' => $this->candidatosDisponiveis('coordenador', $eleicaoId)
                ->map(fn ($c) => ['id' => $c->id, 'nome' => $c->pessoa->nome]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:10',
            'eleicao_id' => 'required|exists:eleicoes,id',
            'diretor_id' => 'required|exists:candidatos,id|different:coordenador1_id|different:coordenador2_id',
            'coordenador1_id' => 'required|exists:candidatos,id|different:coordenador2_id',
            'coordenador2_id' => 'required|exists:candidatos,id',
        ]);

        foreach (['diretor_id', 'coordenador1_id', 'coordenador2_id'] as $campo) {
            if ($this->candidatoJaEmChapa($request->$campo)) {
                return back()->withErrors([$campo => 'Este candidato já está em outra chapa.'])->withInput();
            }
        }

        Chapa::create($request->only('numero', 'eleicao_id', 'diretor_id', 'coordenador1_id', 'coordenador2_id'));

        return redirect()->route('gerenciarChapa')->with('sucesso', 'Chapa cadastrada com sucesso.');
    }

    public function edit($id)
    {
        $chapa = Chapa::findOrFail($id);
        $eleicoes = Eleicao::all();

        $diretores = $this->candidatosDisponiveis('diretor', $chapa->eleicao_id, $chapa->id)
            ->push($chapa->diretor)->unique('id');
        $coordenadores = $this->candidatosDisponiveis('coordenador', $chapa->eleicao_id, $chapa->id)
            ->push($chapa->coordenador1)->push($chapa->coordenador2)->unique('id');

        return view('editarChapa', compact('chapa', 'eleicoes', 'diretores', 'coordenadores'));
    }

    public function update(Request $request, $id)
    {
        $chapa = Chapa::findOrFail($id);

        $request->validate([
            'numero' => 'required|string|max:10',
            'eleicao_id' => 'required|exists:eleicoes,id',
            'diretor_id' => 'required|exists:candidatos,id|different:coordenador1_id|different:coordenador2_id',
            'coordenador1_id' => 'required|exists:candidatos,id|different:coordenador2_id',
            'coordenador2_id' => 'required|exists:candidatos,id',
        ]);

        foreach (['diretor_id', 'coordenador1_id', 'coordenador2_id'] as $campo) {
            if ($this->candidatoJaEmChapa($request->$campo, $chapa->id)) {
                return back()->withErrors([$campo => 'Este candidato já está em outra chapa.'])->withInput();
            }
        }

        $chapa->update($request->only('numero', 'eleicao_id', 'diretor_id', 'coordenador1_id', 'coordenador2_id'));

        return redirect()->route('gerenciarChapa')->with('sucesso', 'Chapa atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $chapa = Chapa::findOrFail($id);
        $chapa->delete();

        return redirect()->route('gerenciarChapa')->with('sucesso', 'Chapa excluída com sucesso.');
    }
}