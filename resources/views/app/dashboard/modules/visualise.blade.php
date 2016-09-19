<div class="content">
    <div class="inner-padding">

        <img src="{{route('dreamboard.show', [$module->pivot->secret])}}" alt="My Beautiful Life">

        <ul class="social">
            <li><a class="fb"  data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}">Share on Facebook</a></li>
            <li><a class="pin" data-share href="//www.pinterest.com/pin/create/button/?{{http_build_query(['url' => route('module.share', [$module->pivot->secret]), 'media' => route('dreamboard.show', [$module->pivot->secret]), 'description' => 'My Beautiful Life'])}}">Share on Pinterest</a></li>
            <li><a class="dl" href="{{route('dreamboard.show', [$module->pivot->secret])}}" target="_blank" >Download</a></li>
        </ul>
    </div>
</div>