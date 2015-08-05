<div class="auth">
    <a class="logout {{(!Auth::check() ? 'hidden' : '')}}" href="#">Logout</a>
    <a class="login {{(Auth::check() ? 'hidden' : '')}}" href="#">Login</a>
</div>