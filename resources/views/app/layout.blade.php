<!doctype html>
<html lang="en">
<!--[if lt IE 10]><html lang="en" class="ltie10"><![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Insightful interactive online modules give you the evidence you need to create the life you want.">
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
    <div class="browserupgrade">
        <h1 class="plain">You are using an <strong>outdated</strong> browser.</h1>
        <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    </div>
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