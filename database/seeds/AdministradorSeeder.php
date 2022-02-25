<?php

use Illuminate\Database\Seeder;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            'nome_completo'      => 'Administrador',
            'login'     => 'administrador@nanoincub.com.br',
            'senha'  => bcrypt('password'),
        ]);
    }
}
