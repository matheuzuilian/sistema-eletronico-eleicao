<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Eleicao;
use App\Models\Eleitor;
use App\Models\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VotoController extends Controller
{
    private function eleicaoAtiva(Eleitor $eleitor)
    {
        return Eleicao::where('escola_id', $eleitor->escola_id)
            ->where('status', 'aberta')
            ->firstOrFail();
    }

    public function escolhaDiretor()
    {
        $eleitor = Eleitor::findOrFail(session('eleitor_id'));
        $eleicao = $this->eleicaoAtiva($eleitor);

        $candidatos = Candidato::with('pessoa')
            ->where('eleicao_id', $eleicao->id)
            ->where('cargo', 'diretor')
            ->get();

        return view('escolhaDiretor', compact('candidatos'));
    }

    public function confirmarVotoDiretor(Request $request)
    {
        $request->validate(['candidato_id' => 'required|exists:candidatos,id']);
        session(['voto_diretor_id' => $request->candidato_id]);

        $candidato = Candidato::with('pessoa')->findOrFail($request->candidato_id);
        return view('confirmarVotoDiretor', compact('candidato'));
    }

    public function escolhaCoordenador()
    {
        $eleitor = Eleitor::findOrFail(session('eleitor_id'));
        $eleicao = $this->eleicaoAtiva($eleitor);

        $candidatos = Candidato::with('pessoa')
            ->where('eleicao_id', $eleicao->id)
            ->where('cargo', 'coordenador')
            ->get();

        return view('escolhaCoordenador', compact('candidatos'));
    }

    public function confirmarVotoCoordenador(Request $request)
    {
        $request->validate(['candidato_id' => 'required|exists:candidatos,id']);
        session(['voto_coordenador_id' => $request->candidato_id]);

        $candidato = Candidato::with('pessoa')->findOrFail($request->candidato_id);
        return view('confirmarVotoCoordenador', compact('candidato'));
    }

    public function registrarVoto()
    {
        $eleitor = Eleitor::findOrFail(session('eleitor_id'));
        $eleicao = $this->eleicaoAtiva($eleitor);

        $diretorId = session('voto_diretor_id');
        $coordenadorId = session('voto_coordenador_id');

        if (!$diretorId || !$coordenadorId) {
            return redirect()->route('escolhaDiretor');
        }

        Voto::create([
            'hash' => Str::uuid(),
            'data_voto' => now(),
            'eleicao_id' => $eleicao->id,
            'candidato_id' => $diretorId,
            'eleitor_id' => $eleitor->id,
        ]);

        Voto::create([
            'hash' => Str::uuid(),
            'data_voto' => now(),
            'eleicao_id' => $eleicao->id,
            'candidato_id' => $coordenadorId,
            'eleitor_id' => $eleitor->id,
        ]);

        $eleitor->update(['votou' => true]);

        session()->forget(['eleitor_id', 'voto_diretor_id', 'voto_coordenador_id']);

        return view('votoRegistrado');
    }
}