<?php

use Illuminate\Database\Seeder;
use App\Models\Movimentacao;

class MovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimentacao::create([
            'tipo_movimentacao'=> 'entrada',
            'valor'     => 100,
            'observacao'  => "Bonus",
            'funcionario_id'  => 1,
            'administrador_id'  => 1,
        ]);
    }
}
