<?php

namespace App\Http\Controllers\Movimentacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movimentacao;
use App\Models\Funcionario;

class MovimentacaoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentacoes = Movimentacao::paginate(5);
        return view('movimentacao.index', compact('movimentacoes'));
    }

    public function filter(Request $request){
        $nome = $request->nome;
        $data = $request->data;
        $tipo = $request->tipo;

        $movimentacoes = Movimentacao::when($nome != null && $nome != '', function($q) use ($nome){
            $q->where('nome_completo',"like","%".$nome."%");
        })
        ->when($data != null && $data != '', function($q) use ($data){
            $q->whereDate('data_criacao',\Carbon\Carbon::parse($data)->format('Y-m-d'));
        })
        ->when($tipo != null && $tipo != '', function($q) use ($tipo){
            $q->where('tipo_movimentacao', $tipo);
        })
        ->paginate(5);

        return view('movimentacao.index', compact('movimentacoes','nome','data', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('movimentacao.create', compact('funcionarios'));
    }
}
