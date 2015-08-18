<div class="auth">
    <a class="logout {{(!Auth::check() ? 'is-hidden-g' : '')}}" href="{{route('auth.logout')}}">Logout</a>
    <a class="login {{(Auth::check() ? 'is-hidden-g' : '')}}" href="{{route('auth.login')}}">Login</a>
</div>