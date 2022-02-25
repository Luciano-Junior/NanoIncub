<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacao';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    protected $fillable = [
        'tipo_movimentacao',
        'valor',
        'observacao',
        'funcionario_id',
        'administrador_id',
    ];

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario');
    }
}
