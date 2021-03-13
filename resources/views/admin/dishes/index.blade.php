@extends('layouts.admin.dashboard')

@section('content')
     @if(session()->get('message'))
          <div class="alert alert-success">
               {{ session()->get('message') }}
          </div><br/>
     @elseif (session()->get('deleted'))
          <div class="alert alert-danger">
               {{ session()->get('deleted') }}
          </div><br/>
     @endif

     <div class="clearfix mb-4">
          <h1 class="float-left">Tutti i piatti</h1>
          <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary float-right mb-4">Crea un nuovo piatto</a>
      </div>    
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nome del piatto</th>
                  <th>Descrizione</th>
                  <th>Prezzo</th>
                  <th>Visibile</th>
                  <th>Immagine</th>
                  <th colspan="3"></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($dishes as $dish)
                  <tr>
                      <td>{{ $dish->id }}</td>
                      <td>{{ $dish->name }}</td>
                      <td>{{ $dish->description }}</td>
                      <td>{{ $dish->price }}</td>
                      <td>{{ $dish->visible }}</td>
                      <td>
                          <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
                      </td>
                      <td>
                          <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-info">Mostra</a>
                      </td>
                      <td>
                          <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-success">Modifica</a>
                      </td>
                      <td>
                          <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <input type="submit" value="Elimina" class="btn btn-danger">
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table> 

@endsection
