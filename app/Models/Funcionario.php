<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    protected $fillable = [
        'nome_completo',
        'login',
        'senha',
        'saldo_atual',
        'administrador_id',
    ];

    protected $dates = ['data_criacao','data_alteracao'];

    public function movimentacao()
    {
        return $this->hasMany('App\Models\Movimentacao');
    }
}
