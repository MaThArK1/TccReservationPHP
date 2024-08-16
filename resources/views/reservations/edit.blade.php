@extends('layouts.app')

@section('title', 'Edição de reserva')

@section('content')
<div class="container mt-5">
    <h1>Edição de reserva</h1>
    <hr>
    <form action="{{ route('reservations-update', ['id' => $reservation->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <div class="form-group">
                <label for="client_id">Cliente:</label>
                <select class="form-select" name ="client_id" aria-label="Default select example">
                    <option value="{{ $reservation->client->id }}" selected>{{ $reservation->client->name }}</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="value">Valor da reserva:</label>
                <input type="number" step="0.01"  class="form-control" name="value" value="{{ $reservation->value }}" placeholder="Digite o valor...">
            </div>
            <br>
            <div class="form-group">
                <label for="initDate">Inicio</label>
                <input type="datetime-local" class="form-control" name="initDate" value="{{ $reservation->initDate }}" placeholder="Digite a data e hora de início da reserva...">
            </div>
            <br>
            <div class="form-group">
                <label for="endDate">Final</label>
                <input type="datetime-local" class="form-control" name="endDate" value="{{ $reservation->endDate }}" placeholder="Digite a data e hora de saída da reserva...">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
            </div>
        </div>
    </form>
</div>
@endsection