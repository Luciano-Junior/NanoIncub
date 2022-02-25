@extends('layouts.app')
@section('title', "Dashboard - NanoIncub")
@section('content')
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro de Movimentação</h1>
        </div>
        <form method="POST" action="{{route('movimentacao.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="funcionario">Funcionario</label>
                    <select class="form-control" id="funcionario" name="funcionario">
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->nome_completo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="tipo">Tipo de Movimentacao</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control money" id="valor" name="valor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="observacao">Observação</label>
                <input type="text" class="form-control" id="confirma_senha" name="observacao">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</div>
@endsection