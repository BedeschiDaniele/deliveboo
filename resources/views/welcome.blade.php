
@extends('layouts.guest.main')


@section('content')
    
<div id="app">

	<div class="home-jumbotron">
		<div class="mycontainer">
			<div class="overlay"></div>
			<div class="jumbotron-text">
				<h1 class="home-h1">Choose, Order and Checkout</h1>
				<h3 class="home-h3">Scegli il tuo piatto preferito e ordinalo direttamente da casa tua!</h3>
				<a class="home-btn" href="#">Scopri i ristoranti</a>
			</div>
		</div>
	</div>

	<div class="home-CTA">
		<div class="mycontainer">
			<div class="CTA-card">
				<div class="CTA-img">
					<img src="img/home/restaurant.png" alt="Restaurant Icon">
				</div>
				<div class="CTA-text">
					<h5>Scegli il ristorante</h5>
				</div>
			</div>
			<div class="CTA-card">
				<div class="CTA-img">
					<img src="img/home/menu.png" alt="Restaurant Icon">
				</div>
				<div class="CTA-text">
					<h5>Scegli il tuo piatto</h5>
				</div>
			</div>
			<div class="CTA-card">
				<div class="CTA-img">
					<img src="img/home/delivery.png" alt="Restaurant Icon">
				</div>
				<div class="CTA-text">
					<h5>Consegna a casa tua!</h5>
				</div>
			</div>
		</div>
	</div>

	<div class="home-categories-carousel">
		<div class="mycontainer">
			<h2>Scegli la tua categoria preferita</h2>
			<div class="carousel-container">
				<div class="category-card" v-for="category in categories">
					<img class="carousel-img" :src="category.img_path" alt="category.name">
					<span class="carousel-text">@{{ category.name }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="home-categories">
		<div class="mycontainer">
			<select v-model="selectedCategory" name="" id="">
				<option value="all">Tutti</option>
				<option v-for="category in categories" :value="category.name">@{{ category.name }}</option>
			</select>
			<button class="home-btn filter-btn" @click='filterCategory'>Trova</button>
		</div>
	</div>

	<div class="home-restaurants">
		<div class="mycontainer">
			
			<h2 v-if='onSearch==false'>Tutti i nostri ristoranti</h2>
			<h2 v-if='onSearch==true'>Non ci sono ristoranti</h2>

			<div class="restaurant-container">
				<div class="restaurant-card" v-if='restaurants.length > 0 && filteredRestaurant.length == 0 && onSearch==false' v-for="(restaurant,indexRestaurant) in restaurants">
					<img class="card-image" :src="'Storage/' + restaurant.img_path" alt="restaurant.name">
					<div class="card-body">
						<div class="upper-card">
							<h5 class="card-title">@{{ restaurant.name }}</h5>
							<span class="card-delivery">CONSEGNA GRATIS</span>
							<p class="card-address"><i class="fas fa-map-marker-alt"></i> @{{ restaurant.address }}</p>
							<p class="card-text">@{{ restaurant.description }}</p>
						</div>
						<div class="bottom-card">
							<span class="category-tags" v-for="category in restaurant.categories">&#9679; @{{ category.name }} </span>
						</div>
						<a :href="'/restaurant/'+restaurant.slug">Dettaglio</a>
					</div>
				</div>
			
				<div class="restaurant-card" v-if='filteredRestaurant.length > 0 && onSearch==false' v-for="(restaurant,indexRestaurant) in filteredRestaurant">
					<img class="card-image" :src="'Storage/' + restaurant.img_path" alt="restaurant.name">
					<div class="card-body">
						<div class="upper-card">
							<h5 class="card-title">@{{ restaurant.name }}</h5>
							<span class="card-delivery">CONSEGNA GRATIS</span>
							<p class="card-address"><i class="fas fa-map-marker-alt"></i> @{{ restaurant.address }}</p>
							<p class="card-text">@{{ restaurant.description }}</p>
						</div>
						<div class="bottom-card">
							<span class="category-tags" v-for="category in restaurant.categories">&#9679; @{{ category.name }} </span>
						</div>
						<a :href="'/restaurant/'+restaurant.slug">Dettaglio</a>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<script src="{{ asset('js/app.js') }}"></script>
		
@endsection
       

