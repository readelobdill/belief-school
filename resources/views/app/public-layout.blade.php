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
</head>
<body data-page="{{$page}}">

@yield('content')

<script src="{{asset('js/output.js')}}"></script>
</body>
</html>