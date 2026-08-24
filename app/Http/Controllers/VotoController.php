<?php

namespace App\Http\Controllers;

use App\Models\Chapa;
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

    public function escolhaChapa()
    {
        $eleitor = Eleitor::findOrFail(session('eleitor_id'));
        $eleicao = $this->eleicaoAtiva($eleitor);

        $chapas = Chapa::with('diretor.pessoa', 'coordenador1.pessoa', 'coordenador2.pessoa')
            ->where('eleicao_id', $eleicao->id)
            ->get();

        return view('escolhaChapa', compact('chapas'));
    }

    public function confirmarVotoChapa(Request $request)
    {
        $request->validate(['chapa_id' => 'required|exists:chapas,id']);
        session(['voto_chapa_id' => $request->chapa_id]);

        $chapa = Chapa::with('diretor.pessoa', 'coordenador1.pessoa', 'coordenador2.pessoa')
            ->findOrFail($request->chapa_id);

        return view('confirmarVotoChapa', compact('chapa'));
    }

    public function registrarVoto()
    {
        $eleitor = Eleitor::findOrFail(session('eleitor_id'));
        $eleicao = $this->eleicaoAtiva($eleitor);

        $chapaId = session('voto_chapa_id');

        if (!$chapaId) {
            return redirect()->route('escolhaChapa');
        }

        Voto::create([
            'hash' => Str::uuid(),
            'data_voto' => now(),
            'eleicao_id' => $eleicao->id,
            'chapa_id' => $chapaId,
            'eleitor_id' => $eleitor->id,
        ]);

        $eleitor->update(['votou' => true]);

        session()->forget(['eleitor_id', 'voto_chapa_id']);

        return view('votoRegistrado');
    }
}