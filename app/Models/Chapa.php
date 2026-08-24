<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapa extends Model
{
    protected $fillable = ['numero', 'eleicao_id', 'diretor_id', 'coordenador1_id', 'coordenador2_id'];

    public function eleicao()
    {
        return $this->belongsTo(Eleicao::class);
    }

    public function diretor()
    {
        return $this->belongsTo(Candidato::class, 'diretor_id');
    }

    public function coordenador1()
    {
        return $this->belongsTo(Candidato::class, 'coordenador1_id');
    }

    public function coordenador2()
    {
        return $this->belongsTo(Candidato::class, 'coordenador2_id');
    }
}