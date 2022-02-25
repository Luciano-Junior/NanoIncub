<?php

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'nome_completo'      => 'Luciano da Silva Marques Junior',
            'login'     => 'luciano@nanoincub.com.br',
            'senha'  => bcrypt('123456'),
            'saldo_atual'  => 100,
            'administrador_id'  => 1,
        ]);

        Funcionario::create([
            'nome_completo'      => 'Vinicius Incuber',
            'login'     => 'vinicius@nanoincub.com.br',
            'senha'  => bcrypt('123456'),
            'saldo_atual'  => 0,
            'administrador_id'  => 1,
        ]);
    }
}
