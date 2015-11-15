<!doctype html>
<html lang="en">
<!--[if lt IE 10]><html lang="en" class="ltie10"><![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Insightful interactive online modules give you the evidence you need to create the life you want.">
    <title>Belief School</title>

    <meta property="og:title" content="Belief School" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Insightful interactive online modules give you the evidence you need to create the life you want." />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:image" content="{{ asset("img/share/fb-share-img.jpg") }}" />

    <link rel="apple-touch-icon" href="{{ asset("img/favicons/apple-touch-icon.png") }}" />

    <script src="//use.typekit.net/oni6kia.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    @if(App::environment('local'))
        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
<div class="spinner-percentage"></div>
@include('app.partials.buttons.burger')
@include('app.ui.menu')

@include('app.ui.module-indicator')

@include('app.ui.auth')

@yield('content')


@include('app.ui.introduction-modal')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58267105-2', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>