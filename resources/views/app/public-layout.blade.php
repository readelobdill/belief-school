<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('title')Belief School@endsection</title>
    <script src="//use.typekit.net/oni6kia.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(App::environment('local'))
        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    @endif

    @yield('metadata')
</head>
<body data-page="{{$page or 'page'}}">

@yield('content')

<script src="{{asset('js/output.js')}}"></script>
</body>
</html>