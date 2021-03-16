
@extends('layouts.guest.main')

@section('content')
    
<div id="app">
    <div v-if='filteredRestaurant.length == 0' v-for="(restaurant,indexRestaurant) in restaurants">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" :src="'Storage/' + restaurant.img_path" alt="restaurant.name">
            <div class="card-body">
              <h5 class="card-title">@{{ restaurant.name }}</h5>
              <p class="card-text">@{{ restaurant.description }}</p>
              <span v-for="category in restaurant.categories">@{{ category.name }}</span>
            </div>
        </div>
    </div>

    <div v-if='filteredRestaurant.length > 0' v-for="(restaurant,indexRestaurant) in filteredRestaurant">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" :src="'Storage/' + restaurant.img_path" alt="restaurant.name">
            <div class="card-body">
              <h5 class="card-title">@{{ restaurant.name }}</h5>
              <p class="card-text">@{{ restaurant.description }}</p>
              <span v-for="category in restaurant.categories">@{{ category.name }}</span>
            </div>
        </div>
    </div>
  
  <select v-model="selectedCategory" name="" id="">
      <option value="all">Tutti</option>
      <option v-for="category in categories" :value="category.name">@{{ category.name }}</option>
  </select>
  <button @click='filterCategory'>Trova</button>
</div>
<script src="{{ asset('js/app.js') }}"></script>
    
@endsection
       

