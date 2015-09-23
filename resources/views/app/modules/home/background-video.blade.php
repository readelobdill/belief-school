<div class="video-wrapper">
    @if($isMobile)
        <img src="{{asset('img/home-background.png')}}" alt="" class="display-video">
    @else
        <video class="display-video" tabindex="0" autobuffer="autobuffer" preload="auto">
            <source id="webm" type="video/webm" src="{{asset('videos/Comp_720_60.webm')}}">
            <source id="mp4" type="video/mp4" src="{{asset('videos/Comp_720_60.mp4')}}">
            <p>Sorry, your browser does not support the &lt;video&gt; element.</p>
        </video>
    @endif
</div>
<div class="inner">
    <div class="home-banner">
        @include('app.partials.logo')
    </div>
    <div class="next-section absol" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>