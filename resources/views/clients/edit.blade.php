@extends('layouts.app')

@section('title', 'Edição de clientes')

@section('content')
<div class="container mt-5">
    <h1>Edição de cliente</h1>
    <hr>
    <form action="{{ route('clients-update', ['id' => $client->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ $client->name }}" placeholder="Digite um nome...">
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" value="{{ $client->email }}" placeholder="Digite um e-mail...">
            </div>
            <br>
            <div class="form-group">
                <label for="cpfCnpj">Cpf ou Cnpj:</label>
                <input type="text" class="form-control" name="cpfCnpj" value="{{ $client->cpfCnpj }}" placeholder="Digite o documento...">
            </div>
            <br>
            <div class="form-group">
                <label for="phoneNumber">Telefone:</label>
                <input type="text" class="form-control" name="phoneNumber" value="{{ $client->phoneNumber }}" placeholder="Digite o número de telefone...">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
            </div>
        </div>
    </form>
</div>
@endsection