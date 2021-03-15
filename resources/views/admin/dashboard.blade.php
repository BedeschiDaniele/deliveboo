@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Piatti</a>
        <a class="btn btn-secondary" href="">Ordini</a>
    </div>
@endsection
