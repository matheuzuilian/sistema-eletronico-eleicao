<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    protected $table = 'eleicoes';

    protected $fillable = ['escola_id', 'admin_id', 'data_inicio', 'data_fim', 'status'];
    // resto igual

    public function escola()
{
    return $this->belongsTo(Escola::class);
}
}