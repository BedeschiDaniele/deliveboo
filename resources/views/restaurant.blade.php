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
    <div class="show-cart" v-for='dish in cart'>
      <h3>@{{dish.item.name}}</h3>
      <span style="font-size: 30px" @click='decreaseQuantity(dish)'>-</span>
      <span>@{{dish.quantity}}</span>
      <span style="font-size: 30px" @click='increaseQuantity(dish)'>+</span>
    </div>
    <span>@{{calculateTotal}}</span>
    <div>
      <a href="{{ route('checkout', $restaurant->slug) }}">Vai al checkout</a>
    </div>
    <div>
      <a href="#" @click='checkout'>LocalStorage</a>
    </div>
    
  </div>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection