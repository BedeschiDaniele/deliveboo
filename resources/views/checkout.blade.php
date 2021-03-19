@extends('layouts.guest.main')


@section('content')
<div id="checkout">
  <div class="mycontainer">
    <div class="menu">
      <h1>Ristorante {{$restaurant->name}}</h1>
    </div>
    <form action="{{ route('store', $restaurant->slug) }}" method="POST">
      @method('POST')
      @csrf
      <input type="text" name="customer_name" placeholder="Inserisci il tuo nome">
      <input type="text" name="customer_address" placeholder="Inserisci l'indirizzo">
      <input type="text" name="customer_phone" placeholder="Inserisci un numero di telefono">
      <textarea name="notes" rows="6"></textarea>
      <input type = "hidden" name = "total_price" :value = "calculateTotal" />
      
      <button type="submit">Invia ordine</button>
    </form>
    <div class="show-cart" v-for='dish in cart'>
      <h3>@{{dish.item.name}}</h3>
      <span style="font-size: 30px" @click='decreaseQuantity(dish)'>-</span>
      <span>@{{dish.quantity}}</span>
      <span style="font-size: 30px" @click='increaseQuantity(dish)'>+</span>
    </div>
    
    <span>@{{calculateTotal}}</span>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}"></script>
@endsection