
    <video class="display-video" tabindex="0" autobuffer="autobuffer" preload="preload">
        <source id="webm" type="video/webm" src="{{asset('videos/Comp_720_60.webm')}}">
        <source id="mp4" type="video/mp4" src="{{asset('videos/Comp_720_60.mp4')}}">
        <p>Sorry, your browser does not support the &lt;video&gt; element.</p>
    </video>
<div class="inner">
    <img src="{{asset('img/home-banner.png')}}" class="home-banner">
    <div class="next-section" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>