@if (Route::has('login'))
<div class="top-right links">
    @auth
    <div class="mycontainer">
        <div class="login-header-top">
            <h1 id="logo"><a href="{{ url('/') }}">Deliveboo</a></h1>
            <div class="user-logout">
                <a class="login" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="dropdown-item register" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
        </div>
    </div>
       
    @else
        <div class="mycontainer">
            <div class="register-header-top">
                <h1 id="logo"><a href="{{ url('/') }}">Deliveboo</a></h1>
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

