<!doctype html>
<html lang="en" class="{{($userAgent['platform'] === 'Macintosh' && $userAgent['browser'] === 'Safari' && version_compare($userAgent['version'], '8.0.0') < 1) ? 'ltie10' : ''}}">
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
    <script>
        window.isMobile = {{$mobileDetect->isMobile() ? 'true' : 'false'}};
    </script>
    <script src="{{asset('js/output.js')}}"></script>
</head>
<body data-page="{{ $page or 'page' }}">
<!--[if lt IE 10]>
    <div class="browserupgrade">
        <h1 class="plain">You are using an <strong>outdated</strong> browser.</h1>
        <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    </div>
<![endif]-->
@if($userAgent['platform'] === 'Macintosh' && $userAgent['browser'] === 'Safari' && version_compare($userAgent['version'], '8.0.0') === -1)
    <div class="browserupgrade">
        <h1 class="plain">You are using an <strong>outdated</strong> browser.</h1>
        <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    </div>
@endif
<div class="spinner"></div>
<div class="spinner-percentage"></div>
@include('app.partials.buttons.burger')
@include('app.ui.menu')

@include('app.ui.module-indicator')

@include('app.ui.auth')

@yield('content')


@include('app.ui.introduction-modal')

@if(getenv('APP_ENV')=='live')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58267105-2', 'auto');
    ga('send', 'pageview');
</script>
<script>
    window['_fs_debug'] = false;
    window['_fs_host'] = 'www.fullstory.com';
    window['_fs_org'] = '18WC2';
    (function(m,n,e,t,l,o,g,y){
      g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
      o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
      y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
      g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){FS(l,v)};
      g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;FS(o,v)};
      g.clearUserCookie=function(d,i){d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
      ';path=/;expires='+new Date(0);i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}
    })(window,document,'FS','script','user');
</script>
    @if(Auth::user())
        <script>
            var userId = "<?php $user = Auth::user();echo $user->id; ?>";
            var username = "<?php $user = Auth::user();echo $user->username; ?>";
            var email = "<?php $user = Auth::user();echo $user->email; ?>";
            FS.identify(userId, {
                displayName: username,
                email: email
            });
        </script>
    @endif
@endif

</body>
</html>