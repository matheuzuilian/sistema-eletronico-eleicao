<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $pessoa = Pessoa::create([
            'nome' => 'Administrador Geral',
            'email' => 'admin@escola.com',
            'cpf' => '00000000000',
            'data_nascimento' => '1990-01-01',
        ]);

        Administrador::create([
            'senha' => 'admin123', // depois trocamos por hash
            'pessoa_id' => $pessoa->id,
        ]);
    }
}