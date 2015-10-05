<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Belief School</title>
    <script src="//use.typekit.net/oni6kia.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    @if(App::environment('local'))
        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/output.js')}}"></script>
</head>
<body data-page="{{ $page or 'page' }}">

<!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="spinner"></div>
@include('app.partials.buttons.burger')
@include('app.ui.menu')

@include('app.ui.module-indicator')

@include('app.ui.auth')

@yield('content')


@include('app.ui.introduction-modal')



</body>
</html>