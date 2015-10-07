<div class="video-wrapper">
    @if($isMobile)
        <img src="{{asset('img/videos/'.$module->video.'.png')}}" alt="" class="display-video">
    @else
        <div class="display-video" data-video="{{asset('videos/'.$module->video)}}"></div>
    @endif
</div>
<div class="inner">
    <div class="module-title">
        <h1 class="title">
            <span data-arc="90">&middot; Module {{$module->order - 1}} &middot;</span>
            {{$module->name}}
        </h1>

        <div class="module-icon module-{{$module->template}}"></div>
    </div>

    <div class="next-section absol" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>