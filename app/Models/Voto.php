<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $fillable = ['hash', 'data_voto', 'eleicao_id', 'chapa_id', 'eleitor_id'];

    public function eleicao()
    {
        return $this->belongsTo(Eleicao::class);
    }

    public function chapa()
    {
        return $this->belongsTo(Chapa::class);
    }

    public function eleitor()
    {
        return $this->belongsTo(Eleitor::class);
    }
}