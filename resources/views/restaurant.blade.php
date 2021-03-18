@extends('layouts.guest.main')

@section('content')
<div id="cart">
  <div class="mycontainer">
    <div class="menu">
      <h1>Ristorante {{$restaurant->name}}</h1>
      @foreach ($restaurant->dishes as $dish)
          <p>{{$dish->name}}</p>
          <div>
            <span @click='addToCart({!! json_encode($dish) !!})'>Aggiungi</span>
          </div>
      @endforeach
    </div>
    <div class="show-cart" v-for='item in cart'>
      <h3>@{{item.name}}</h3>
      <span>@{{item.price}}</span>
    </div>
    
  </div>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection