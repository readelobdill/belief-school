<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Belief School</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500,300,900' rel='stylesheet' type='text/css'>
        <script src="//use.typekit.net/oni6kia.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
        @if(App::environment('local'))
            <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
        @endif

        @yield('metadata')

         <style>

            .content {
                text-align: center;
            }

            h1 {
                font-size: 25px;
                margin-bottom: 45px;
            }
        </style>
    </head>

    <body>
        <div class="container non-mod-page">
            <div class="inner">
                <header>
                    <h2 class="title">Cannot find that page</h2>
                </header>

                <div class="content">
                    <p>Oops! You have found our 404 page.<br />
                    The page you are trying to reach may not exist.</p>

                    <p>Return to Belief School
                        <a class="{{(!Auth::check() ? 'is-hidden-g' : '')}}" href="{{ route('dashboard') }}">Dashboard</a>
                        <a class="{{(Auth::check() ? 'is-hidden-g' : '')}}" href="{{ route('modules.view', ['home']) }}">Home</a>
                    </p>
                </div>

            </div>
        </div>

    <script src="{{asset('js/output.js')}}"></script>
    </body>
</html>
