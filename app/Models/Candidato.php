<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
 
    protected $fillable = ['cargo', 'numero', 'proposta', 'eleicao_id', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function eleicao()
    {
        return $this->belongsTo(Eleicao::class);
    }
}

