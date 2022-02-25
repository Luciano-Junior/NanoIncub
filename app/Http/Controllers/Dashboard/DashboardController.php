<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Movimentacao;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $funcionarios = Funcionario::count();
        $movimentacoes = Movimentacao::with('funcionario')->orderBy('id','DESC')->get();
        $movimentacoes_total = Movimentacao::sum('valor');
        return view('dashboard.index', compact('funcionarios','movimentacoes','movimentacoes_total'));
    }
}
