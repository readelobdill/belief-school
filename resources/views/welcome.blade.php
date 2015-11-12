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
                <div class="inner">
                    <div class="text-container">
                        @for($i = 0; $i < 100; $i++)
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultricies sapien aliquet diam sollicitudin, ac sodales ante vulputate. Duis ex dolor, dignissim a vehicula non, consectetur venenatis dolor. Proin bibendum elit nulla, sit amet feugiat arcu vestibulum vel. Nullam aliquam nisi ac nulla efficitur, accumsan commodo magna elementum. Cras ullamcorper vel ex ut bibendum. Curabitur eleifend non elit id maximus. Donec eget tellus sagittis, dapibus nulla in, porttitor enim. Ut a condimentum nisl.
                            </p>
                            <p>
                                Donec ornare tincidunt justo eget hendrerit. Maecenas suscipit id mauris eu tempor. Curabitur nisl sem, euismod non ornare in, laoreet ut ipsum. Vestibulum luctus tortor quis eleifend commodo. Integer tristique dolor vel tempor tempus. Vestibulum sed ipsum ac quam finibus lobortis. Duis velit turpis, ornare quis diam ut, congue sagittis sapien. Vivamus interdum euismod magna quis aliquam. Morbi auctor turpis mollis, porttitor quam vel, sagittis est. Duis vulputate neque eget odio sodales pellentesque sit amet vitae lacus. Vestibulum ac turpis a enim tincidunt laoreet quis quis tortor. Fusce id ipsum viverra, eleifend tortor a, tempus sem. Sed lobortis non nisl non ullamcorper.
                            </p>
                        @endfor

                    </div>
                </div>

            </div>

            <div class="push">

            </div>
        </div>
        <script src="{{asset('js/output.js')}}"></script>
    </body>
</html>
