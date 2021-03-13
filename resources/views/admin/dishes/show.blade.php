@extends('layouts.admin.dashboard')

@section('content')
 
  <div class="clearfix my-4">
    <h1 class="float-left">Dettaglio Piatto "{{ $dish->name }}"</h1>
    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary float-right mb-4">Elenco piatti</a>
  </div>

  <table class="table table-striped table-bordered my-4">
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
            <img src="{{ asset('storage/' . $dish->img_path) }}" alt="" style="max-width: 300px">
        </td>
    </tr>
    <tr>
        <td><strong>Prezzo</strong></td>
        <td>{{ $dish->price }}</td>
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
@endsection
