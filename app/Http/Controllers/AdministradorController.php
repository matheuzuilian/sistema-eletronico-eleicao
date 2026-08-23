<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function autenticar(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'senha' => 'required|string',
        ]);

        $admin = Administrador::whereHas('pessoa', function ($query) use ($request) {
            $query->where('cpf', $request->cpf);
        })->first();

        if (!$admin || $admin->senha !== $request->senha) {
            return back()->withErrors(['login' => 'CPF ou senha inválidos.']);
        }

        session(['admin_id' => $admin->id]);

        return redirect()->route('opcaoAdm');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('loginAdm');
    }
}