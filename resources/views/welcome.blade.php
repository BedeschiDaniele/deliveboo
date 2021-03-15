<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
         <!-- Styles -->
        <link href=" {{ asset('css/app.css')  }} " rel="stylesheet">

 </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div id="app">
               <h1>@{{ message }}</h1>
               <div v-for="restaurant in restaurants" class="card" style="width: 18rem;">
                <img class="card-img-top" :src="'Storage/' + restaurant.img_path" alt="restaurant.name">
                <div class="card-body">
                  <h5 class="card-title">@{{ restaurant.name }}</h5>
                  <p class="card-text">@{{ restaurant.description }}</p>
                </div>
              </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
