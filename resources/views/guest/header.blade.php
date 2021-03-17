@if (Route::has('login'))
<div class="top-right links">
    @auth
    <div class="mycontainer">
        <div class="login-header-top">
            <h1 id="logo">DeliveBoo</h1>
           <a  class="logout" href="{{ url('/home') }}">Home</a>
        </div>
    </div>
       
    @else
        <div class="mycontainer">
            <div class="register-header-top">
                <h1 id="logo">DeliveBoo</h1>
                <div class="route-in-out">
                    <a class="login" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="register" href="{{ route('register') }}">Registrazione</a>
                    @endif
                </div>
            </div>
        </div>
    @endauth
</div>
@endif

