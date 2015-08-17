<div class="auth">
    <a class="logout {{(!Auth::check() ? 'is-hidden-g' : '')}}" href="">Logout</a>
    <a class="login {{(Auth::check() ? 'is-hidden-g' : '')}}" href="">Login</a>
</div>