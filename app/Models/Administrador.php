<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';

    protected $fillable = ['senha', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function eleicoes()
    {
        return $this->hasMany(Eleicao::class, 'admin_id');
    }
}