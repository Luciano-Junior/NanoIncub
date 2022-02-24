@extends('layouts.app')
@section('title', 'Dashboard - NanoIncub')
@section('content')
    <div id="wrapper">

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Funcionário</h1>
    <button class="btn btn-success">
       <i class="fa fa-plus"></i> Novo
    </button>
</div>

<div class="row mb-3">
    <form class="form-inline">
        <div class="form-group mx-sm-3 mx-auto mb-2">
            <label for="nome" class="sr-only">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="data" class="sr-only">Data Cadastro</label>
            <input type="date" class="form-control" id="data" placeholder="Data de Cadastro">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
</div>

<div class="row">

    <div class="col-lg-12">

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Saldo</th>
            <th scope="col">Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
        </tbody>
    </table>

    </div>

</div>  

</div>
<!-- /.container-fluid -->

    </div>
@endsection