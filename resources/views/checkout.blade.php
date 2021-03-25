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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    
    {{-- Form Dati Utente --}}
    <form action="{{ route('store', $restaurant->slug) }}" id="payment-form" method="POST">
      @method('POST')
      @csrf

      <div class="row">
        <div class="col-12 col-md-6">
          <div class="wrapper">
            <div class="card-user">
              <h2>Dati Utente</h2>
              <div class="name-surname">
                <div class="user-name">
                  <label class="label">Nome e Cognome</label>
                  <input type="text" name="customer_name" placeholder="Inserisci nome e cognome" value="{{ old('customer_name') }}">
                </div>
              </div>
              <div class="email-telephone">
                <div class="user-email">
                  <label class="label">Email</label>
                  <input type="text" name="customer_email" placeholder="Inserisci una email" value="{{ old('customer_email') }}">
                </div>
                <div class="user-telephone">
                  <label class="label">Telefono</label>
                  <input type="text" name="customer_phone" placeholder="Inserisci un n. di telefono" value="{{ old('customer_phone') }}">
                </div>
              </div>
              <div class="user-address">
                <label class="label">Indirizzo</label>
                <input type="text" name="customer_address" placeholder="Inserisci l'indirizzo" value="{{ old('customer_address') }}">
              </div>
              <label class="label">Note</label>
              <textarea name="notes" rows="6">{{ old('notes') }}</textarea>
            </div>
            <input type = "hidden" name = "total_price" :value = "calculateTotal" />
            <input v-for ="dish in cart" type = "hidden" name = "dishes[]" :value = "dish.item.id"/>
            <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>
          </div>
        </div>
        <div class="col-12 col-md-6">
          {{-- Carrello --}}
          <div class="checkout-cart">
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
        </div>
      </div>

      {{-- Braintree --}}
      <div class="bt-drop-in-wrapper">
        <div id="bt-dropin"></div>
       </div>
      <div class="clearfix">
        <a class="home-btn float-left" href="{{ route('restaurant', $restaurant->slug) }}" @click='saveLocalStorage'>Torna indietro</a>
        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <span class="home-btn off-btn float-right" v-if="calculateTotal == 0">Procedi al pagamento</span>
        <button class="home-btn float-right" v-else id="submit-button">Procedi al pagamento</button>
      </div>

    </form>
  </div>
</div>


<script src="{{ asset('js/checkout.js') }}"></script>
{{-- Braintree --}}
<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ $token }}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
</script>
@endsection



