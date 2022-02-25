@extends('layouts.app')
@section('title', 'Dashboard - NanoIncub')
@section('content')
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Funcionário</h1>
            <a href="/funcionario/create" class="btn btn-success">
                <i class="fa fa-plus"></i> Novo
            </a>
        </div>

        <div class="row mb-3">
            <form class="form-inline" method="POST" action="{{route('funcionario.filter')}}">
                @csrf
                <div class="form-group mx-sm-3 mx-auto mb-2">
                    <label for="nome" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="{{isset($nome) ? $nome : ''}}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="data" class="sr-only">Data Cadastro</label>
                    <input type="date" class="form-control" id="data" placeholder="Data de Cadastro" name="data" value="{{isset($data) ? $data : ''}}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
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
                    <th scope="col">Nome</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                    <tr>
                        <th scope="row">{{$funcionario->id}}</th>
                        <td>{{$funcionario->nome_completo}}</td>
                        <td>{{$funcionario->saldo_atual}}</td>
                        <td>{{$funcionario->data_criacao->format("d/m/Y")}}</td>
                        <td>
                            <a class="btn btn-sm btn-primary"href="{{route('funcionario.edit',$funcionario->id)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-primary"href="{{route('funcionario.extrato',$funcionario->id)}}"><i class="fa fa-file"></i></a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')" href="{{route('funcionario.delete',$funcionario->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if(count($funcionarios) == 0)
                    <tr>
                        <td colspan="5">Nenhum resultado encontrado!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {!! $funcionarios->links() !!}

            </div>

        </div>  

    </div>
    <!-- /.container-fluid -->

</div>
@endsection