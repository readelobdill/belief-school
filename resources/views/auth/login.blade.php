@extends('app.layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <header>
                <h1 class="title">
                    Login
                </h1>
            </header>

            <section class="login">
                <div class="inner">
                    <div class="content">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>Your email or password is incorrect<br><br>

                            </div>
                        @endif

                        <form method="POST" action="{{route('auth.login')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-row">
                                <input type="email" name="email" value="{{ old('email') }}">
                                <label>Email Address</label>
                            </div>

                            <div class="form-row">
                                <input type="password" name="password">
                                <label>Password</label>
                            </div>


                            <div class="radio-row">
                                <input type="radio" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>

                                    {{-- <div class="checkbox">
                                        <label>
                                            <input type="radio" name="remember"> Remember Me
                                        </label>
                                    </div> --}}



                            <div class="form-row">
                                <p class="center"><button type="submit" class="button" style="margin-right: 15px;">Login</button></p>

                                <p class="center"><a href="/password/email">Forgot Your Password?</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
