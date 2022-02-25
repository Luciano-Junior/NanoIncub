@extends('layouts.app')
@section('title', 'Dashboard - NanoIncub')
@section('content')
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Extrato | {{$movimentacoes->nome_completo}}</h1>
            <a href="{{url()->previous()}}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            </div>
        @endif
        <div class="row">

            <div class="col-lg-12">

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Funcionário</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimentacoes->movimentacao as $movimentacao)
                        
                    <tr>
                        <th scope="row">{{$movimentacao->id}}</th>
                        <td>{{$movimentacao->tipo_movimentacao}}</td>
                        <td>{{$movimentacao->valor}}</td>
                        <td>{{$movimentacao->funcionario->nome_completo}}</td>
                        <td>{{$movimentacao->observacao}}</td>
                        <td>{{$movimentacao->data_criacao->format("d/m/Y")}}</td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>

            </div>

        </div>  

    </div>
    <!-- /.container-fluid -->

</div>
@endsection