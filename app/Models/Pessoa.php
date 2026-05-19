<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'email', 'cpf', 'data_nascimento'];

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

    public function eleitor()
    {
        return $this->hasOne(Eleitor::class);
    }

    public function candidato()
    {
        return $this->hasOne(Candidato::class);
    }
}
