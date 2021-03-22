@extends('layouts.guest.main')


{{-- @section('guest.header2')
<div class="mycontainer">
  <div class="login-header-top">
      <h1 id="logo"><a href="{{ url('/') }}">Deliveboo</a></h1>
      <div class="back-restaurant">
          <a class="login" href="{{ route('restaurant', $restaurant->slug) }}">Torna al ristorante</a>
      </div>
  </div>
@endsection --}}

@section('content')
<div id="checkout">
  <div class="restaurant-jumbotron" style="background-image: url({{ asset('storage/' . $restaurant->img_path)}})">
    <div class="overlay"></div>
  <div class="mycontainer">
      <div class="jumbotron-text">
        <h1>{{$restaurant->name}}</h1>
      </div>
  </div>
 </div>
  <div class="mycontainer">
    <form action="{{ route('store', $restaurant->slug) }}" method="POST">
      @method('POST')
      @csrf
      <div class="wrapper">
        <div class="card-user">
          <h2>Dati Utente</h2>
          <div class="name-surname">
            <div class="user-name">
              <label class="label">Nome Cognome</label>
              <input type="text" name="customer_name" placeholder="Inserisci il tuo nome">
            </div>
          </div>
          <div class="email-telephone">
            <div class="user-email">
              <label class="label">Email</label>
              <input type="text" name="customer_email" placeholder="Inserisci una email">
            </div>
            <div class="user-telephone">
              <label class="label">Telefono</label>
              <input type="text" name="customer_phone" placeholder="Inserisci un numero di telefono">
            </div>
          </div>
          <div class="user-address">
            <label class="label">Indirizzo</label>
            <input type="text" name="customer_address" placeholder="Inserisci l'indirizzo">
          </div>
          <label class="label">Note</label>
          <textarea name="notes" rows="6"></textarea>
        </div>

        {{-- Carrello --}}
        <div class="cart-container checkout-cart">
          <div class="cart-top">Il tuo carrello</div>
          <div class="show-cart" v-for='dish in cart'>
            <span class="quantity-section">
              <span class="quantity-btn minus-sign" @click='decreaseQuantity(dish)'>-</span>
              <span class="quantity-number">@{{dish.quantity}}</span>
              <span class="quantity-btn plus-sign" @click='increaseQuantity(dish)'>+</span>
            </span>
            <span class="dish-name">@{{dish.item.name}}</span>
            <span class="dish-price">€ @{{(dish.item.price * dish.quantity).toFixed(2)}}</span>
          </div>

          <div class="total-cart">
            <span>Totale</span>
            <span class="restaurant-total">€ @{{calculateTotal}}</span>
          </div>
        </div>


        <input type = "hidden" name = "total_price" :value = "calculateTotal" />
        <input v-for ="dish in cart" type = "hidden" name = "dishes[]" :value = "dish.item.id"/>
        <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>
      </div>
      {{-- Braintree --}}
      <div id="dropin-wrapper">
        <div id="checkout-message"></div>
        <div id="dropin-container"></div>
        <button class="home-btn" id="submit-button">Submit payment</button>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}"></script>
@endsection



