@extends('layouts.app')
@section('title', "Dashboard - NanoIncub")
@section('content')
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro de Funcionário</h1>
        </div>
        <form method="POST" action="{{route('funcionario.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome_completo">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="form-group col-md-4">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
                </div>
                <div class="form-group col-md-4">
                <label for="confirma_senha">Confirma Senha</label>
                <input type="password" class="form-control" id="confirma_senha" name="senha_confirmation">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger  mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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