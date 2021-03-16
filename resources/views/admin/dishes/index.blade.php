@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div><br/>
        @elseif (session()->get('deleted'))
                <div class="alert alert-danger">
                    {{ session()->get('deleted') }}
                </div><br/>
        @endif

        <h1 class="text-center">Tutti i piatti</h1>
        <div class="clearfix my-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-4">Torna alla dashboard</a>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary dashboard-btn float-right">Crea un nuovo piatto</a>
        </div>    
        <table class="table table-striped table-bordered table-dark table-index">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome del piatto</th>
                    <th>Descrizione</th>
                    <th>Prezzo</th>
                    <th>Visibilità</th>
                    <th>Immagine caricata</th>
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
                        <td>
                        @if ( $dish->visible )
                        SI
                        @else
                            NO
                        @endif 
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
                        </td>
                        <td>
                            <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-primary"><i class="fas fa-search"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

@endsection
