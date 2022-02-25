<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
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
        $funcionarios = Funcionario::with('movimentacao')->paginate(5);
        return view('funcionario.index', compact('funcionarios'));
    }

    public function filter(Request $request){
        $nome = $request->nome;
        $data = $request->data;

        $funcionarios = Funcionario::when($nome != null && $nome != '', function($q) use ($nome){
            $q->where('nome_completo',"like","%".$nome."%");
        })
        ->when($data != null && $data != '', function($q) use ($data){
            $q->whereDate('data_criacao',\Carbon\Carbon::parse($data)->format('Y-m-d'));
        })
        ->paginate(5);

        return view('funcionario.index', compact('funcionarios','nome','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
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
            'nome_completo' => 'required|max:255',
            'login' => 'required|unique:funcionario|min:6',
            'senha' => 'required|confirmed|min:6',
        ]);

        $funcionario = new Funcionario();
        $funcionario->nome_completo = $request->nome_completo;
        $funcionario->login = $request->login;
        $funcionario->senha = Hash::make($request->senha);
        $funcionario->administrador_id = Auth::id();
        $funcionario->saldo_atual = 0;

        $funcionario->save();
        
        return redirect()->route('funcionario.index')->with('success',"Dados salvos com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionario.edit',compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionario.edit',compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_completo' => 'required|max:255',
            'login' => 'required|min:6|unique:funcionario,login,'. $id,
            'senha' => 'confirmed',
        ]);

        $funcionario = Funcionario::find($id);
        $funcionario->nome_completo = $request->nome_completo;
        $funcionario->login = $request->login;
        $funcionario->administrador_id = Auth::id();
        if(isset($request->senha) && $request->senha != ""){
            $funcionario->senha = Hash::make($request->senha);
        }

        $funcionario->save();

        return redirect()->route('funcionario.index')->with('success',"Dados alterados com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect()->route('funcionario.index')->with('success', "Registro excluído com sucesso!");
    }

    public function extrato($id){
        $movimentacoes = Funcionario::with('movimentacao')->where('id',$id)->first();
        // dd($movimentacoes);
        return view('funcionario.extrato',compact('movimentacoes'));
    }

}
