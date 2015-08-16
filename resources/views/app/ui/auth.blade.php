<div class="auth">
    <a class="logout {{(!Auth::check() ? 'is-hidden' : '')}}" href="">Logout</a>
    {{-- <a class="login {{(Auth::check() ? 'is-hidden' : '')}}" href="#">Login</a> --}}
</div>