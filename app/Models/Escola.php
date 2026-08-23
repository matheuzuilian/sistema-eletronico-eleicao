<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = ['nome', 'cidade', 'estado'];

    public function eleitores()
    {
        return $this->hasMany(Eleitor::class);
    }

    public function eleicoes()
    {
        return $this->hasMany(Eleicao::class);
    }
}