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
              <label class="label">Nome</label>
              <input type="text" name="customer_name" placeholder="Inserisci il tuo nome">
            </div>
            <div class="user-surname">
              <label class="label">Cognome</label>
              <input type="text" name="customer_surname" placeholder="Inserisci il tuo cognome">
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
        <div class="shopping-cart">
          <h2>Carrello<i class="fas fa-shopping-cart"></i></h2>
          <div class="show-cart" v-for='dish in cart'>
            <div>
              <span @click='decreaseQuantity(dish)'><i class="far fa-minus-square"></i></span>
            </div>
            <div>
              <span>@{{dish.quantity}}</span>
            </div>
            <div>
              <span @click='increaseQuantity(dish)'><i class="far fa-plus-square"></i></span>
            </div>
            <div>
              <img class="" :src="'../../storage/' + dish.item.img_path" :alt="dish.item.name">
            </div>
            <div>
              <span>@{{dish.item.name}}</span>
              <span>@{{dish.item.price}}&euro;</span>
            </div>
           </div>
          <span id="total"><strong>Totale ordine:</strong> @{{calculateTotal}}&euro;</span>
        </div>


        <input type = "hidden" name = "total_price" :value = "calculateTotal" />
        <input v-for ="dish in cart" type = "hidden" name = "dishes[]" :value = "dish.item.id"/>
        <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>
      </div>
      {{-- Braintree --}}
      <div id="dropin-wrapper">
        <div id="checkout-message"></div>
        <div id="dropin-container"></div>
        <button id="submit-button">Submit payment</button>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}"></script>
@endsection



