<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    public function index()
    {
        $escolas = Escola::all();
        return view('gerenciarEscola', compact('escolas'));
    }

    public function create()
    {
        return view('adicionarEscola');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
        ]);

        Escola::create($request->only('nome', 'cidade', 'estado'));

        return redirect()->route('gerenciarEscola')->with('sucesso', 'Escola cadastrada com sucesso.');
    }

    public function edit($id)
    {
        $escola = Escola::findOrFail($id);
        return view('editarEscola', compact('escola'));
    }

    public function update(Request $request, $id)
    {
        $escola = Escola::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:150',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
        ]);

        $escola->update($request->only('nome', 'cidade', 'estado'));

        return redirect()->route('gerenciarEscola')->with('sucesso', 'Escola atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $escola = Escola::findOrFail($id);
        $escola->delete();

        return redirect()->route('gerenciarEscola')->with('sucesso', 'Escola excluída com sucesso.');
    }
}