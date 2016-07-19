<!DOCTYPE html>
<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{asset('css/main.css')}}"/>

        <style>

        </style>
    </head>
    <body data-page="home" class="has-video">
        <div class="container">
            <div id="set-height"></div>
            <div class="content-wrapper">
                <video class="display-video" tabindex="0" autobuffer="autobuffer" preload="preload">
                    <source id="webm" type="video/webm" src="{{asset('videos/Comp_720_30.webm')}}">
                    <source id="mp4" type="video/mp4" src="{{asset('videos/Comp_720_60.mp4')}}">
                    <p>Sorry, your browser does not support the &lt;video&gt; element.</p>
                </video>
                <img src="{{asset('img/home-banner.png')}}" class="home-banner" alt="home-banner" />
            </div>

            <div class="intro-video-container">
                <div class="inner"></div>
            </div>

            <div class="push"></div>
        </div>
        <script src="{{asset('js/output.js')}}"></script>
    </body>
</html>