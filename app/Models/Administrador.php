<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;
    protected $table = 'administrador';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    protected $fillable = [
        'nome_completo',
        'login',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword(){
        return $this->senha;
    }
    
}
