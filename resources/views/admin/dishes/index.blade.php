@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Tutti i piatti</h1>
    @if(session()->get('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div><br />
    @elseif (session()->get('deleted'))
    <div class="alert alert-danger">
        {{ session()->get('deleted') }}
    </div><br />
    @endif
    <div class="clearfix my-4">
        <a href="{{ route('admin.dashboard') }}" class="btn dashboard-btn-back mb-4">Torna alla dashboard</a>
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary dashboard-btn float-right">Crea un nuovo
            piatto</a>
    </div>

    <div id="dashboard-dishes">
        <div class="row">
            @foreach ($dishes as $dish)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-black text-center">
                    <img class="card-img-top" src="{{ asset('storage/' . $dish->img_path) }}"
                        alt="{{ $dish->name }}">
                    <div class="card-body dashboard-card">
                        @if ($dish->visible == false)
                            <i class="fas fa-eye-slash"></i>
                        @endif

                        @if (strlen($dish->name) > 25)
                            <h5 class="card-title">{{ substr($dish->name,0,22). "..." }}</h5> 
                        @else
                            <h5 class="card-title">{{ $dish->name }}</h5>
                        @endif

                        <div>
                            <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-lg btn-primary">Mostra</a>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>


    </div>

    {{-- <table class="table table-striped table-bordered table-dark table-index">
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
        <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-success"><i
                class="fas fa-pencil-alt"></i></a>
    </td>
    <td>
        <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST"
            onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table> --}}

</div>

@endsection
