<?php

namespace App\Http\Controllers\Movimentacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movimentacao;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

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

        $movimentacoes = Movimentacao::select("movimentacao.*")
        ->join('funcionario',"funcionario.id",'movimentacao.funcionario_id')
        ->when($nome != null && $nome != '', function($q) use ($nome){
            $q->where('nome_completo',"like","%".$nome."%");
        })
        ->when($tipo != null && $tipo != '', function($q) use ($tipo){
            $q->where('tipo_movimentacao',$tipo);
        })
        ->when($data != null && $data != '', function($q) use ($data){
            $q->whereDate('movimentacao.data_criacao',\Carbon\Carbon::parse($data)->format('Y-m-d'));
        })
        ->paginate();
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'tipo' => 'required',
            'valor' => 'required',
            'observacao' => 'required',
            'funcionario' => 'required|numeric',
        ]);

        $movimentacao = new Movimentacao();
        $movimentacao->tipo_movimentacao = $request->tipo;
        $movimentacao->valor = (float)$request->valor;
        $movimentacao->observacao = $request->observacao;
        $movimentacao->funcionario_id = $request->funcionario;
        $movimentacao->administrador_id = Auth::id();

        $movimentacao->save();

        if($request->tipo == "entrada"){
            Funcionario::find($request->funcionario)->increment('saldo_atual',(float)$request->valor);
        }else{
            Funcionario::find($request->funcionario)->decrement('saldo_atual',(float)$request->valor);
        }
        
        return redirect()->route('movimentacao.index')->with('success',"Dados salvos com sucesso!");
    }
}
