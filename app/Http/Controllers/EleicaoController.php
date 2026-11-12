<?php

namespace App\Http\Controllers;

use App\Models\Eleicao;
use App\Models\Escola;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EleicaoController extends Controller
{
    public function create()
    {
        $escolas = Escola::all();
        return view('inicioVotacao', compact('escolas'));
    }

    public function fimVotacao()
    {
        // só escolas que têm eleição aberta
        $escolas = Escola::whereIn(
            'id',
            Eleicao::where('status', 'aberta')->pluck('escola_id')
        )->get();

        if ($escolas->isEmpty()) {
            return redirect()->route('opcaoAdm')->withErrors(['erro' => 'Não há votação em andamento.']);
        }

        return view('fimVotacao', compact('escolas'));
    }

    public function finalizarVotacao(Request $request)
    {
        $request->validate([
            'escola_id' => 'required|exists:escolas,id',
        ]);

        $eleicao = Eleicao::where('escola_id', $request->escola_id)
            ->where('status', 'aberta')
            ->first();

        if (!$eleicao) {
            return back()->withErrors(['escola_id' => 'Não há votação em andamento nessa escola.']);
        }

        $eleicao->status = 'encerrada';
        $eleicao->data_fim = now();
        $eleicao->save();

        return redirect()->route('opcaoAdm')->with('sucesso', 'Votação finalizada com sucesso.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'escola_id' => 'required|exists:escolas,id',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $dataInicio = Carbon::parse($request->data . ' ' . $request->hora);

        Eleicao::create([
            'escola_id' => $request->escola_id,
            'admin_id' => session('admin_id'),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataInicio->copy()->addDay(),
            'status' => 'aberta',
        ]);

        return redirect()->route('opcaoAdm')->with('sucesso', 'Votação iniciada com sucesso.');
    }
}