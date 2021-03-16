@extends('layouts.app')
@section('content')
    <div class="container text-center" id="dashboard-cards">
        {{-- <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Piatti</a>
        <a class="btn btn-secondary" href="">Ordini</a> --}}
        <div class="card">
            <img class="card-img-top dashboard-card" src="{{ asset('img/dashboard/food.jpg') }}" alt="Piatti">
            <div class="card-body dashboard-card">
                <a class="btn btn-lg btn-primary dashboard-btn" href="{{ route('admin.dishes.index') }}">Piatti</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top dashboard-card" src="{{ asset('img/dashboard/cart.jpg') }}" alt="Piatti">
            <div class="card-body dashboard-card">
                <a class="btn btn-lg btn-primary dashboard-btn" href="#">Ordini</a>
            </div>
        </div>
    </div>
@endsection
