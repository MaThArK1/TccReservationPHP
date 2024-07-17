@extends('layouts.app')

@section('title', 'Registro de clientes')

@section('content')
<div class="container mt-5">
    <h1>Cadastro de cliente</h1>
    <hr>
    <form action="{{ route('clients-store') }}" method="POST">
    @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" placeholder="Digite um nome...">
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" placeholder="Digite um e-mail...">
            </div>
            <br>
            <div class="form-group">
                <label for="cpfCnpj">Cpf ou Cnpj:</label>
                <input type="text" class="form-control" name="cpfCnpj" placeholder="Digite o documento...">
            </div>
            <br>
            <div class="form-group">
                <label for="phoneNumber">Telefone:</label>
                <input type="text" class="form-control" name="phoneNumber" placeholder="Digite o número de telefone...">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
@endsection