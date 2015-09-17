<div class="video-wrapper">
    <video class="display-video" tabindex="0" autobuffer="autobuffer" preload="auto">
        <source id="webm" type="video/webm" src="{{asset('videos/Comp_720_60.webm')}}">
        <source id="mp4" type="video/mp4" src="{{asset('videos/Comp_720_60.mp4')}}">
        <p>Sorry, your browser does not support the &lt;video&gt; element.</p>
    </video>
</div>
<div class="inner">

    <div class="module-title">
        <h1 class="title">
            <span data-arc="90">&middot; Module {{$module->order - 1}} &middot;</span>
            {{$module->name}}
        </h1>

        <div class="module-icon module-{{$module->slug}}"></div>
    </div>

    <div class="next-section" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>