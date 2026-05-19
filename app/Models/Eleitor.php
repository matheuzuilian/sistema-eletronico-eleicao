<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleitor extends Model
{
    protected $fillable = ['matricula', 'tipo', 'senha', 'votou', 'pessoa_id', 'escola_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }
}
