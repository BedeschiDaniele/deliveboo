@extends('layouts.guest.main')


@section('content')
<div id="checkout">
  <div class="mycontainer">
    <div class="menu">
      <h1>Ristorante {{$restaurant->name}}</h1>
    </div>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}"></script>
@endsection