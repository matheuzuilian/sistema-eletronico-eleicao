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