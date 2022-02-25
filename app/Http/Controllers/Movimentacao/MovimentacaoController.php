<?php

namespace App\Http\Controllers\Movimentacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movimentacao;

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
}
