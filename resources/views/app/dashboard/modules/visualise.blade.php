<div class="content">
    <div class="inner-padding">
        <h1 class="title">
            @if($style === 'pdf')
                <img src="{{asset('img/beautiful-you.png')}}" width="205px" height="34px" alt="">
            @else
            Beautiful you
            @endif
        </h1>

        <img src="{{route('dreamboard.show', [$module->pivot->secret])}}" alt="Beautiful You">

        <ul class="social">
            <li><a class="fb"  data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}">Share on Facebook</a></li>
            <li><a class="pin" data-share href="//www.pinterest.com/pin/create/button/?{{http_build_query(['url' => route('module.share', [$module->pivot->secret]), 'media' => route('dreamboard.show', [$module->pivot->secret]), 'description' => 'My Dreamboard'])}}">Share on Pinterest</a></li>
            <li><a class="dl" href="{{route('dreamboard.show', [$module->pivot->secret, 'fb' => 1])}}" target="_blank" >Download</a></li>
        </ul>
    </div>
</div>