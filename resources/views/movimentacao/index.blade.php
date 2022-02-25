@extends('layouts.app')
@section('title', 'Dashboard - NanoIncub')
@section('content')
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Movimentações</h1>
            <a href="/movimentacao/create" class="btn btn-success">
                <i class="fa fa-plus"></i> Novo
            </a>
        </div>

        <div class="row mb-3">
            <form class="form-inline" method="POST" action="{{route('movimentacao.filter')}}">
                @csrf
                <div class="form-group mx-sm-3 mx-auto mb-2">
                    <label for="nome" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="{{isset($nome) ? $nome : ''}}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="data" class="sr-only">Data Cadastro</label>
                    <input type="date" class="form-control" id="data" placeholder="Data de Cadastro" name="data" value="{{isset($data) ? $data : ''}}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="tipo" class="sr-only">Tipo Movimentação</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="">Escolha...</option>
                        <option value="entrada" {{ isset($tipo) && $tipo == "entrada" ? 'selected' : ''}}>Entrada</option>
                        <option value="saida" {{ isset($tipo) && $tipo == "saida" ? 'selected':''}}>Saida</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
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
                    @foreach ($movimentacoes as $movimentacao)
                    <tr>
                        <th scope="row">{{$movimentacao->id}}</th>
                        <td>{{$movimentacao->tipo_movimentacao}}</td>
                        <td>{{$movimentacao->valor}}</td>
                        <td>{{$movimentacao->funcionario->nome_completo}}</td>
                        <td>{{$movimentacao->observacao}}</td>
                        <td>{{$movimentacao->data_criacao->format("d/m/Y")}}</td>
                    </tr>
                    @endforeach
                    
                    @if(count($movimentacoes) == 0)
                    <tr>
                        <td colspan="6">Nenhum resultado encontrado!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {!! $movimentacoes->links() !!}

            </div>

        </div>  

    </div>
    <!-- /.container-fluid -->

</div>
@endsection