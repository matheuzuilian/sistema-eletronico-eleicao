<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['cargo', 'escola_id', 'eleicao_id', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function eleicao()
    {
        return $this->belongsTo(Eleicao::class);
    }

    public function scopeDaEscola($query, $escolaId)
    {
        return $query->where('escola_id', $escolaId);
    }
}