@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">{{ $dish->name }}</h1>
    <div class="clearfix my-4">
      <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary mb-4">Torna all'elenco piatti</a>
    </div>

    <table class="table table-striped table-bordered table-dark table-show my-4">
        <tr>
            <td><strong>ID</strong></td>
            <td>{{ $dish->id }}</td>
        </tr>
        <tr>
            <td><strong>Nome del piatto</strong></td>
            <td>{{ $dish->name }}</td>
        </tr>
        <tr>
            <td><strong>Immagine</strong></td>
            <td>
                <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
            </td>
        </tr>
        <tr>
            <td><strong>Prezzo</strong></td>
            <td>{{ $dish->price }} €</td>
        </tr>
        <tr>
            <td><strong>Descrizione</strong></td>
            <td>{{ $dish->description }}</td>
        </tr>
        <tr>
            <td><strong>Visibilità</strong></td>
            <td>
                @if ( $dish->visible )
                SI
                @else
                NO
                @endif
            </td>
        </tr>
    </table>
</div>
@endsection
