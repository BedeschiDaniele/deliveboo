@if (Route::has('login'))
<div class="top-right links">
    @auth
    <div class="mycontainer">
        <div class="login-header-top">
            <h1 id="logo">DeliveBoo</h1>
            <button class="logout"><a href="{{ url('/home') }}">Home</a></button>
        </div>
    </div>
       
    @else
        <div class="mycontainer">
            <div class="register-header-top">
                <h1 id="logo">DeliveBoo</h1>
                <div class="route-in-out">
                    <button class="login"><a href="{{ route('login') }}">Login</a></button>
                    @if (Route::has('register'))
                    <button class="register"><a href="{{ route('register') }}">Register</a></button> 
                    @endif
                </div>
            </div>
        </div>
    @endauth
</div>
@endif

