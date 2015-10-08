<div class="video-wrapper">
    @if($isMobile)
        <img src="{{asset('img/videos/'.$module->video.'.png')}}" alt="" class="display-video">
    @else
        <div class="display-video" data-video="{{asset('videos/'.$module->video)}}"></div>
    @endif
</div>
<div class="inner">
    <div class="home-banner">
        {{-- @include('app.partials.logo') --}}
        <img src="{{ asset('img/logo.png') }}" srcset="{{ asset('img/logo2x.png') }} 2x" alt="My Belief School" />
    </div>
    <div class="next-section absol" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>