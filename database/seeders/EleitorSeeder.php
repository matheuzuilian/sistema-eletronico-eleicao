<?php

namespace Database\Seeders;

use App\Models\Eleitor;
use App\Models\Escola;
use App\Models\Pessoa;
use Hash;
use Illuminate\Database\Seeder;

class EleitorSeeder extends Seeder
{
    public function run(): void
    {
        $escola = Escola::first() ?? Escola::create([
            'nome' => 'Escola Teste', // ajuste aos campos da sua tabela escolas
        ]);

        $pessoa = Pessoa::create([
            'nome' => 'Eleitor Teste',
            'email' => 'eleitor@escola.com',
            'cpf' => '11111111111',
            'data_nascimento' => '2000-01-01',
        ]);

        Eleitor::create([
            'matricula' => '20262026',
            'tipo' => 'aluno',
            'senha' => Hash::make('eleitor123'),
            'votou' => false,
            'pessoa_id' => $pessoa->id,
            'escola_id' => $escola->id,
        ]);
    }
}