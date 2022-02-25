<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacao';

    const CREATED_AT = 'data_criacao';

    protected $fillable = [
        'tipo_movimentacao',
        'valor',
        'observacao',
        'funcionario_id',
        'administrador_id',
    ];
}
